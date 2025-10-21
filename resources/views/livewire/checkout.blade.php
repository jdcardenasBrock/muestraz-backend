<div>
    <style>
        .order-item span {
            font-size: 14px;
            color: #333;
        }

        .order-item img {
            border: 1px solid #ddd;
        }
    </style>
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4>Checkout</h4>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Shop</a></li>
                    <li class="active">Checkout</li>
                </ol>
            </div>
        </div>
    </section>

    <div id="content">
        <section class="chart-page padding-top-100 padding-bottom-100">
            <div class="container">
                <div class="shopping-cart">
                    <div class="row">

                        <!-- Billing & Shipping -->
                        <div class="col-sm-7">
                            <div class="card shadow-sm mb-4">
                                <div class="card-header bg-dark text-white">
                                    <h6 class="mb-0 text-white">Datos de Facturación </h6>
                                </div>
                                <div class="card-body">
                                    <form wire:submit.prevent="checkout" class="row g-3">

                                        <!-- Full Name -->
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Nombre Completo</label>
                                            <input type="text"
                                                class="form-control @error('customer_name') is-invalid @enderror"
                                                wire:model="customer_name">
                                            @error('customer_name')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Correo Electronico</label>
                                            <input type="email"
                                                class="form-control @error('customer_email') is-invalid @enderror"
                                                wire:model="customer_email" >
                                            @error('customer_email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Phone -->
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Celular</label>
                                            <input type="text"
                                                class="form-control @error('customer_phone') is-invalid @enderror"
                                                wire:model="customer_phone">
                                            @error('customer_phone')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Address -->
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Dirección Fisica</label>
                                            <input type="text"
                                                class="form-control @error('customer_address') is-invalid @enderror"
                                                wire:model="customer_address" >
                                            @error('customer_address')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Optional: Cedula -->
                                        <div class="col-md-6 mt-3">
                                            <label class="form-label">Numero de Identificación</label>
                                            <input type="text"
                                                class="form-control @error('customer_id') is-invalid @enderror"
                                                wire:model="customer_id">
                                            @error('customer_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- Order Summary -->
                        <div class="col-sm-5">
                            <h6>Your Order</h6>
                            <div class="order-place">
                                <div class="order-detail">

                                    @forelse($cart as $id => $item)
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <div class="d-flex align-items-center gap-3">
                                                <img class="img-fluid rounded"
                                                    src="{{ $item['imagen'] ?? asset('images/default.png') }}"
                                                    alt="{{ $item['nombre'] }}"
                                                    style="width:40px;height:40px;object-fit:cover;margin-right: 10px;">
                                                <span>{{ $item['nombre'] }} (x{{ $item['cantidad'] }})</span>
                                            </div>
                                            <strong>${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}</strong>
                                        </div>
                                    @empty
                                        <p>Carrito vacío</p>
                                    @endforelse

                                    <p>Envío: <span>${{ number_format($shippingCost, 0, ',', '.') }}</span></p>
                                    <p>IVA: <span>${{ number_format($iva, 0, ',', '.') }}</span></p>
                                    <p class="all-total">TOTAL:
                                        <span>${{ number_format($grandTotal, 0, ',', '.') }}</span>
                                    </p>
                                </div>

                                <!-- Payment Methods -->
                                <div class="pay-meth mt-3">
                                    <div class="checkbox mt-2">
                                        <input type="checkbox" wire:model="accept_terms" id="terms">
                                        <label for="terms">He leído y acepto los <span class="color">términos y
                                                condiciones</span></label>
                                        @error('accept_terms')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button wire:click="checkout" wire:loading.attr="disabled"
                                        class="btn btn-dark w-100 mt-3" :disabled="!@entangle('accept_terms')">
                                        Realizar pedido
                                    </button>


                                </div>

                                @if (session()->has('success'))
                                    <div class="alert alert-success mt-2">{{ session('success') }}</div>
                                @endif
                                @if (session()->has('error'))
                                    <div class="alert alert-danger mt-2">{{ session('error') }}</div>
                                @endif

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
