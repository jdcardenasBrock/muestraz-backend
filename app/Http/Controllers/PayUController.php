<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentLog;
use Illuminate\Http\Request;

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
            'responseUrl' => route('payu.response'),
            'confirmationUrl' => route('payu.confirmation'),
        ]);
    }

    public function confirmation(Request $request)
    {
        $order = Order::where('id', $request->reference_sale)->first();

        if (!$order) return response('Order not found', 404);

        $order->update(['status' => strtolower($request->state_pol)]);

        PaymentLog::create([
            'order_id' => $order->id,
            'response_data' => json_encode($request->all()),
            'status' => strtolower($request->state_pol),
        ]);

        return response('OK', 200);
    }

    public function response(Request $request)
    {
        return view('payu.response', ['data' => $request->all()]);
    }
}
