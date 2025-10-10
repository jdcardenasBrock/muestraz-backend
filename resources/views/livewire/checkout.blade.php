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
                            <h6>Billing & Shipping Information</h6>
                            <form wire:submit.prevent="checkout">
                                <ul class="row">
                                    <li class="col-md-6">
                                        <label> *Full Name
                                            <input type="text" wire:model="customer_name">
                                            @error('customer_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </li>
                                    <li class="col-md-6">
                                        <label> *Email
                                            <input type="email" wire:model="customer_email">
                                            @error('customer_email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </li>
                                    <li class="col-md-6">
                                        <label> *Phone
                                            <input type="text" wire:model="customer_phone">
                                            @error('customer_phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </li>
                                    <li class="col-md-6">
                                        <label> *Address
                                            <input type="text" wire:model="customer_address">
                                            @error('customer_address')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </li>

                                    <!-- Shipping Zone -->
                                    <li class="col-md-6">
                                        <label>Shipping Zone
                                            <select wire:model="shipping_zone_id">
                                                <option value="">Selecciona zona</option>
                                                @foreach ($zones as $zone)
                                                    <option value="{{ $zone->id }}">{{ $zone->name }} -
                                                        ${{ number_format($zone->price, 0, ',', '.') }}</option>
                                                @endforeach
                                            </select>
                                            @error('shipping_zone_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </li>
                                </ul>
                            </form>
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
                                    <ul>
                                        <li>
                                            <input type="radio" wire:model="payment_method" value="bank"
                                                id="bank">
                                            <label for="bank">Transferencia Bancaria</label>
                                        </li>
                                        <li>
                                            <input type="radio" wire:model="payment_method" value="cash"
                                                id="cash">
                                            <label for="cash">Pago contra entrega</label>
                                        </li>
                                        <li>
                                            <input type="radio" wire:model="payment_method" value="payu"
                                                id="payu">
                                            <label for="payu">PayU / PayPal</label>
                                        </li>
                                    </ul>
                                    @error('payment_method')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                    <div class="checkbox mt-2">
                                        <input type="checkbox" wire:model="accept_terms" id="terms">
                                        <label for="terms">He leído y acepto los <span class="color">términos y
                                                condiciones</span></label>
                                        @error('accept_terms')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button wire:click="checkout" class="btn btn-dark w-100 mt-3"
                                        @if (!$accept_terms || !$payment_method) disabled @endif>
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
