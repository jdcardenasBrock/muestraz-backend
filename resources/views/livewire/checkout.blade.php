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
                                <div class="form-check mt-2 ml-3">
                                    <input type="checkbox" wire:model.live="use_profile_data" id="useProfileData"
                                        class="form-check-input">
                                    <label for="useProfileData" class="form-check-label  ">Usar datos del perfil</label>
                                </div>
                                <div class="card-body">
                                    <form wire:submit.prevent="checkout" class="row g-3">

                                        <!-- Full Name -->
                                        <div class="col-md-6">
                                            <label>Nombre completo</label>
                                            @if ($use_profile_data)
                                                <p class="form-control-plaintext">{{ $customer_name }}</p>
                                            @else
                                                <input type="text" wire:model="customer_name" class="form-control">
                                                @error('customer_name')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label>Email</label>
                                            @if ($use_profile_data)
                                                <p class="form-control-plaintext">{{ $customer_email }}</p>
                                            @else
                                                <input type="email" wire:model="customer_email" class="form-control">
                                                @error('customer_email')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label>Teléfono</label>
                                            @if ($use_profile_data)
                                                <p class="form-control-plaintext">{{ $customer_phone }}</p>
                                            @else
                                                <input type="text" wire:model="customer_phone" class="form-control">
                                                @error('customer_phone')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <label>Dirección</label>
                                            @if ($use_profile_data)
                                                <p class="form-control-plaintext">{{ $customer_address }}</p>
                                            @else
                                                <input type="text" wire:model="customer_address"
                                                    class="form-control">
                                                @error('customer_address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            @endif
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <!-- Order Summary -->
                        <div class="col-sm-5">
                            <h6>Orden de Compra</h6>
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

                                    <p>Envío:
                                        @if ($shippingCost > 0)
                                            <span>${{ number_format($shippingCost, 0, ',', '.') }}</span>
                                        @else
                                            <span class="text-warning">Completa tu dirección para calcular el
                                                envío</span>
                                        @endif
                                    </p>

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
                                                <br>
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
