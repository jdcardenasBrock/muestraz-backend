<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentLog;
use App\Models\PayuTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PayUController extends Controller
{
    public function redirectToPayU(Order $order)
    {
        $taxReturnBase = $order->subtotal; // subtotal antes de IVA
        $tax = $order->iva; // IVA que ya calculaste

        $signature = md5(
            config('services.payu.api_key') . '~' .
                config('services.payu.merchant_id') . '~' .
                $order->payu_reference . '~' .
                $order->total . '~COP'
        );

        return view('payu.checkout', [
            'merchantId' => config('services.payu.merchant_id'),
            'accountId' => config('services.payu.account_id'),
            'description' => 'Compra #' . $order->id,
            'referenceCode' => $order->payu_reference,
            'amount' => $order->total,
            'tax' => $order->iva,
            'taxReturnBase' => $order->subtotal,
            'signature' => $signature,
            'buyerEmail' => $order->customer_email,
            'shipping_cost' => $order->shipping_cost,
            'responseUrl' => route('payu.response'),
            'confirmationUrl' => route('payu.confirmation'),
        ]);
    }


    public function response(Request $request)
    {
        Log::info('PayU response', $request->all());

        // Solo mostrar al usuario, sin modificar la base de datos
        $reference = $request->input('reference_sale') ?? $request->input('referenceCode');
        $order = Order::where('payu_reference', $reference)->first();
        return view('payu.response', [
            'order' => $order,
            'payu' => $request->all(),
        ]);
    }

    public function confirmation(Request $request)
    {
        Log::info('PayU confirmation', $request->all());

        $reference = $request->input('reference_sale');
        $transactionId = $request->input('transaction_id');
        $state = $request->input('state_pol');
        $amount = number_format((float)$request->input('value'), 1, '.', '');
        $currency = $request->input('currency');
        $signature = $request->input('sign');

        $order = Order::where('payu_reference', $reference)->first();
        dd($order,$reference);
        if (!$order) {
            Log::warning('Order not found for confirmation', ['reference' => $reference]);
            return response('Order not found', 404);
        }

        // Validar firma
        $apiKey = config('services.payu.api_key');
        $merchantId = config('services.payu.merchant_id');
        $expectedSignature = md5("{$apiKey}~{$merchantId}~{$reference}~{$amount}~{$currency}~{$state}");

        if (strtoupper($signature) !== strtoupper($expectedSignature)) {
            Log::error('Invalid signature from PayU', [
                'expected' => $expectedSignature,
                'received' => $signature,
                'reference' => $reference
            ]);
            return response('Invalid signature', 400);
        }

        // Mapear estado
        $status = $this->mapPayUStateToStatus($state);

        try {
            $order->update([
                'status' => $status,
                'transaction_id' => $transactionId,
                'payment_method' => $request->input('payment_method_name'),
                'payment_status_detail' => $request->input('response_message_pol') ?? $request->input('response_message'),
                'paid_at' => $status === 'approved' ? now() : null,
                'cancelled_at' => $status === 'declined' ? now() : null,
            ]);

            PayuTransaction::create([
                'order_id' => $order->id,
                'transaction_id' => $transactionId,
                'state' => $state,
                'status_text' => PayuTransaction::mapStateToText($state),
                'value' => $request->input('value'),
                'currency' => $currency,
                'response_message' => $request->input('response_message_pol'),
                'payment_method' => $request->input('payment_method_name'),
                'raw_data' => $request->all(),
            ]);

            Log::info('Order updated after confirmation', [
                'order_id' => $order->id,
                'status' => $order->status
            ]);

            return response('OK', 200);
        } catch (\Throwable $e) {
            Log::error('Error saving PayU confirmation', [
                'error' => $e->getMessage(),
                'reference' => $reference
            ]);
            return response('Server error', 500);
        }
    }



    // === 3️⃣ Vista amigable (si vienes redirigido manualmente) ===
    public function confirm(Order $order)
    {
        return view('payu.response', [
            'order' => $order,
            'payu' => session('payu_response', []),
        ]);
    }

    protected function verifyPayUSignature(array $payload): bool
    {
        // Implementa según PayU: cada integración puede usar un algoritmo/param names distintos.
        // Ejemplo genérico (no es copia exacta de PayU): construir cadena con API_KEY|merchantId|referenceCode|amount|currency
        // y comparar con la firma enviada (ej: 'signature' o 'sign').


        $apiKey = config('services.payu.api_key');
        $merchantId = config('services.payu.merchant_id');


        $reference = $payload['reference_sale'] ?? $payload['referenceCode'] ?? '';
        $amount = number_format((float)($payload['value'] ?? $payload['TX_VALUE'] ?? 0), 2, '.', '');
        $currency = $payload['currency'] ?? $payload['currency_code'] ?? 'COP';


        if (empty($reference) || empty($apiKey) || empty($merchantId)) {
            return false;
        }


        // Atención: revisa la documentación de PayU que uses para el algoritmo exacto.
        $expected = md5("{$apiKey}~{$merchantId}~{$reference}~{$amount}~{$currency}");
        $remote = $payload['signature'] ?? $payload['sign'] ?? $payload['hash'] ?? null;


        return $remote && hash_equals($expected, $remote);
    }


    protected function mapPayUStateToStatus($statePol)
    {
        return match ($statePol) {
            4 => 'approved',
            6 => 'declined',
            104 => 'error',
            7 => 'pending',
            default => 'unknown',
        };
    }
}
