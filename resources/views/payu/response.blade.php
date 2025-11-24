@extends('layouts.layoutWeb')
@section('title', 'Confirmación de pago — PayU')

@section('content')
    <style>
        body {
            background: #f5f6fa;
            color: #333;
        }

        .payu-container {
            max-width: 750px;
            margin: 60px auto;
            background: white;
            padding: 40px;
            border-radius: 18px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        }

        .estado {
            text-align: center;
            font-size: 1.2em;
            font-weight: 600;
            margin: 20px 0;
            padding: 14px;
            border-radius: 10px;
        }

        .estado.success {
            background-color: #e8fff0;
            color: #1e8449;
        }

        .estado.failed {
            background-color: #ffeaea;
            color: #c0392b;
        }

        .estado.pending {
            background-color: #fff7e6;
            color: #e67e22;
        }

        .estado.error {
            background-color: #ffe6e6;
            color: #e74c3c;
        }

        .estado.unknown {
            background-color: #ecf0f1;
            color: #7f8c8d;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        td {
            padding: 10px 8px;
            border-bottom: 1px solid #eee;
            font-size: 0.95em;
        }

        td:first-child {
            font-weight: 600;
            color: #555;
            width: 40%;
        }

        .footer {
            text-align: center;
            color: #777;
            font-size: 0.9em;
            margin-top: 25px;
        }

        .btn-home {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 22px;
            background: #2d89ef;
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            transition: background 0.25s ease;
        }

        .btn-home:hover {
            background: #1b64c2;
        }
    </style>

    <div class="container py-5">
        <div class="payu-container">

            @php

                $ApiKey = '4Vj8eK4rloUd272L48hsrarnUA';
                $merchant_id = request()->input('merchantId');
                $referenceCode = request()->input('referenceCode');
                $TX_VALUE = request()->input('TX_VALUE');
                $New_value = number_format($TX_VALUE, 1, '.', '');
                $currency = request()->input('currency');
                $transactionState = request()->input('transactionState');
                $firma_cadena= config('services.payu.api_key').'~'.request()->merchantId.'~'.request()->referenceCode.'~'.number_format(request()->TX_VALUE, 1, '.', '').'~'.request()->currency.'~'.request()->transactionState;
                $firmacreada = md5($firma_cadena);


                $firma = request()->input('signature');
                $reference_pol = request()->input('reference_pol');
                $cus = request()->input('cus');
                $extra1 = request()->input('description');
                $pseBank = request()->input('pseBank');
                $lapPaymentMethod = request()->input('lapPaymentMethod');
                $transactionId = request()->input('transactionId');

                $estadoClase = 'unknown';
                $estadoTx = $payu['mensaje'] ?? 'Estado desconocido';

                $state = request()->input('transactionState');

                ///OTro

                $merchantId = request()->input('merchantId');
$apiKey = env('PAYU_API_KEY');
$referenceCode = request()->input('referenceCode');
$TX_VALUE = request()->input('TX_VALUE');
$currency = request()->input('currency');
$transactionState = request()->input('transactionState');
$signatureReceived = request()->input('signature');

$cadenaFirma = "{$apiKey}~{$merchantId}~{$referenceCode}~{$TX_VALUE}~{$currency}~{$transactionState}";
$firmaCalculada = md5($cadenaFirma);

$validSignature = (strtoupper($signatureReceived) === strtoupper($firmaCalculada));

                switch ($state) {
                    case '4':
                    case 'APPROVED':
                    case 'SUCCESS':
                        $estadoTx = '✅ Transacción aprobada';
                        $estadoClase = 'success';
                        break;
                    case '6':
                    case 'DECLINED':
                        $estadoTx = '❌ Transacción rechazada';
                        $estadoClase = 'failed';
                        break;
                    case '7':
                    case 'PENDING':
                        $estadoTx = '🕓 Pago pendiente';
                        $estadoClase = 'pending';
                        break;
                    case '104':
                    case 'ERROR':
                        $estadoTx = '⚠️ Error en la transacción';
                        $estadoClase = 'error';
                        break;
                    default:
                        $estadoTx = request()->input('mensaje');
                        $estadoClase = 'error';
                        break;
                }
            @endphp

            @if ($validSignature)

                <h2 class="text-center text-2xl font-bold mb-2">Resumen de la transacción</h2>
                <p class="text-center text-gray-500 text-sm mb-4">Detalles recibidos desde PayU</p>

                <div class="estado {{ $estadoClase }}">
                    {{ $estadoTx }}
                </div>

                <table>
                    <tr>
                        <td>ID de transacción</td>
                        <td>{{ $payu['transactionId'] ?? ($order->transaction_id ?? '—') }}</td>
                    </tr>
                    <tr>
                        <td>Referencia de venta</td>
                        <td>{{ $payu['reference_pol'] ?? ($order->reference_pol ?? '—') }}</td>
                    </tr>
                    <tr>
                        <td>Referencia de transacción</td>
                        <td>{{ $payu['referenceCode'] ?? ($order->reference ?? '—') }}</td>
                    </tr>

                    @if (!empty($payu['pseBank']))
                        <tr>
                            <td>CUS</td>
                            <td>{{ $payu['cus'] ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td>Banco</td>
                            <td>{{ $payu['pseBank'] }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>Valor total</td>
                        <td>$ {{ number_format($payu['TX_VALUE'] ?? ($order->total ?? 0), 2) }}</td>
                    </tr>
                    <tr>
                        <td>Moneda</td>
                        <td>{{ $payu['currency'] ?? ($order->currency ?? 'COP') }}</td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td>{{ $payu['description'] ?? ($order->description ?? '—') }}</td>
                    </tr>
                    <tr>
                        <td>Entidad</td>
                        <td>{{ $payu['lapPaymentMethod'] ?? '—' }}</td>
                    </tr>
                </table>

                <div class="footer">
                    Gracias por tu pago.<br>
                    <a href="{{ route('dashboard') }}" class="btn-home">Volver al inicio</a>
                </div>
                @else
                  <h2 class="text-center text-2xl font-bold mb-2">Error validando la firma digital</h2>
            @endif

        </div>
    </div>
@endsection
