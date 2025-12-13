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
                $merchant_id = $_REQUEST['merchantId'];
                $referenceCode = $_REQUEST['referenceCode'];
                $TX_VALUE = $_REQUEST['TX_VALUE'];
                $New_value = number_format($TX_VALUE, 1, '.', '');
                $currency = $_REQUEST['currency'];
                $transactionState = $_REQUEST['transactionState'];
                $firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
                $firmacreada = md5($firma_cadena);
                $firma = $_REQUEST['signature'];
                $reference_pol = $_REQUEST['reference_pol'];
                $cus = $_REQUEST['cus'];
                $extra1 = $_REQUEST['description'];
                $pseBank = $_REQUEST['pseBank'];
                $lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
                $transactionId = $_REQUEST['transactionId'];

                switch ($transactionState) {
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
                        $estadoTx = $_REQUEST['mensaje'];
                        $estadoClase = 'error';
                        break;
                }
            @endphp

            @if (strtoupper($firma) == strtoupper($firmacreada))
                @php
                    session()->forget('cart');
                @endphp

                <h2 class="text-center text-2xl font-bold mb-2">Resumen de la transacción</h2>
                <p class="text-center text-gray-500 text-sm mb-4">Detalles recibidos desde PayU</p>

                <div class="estado {{ $estadoClase }}">
                    {{ $estadoTx }}
                </div>

                <table>
                    <tr>
                        <td>ID de transacción</td>
                        <td>{{ $transactionId ?? ($order->transaction_id ?? '—') }}</td>
                    </tr>
                    <tr>
                        <td>Referencia de venta</td>
                        <td>{{ $reference_pol ?? ($order->reference_pol ?? '—') }}</td>
                    </tr>
                    <tr>
                        <td>Referencia de transacción</td>
                        <td>{{ $referenceCode ?? ($order->reference ?? '—') }}</td>
                    </tr>

                    @if ($pseBank != null)
                        <tr>
                            <td>CUS</td>
                            <td>{{ $cus ?? '—' }}</td>
                        </tr>
                        <tr>
                            <td>Banco</td>
                            <td>{{ $pseBank }}</td>
                        </tr>
                    @endif

                    <tr>
                        <td>Valor total</td>
                        <td>$ {{ number_format($TX_VALUE ?? ($order->total ?? 0), 2) }}</td>
                    </tr>
                    <tr>
                        <td>Moneda</td>
                        <td>{{ $currency ?? ($order->currency ?? 'COP') }}</td>
                    </tr>
                    <tr>
                        <td>Descripción</td>
                        <td>{{ $extra1 ?? ($order->description ?? '—') }}</td>
                    </tr>
                    <tr>
                        <td>Entidad</td>
                        <td>{{ $lapPaymentMethod ?? '—' }}</td>
                    </tr>
                </table>

                <div class="footer">
                    <b>Gracias por tu pago.</b> Podra hacer seguimiento de la orden, en <a href="{{route('myOrders')}}">Mis Pedidos</a> <br>
                    <a href="{{ route('dashboard') }}" class="btn-home">Volver al inicio</a>
                </div>
            @else
                <h2 class="text-center text-2xl font-bold mb-2">Error validando la firma digital</h2>
            @endif

        </div>
    </div>
@endsection
