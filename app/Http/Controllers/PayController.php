<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PayController extends Controller
{
    public function redirectToPayU(Order $order)
    {
        $signature = md5(
            config('services.payu.api_key') . '~' .
                config('services.payu.merchant_id') . '~' .
                $order->payu_reference . '~' .
                $order->total . '~COP'
        );

        return view('payu.checkout', [
            'merchantId' => config('services.payu.merchant_id'),
            'accountId' => config('services.payu.currency'),
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


    // public function index()
    // {
    //     $signPayU=$this->generateFirmaPayU();
    //     return view('payu.checkout',compact('signPayU'));
    // }

    // public function generateFirmaPayU()
    // {
    //     $referenceCode = Str::random(20);

    //     $signature = md5( . '~' .  . '~' . $referenceCode . '~' . '100' . '~' . );

    //     return [
    //         'referenceCode' => $referenceCode,
    //         'sgnature' => $signature
    //     ];
    // }
}
