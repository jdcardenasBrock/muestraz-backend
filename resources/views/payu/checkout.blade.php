@extends('layouts.layoutWeb')
@section('title', 'Pagar con PayU')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <!-- Card de Orden -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0 text-white">Confirmación de Pago</h5>
                </div>
                <div class="card-body">

                    <p class="text-muted mb-3">Revise los datos de su compra antes de continuar con el pago.</p>

                    <ul class="list-group mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Subtotal</span>
                            <strong>${{ number_format($taxReturnBase, 0, ',', '.') }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Costo de Envio</span>
                            <strong>${{ number_format($shipping_cost, 0, ',', '.') }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span>IVA</span>
                            <strong>${{ number_format($tax, 0, ',', '.') }}</strong>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center bg-light">
                            <span>Total a Pagar</span>
                            <strong class="fs-5">${{ number_format($amount, 0, ',', '.') }}</strong>
                        </li>
                    </ul>

                    <!-- Formulario PayU -->
                    <form method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                        <input type="hidden" name="merchantId" value="{{ $merchantId }}">
                        <input type="hidden" name="accountId" value="{{ $accountId }}">
                        <input type="hidden" name="description" value="{{ $description }}">
                        <input type="hidden" name="referenceCode" value="{{ $referenceCode }}">
                        <input type="hidden" name="amount" value="{{ $amount }}">
                        <input type="hidden" name="tax" value="{{ $tax }}">
                        <input type="hidden" name="taxReturnBase" value="{{ $taxReturnBase }}">
                        <input type="hidden" name="currency" value="COP">
                        <input type="hidden" name="signature" value="{{ $signature }}">
                        <input type="hidden" name="test" value="1">
                        <input type="hidden" name="buyerEmail" value="{{ $buyerEmail }}">
                        <input type="hidden" name="responseUrl" value="{{ $responseUrl }}">
                        <input type="hidden" name="confirmationUrl" value="{{ $confirmationUrl }}">

                        <button type="submit" class="btn btn-dark w-100 py-2 mt-3">
                            <i class="bi bi-credit-card-2-front me-2"></i> Pagar con PayU
                        </button>
                    </form>

                    <p class="mt-3 text-center text-muted small">
                        Será redirigido a la pasarela de pagos de PayU para completar la transacción de forma segura.
                    </p>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap Icons CDN (opcional para iconos) -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
@endsection
