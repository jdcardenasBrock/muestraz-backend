<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PaymentLog;
use Illuminate\Http\Request;

class PayUController extends Controller
{
    public function redirectToPayU(Order $order)
    {
        $signature = md5(
            env('PAYU_API_KEY').'~'.
            env('PAYU_MERCHANT_ID').'~'.
            $order->id.'~'.
            $order->total.'~COP'
        );

        return view('payu.checkout', [
            'merchantId' => env('PAYU_MERCHANT_ID'),
            'accountId' => env('PAYU_ACCOUNT_ID'),
            'description' => 'Compra #' . $order->id,
            'referenceCode' => $order->id,
            'amount' => $order->total,
            'tax' => $order->iva,
            'signature' => $signature,
            'buyerEmail' => auth()->user()->email ?? 'cliente@test.com',
            'responseUrl' => env('PAYU_RESPONSE_URL'),
            'confirmationUrl' => env('PAYU_CONFIRMATION_URL'),
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

