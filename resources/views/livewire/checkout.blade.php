<div>
    <section class="sub-bnr" data-stellar-background-ratio="0.5">
        <div class="position-center-center">
            <div class="container">
                <h4>Checkout your order</h4>
                <ol class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">SHOP</a></li>
                    <li class="active">CHECKOUT</li>
                </ol>
            </div>
        </div>
    </section>
    <!-- Content -->
    <div id="content">
        <!--======= PAGES INNER =========-->
        <section class="chart-page padding-top-100 padding-bottom-100">
            <div class="container">

                <!-- Payments Steps -->
                <div class="shopping-cart">

                    <!-- SHOPPING INFORMATION -->
                    <div class="cart-ship-info">
                        <div class="row">

                            <!-- ESTIMATE SHIPPING & TAX -->
                            <div class="col-sm-7">
                                <h6>Billing Information</h6>
                                <form>
                                    <ul class="row">

                                        <!-- Name -->
                                        <li class="col-md-6">
                                            <label> *FIRST NAME
                                                <input type="text" name="first-name" value="" placeholder="">
                                            </label>
                                        </li>
                                        <!-- LAST NAME -->
                                        <li class="col-md-6">
                                            <label> *LAST NAME
                                                <input type="text" name="last-name" value="" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-md-6">
                                            <!-- COMPANY NAME -->
                                            <label>COMPANY NAME
                                                <input type="text" name="company" value="" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-md-6">
                                            <!-- ADDRESS -->
                                            <label>*ADDRESS
                                                <input type="text" name="address" value="" placeholder="">
                                            </label>
                                        </li>
                                        <!-- TOWN/CITY -->
                                        <li class="col-md-6">
                                            <label>*TOWN/CITY
                                                <input type="text" name="town" value="" placeholder="">
                                            </label>
                                        </li>

                                        <!-- COUNTRY -->
                                        <li class="col-md-6">
                                            <label> COUNTRY
                                                <input type="text" name="contry-state" value="" placeholder="">
                                            </label>
                                        </li>

                                        <!-- EMAIL ADDRESS -->
                                        <li class="col-md-6">
                                            <label> *EMAIL ADDRESS
                                                <input type="text" name="contry-state" value="" placeholder="">
                                            </label>
                                        </li>
                                        <!-- PHONE -->
                                        <li class="col-md-6">
                                            <label> *PHONE
                                                <input type="text" name="postal-code" value="" placeholder="">
                                            </label>
                                        </li>

                                        <!-- PHONE -->
                                        <li class="col-md-6">
                                            <button type="submit" class="btn">continue</button>
                                        </li>

                                        <!-- CREATE AN ACCOUNT -->
                                        <li class="col-md-6">
                                            <div class="checkbox margin-0 ">
                                                <input id="checkbox1" class="styled" type="checkbox">
                                                <label for="checkbox1"> Ship to a different address </label>
                                            </div>
                                        </li>
                                    </ul>
                                </form>

                                <!-- SHIPPING info -->
                                <h6 class="margin-top-50">Shipping information</h6>
                                <form>
                                    <ul class="row">

                                        <!-- Name -->
                                        <li class="col-md-6">
                                            <label> *FIRST NAME
                                                <input type="text" name="first-name" value="" placeholder="">
                                            </label>
                                        </li>
                                        <!-- LAST NAME -->
                                        <li class="col-md-6">
                                            <label> *LAST NAME
                                                <input type="text" name="last-name" value="" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-md-6">
                                            <!-- COMPANY NAME -->
                                            <label>COMPANY NAME
                                                <input type="text" name="company" value="" placeholder="">
                                            </label>
                                        </li>
                                        <li class="col-md-6">
                                            <!-- ADDRESS -->
                                            <label>*ADDRESS
                                                <input type="text" name="address" value="" placeholder="">
                                            </label>
                                        </li>
                                        <!-- TOWN/CITY -->
                                        <li class="col-md-6">
                                            <label>*TOWN/CITY
                                                <input type="text" name="town" value="" placeholder="">
                                            </label>
                                        </li>

                                        <!-- COUNTRY -->
                                        <li class="col-md-6">
                                            <label> COUNTRY
                                                <input type="text" name="contry-state" value="" placeholder="">
                                            </label>
                                        </li>

                                        <!-- EMAIL ADDRESS -->
                                        <li class="col-md-6">
                                            <label> *EMAIL ADDRESS
                                                <input type="text" name="contry-state" value=""
                                                    placeholder="">
                                            </label>
                                        </li>
                                        <!-- PHONE -->
                                        <li class="col-md-6">
                                            <label> *PHONE
                                                <input type="text" name="postal-code" value=""
                                                    placeholder="">
                                            </label>
                                        </li>

                                        <!-- PHONE -->
                                        <li class="col-md-6">
                                            <button type="submit" class="btn">SUBMIT</button>
                                        </li>
                                    </ul>
                                </form>
                            </div>

                            <!-- SUB TOTAL -->
                            <!-- SUB TOTAL -->
                            <div class="col-sm-5">
                                <h6>Tu Pedido</h6>
                                <div class="order-place">
                                    <div class="order-detail">

                                        @forelse($cart as $id => $item)
                                            <p>
                                                {{ $item['nombre'] }} (x{{ $item['cantidad'] }})
                                                <span>${{ number_format($item['precio'] * $item['cantidad'], 0, ',', '.') }}</span>
                                            </p>
                                        @empty
                                            <p>Carrito vacío</p>
                                        @endforelse

                                        <p>Envío
                                            <span>
                                                @if ($shippingCost > 0)
                                                    ${{ number_format($shippingCost, 0, ',', '.') }}
                                                @else
                                                    Selecciona ubicación
                                                @endif
                                            </span>
                                        </p>

                                        <p>IVA
                                            <span>${{ number_format($iva, 0, ',', '.') }}</span>
                                        </p>

                                        <!-- TOTAL -->
                                        <p class="all-total">
                                            TOTAL
                                            <span>${{ number_format($grandTotal, 0, ',', '.') }}</span>
                                        </p>
                                    </div>

                                    <!-- Métodos de pago -->
                                    <div class="pay-meth">
                                        <ul>
                                            <li>
                                                <div class="radio">
                                                    <input type="radio" name="payment" id="bank"
                                                        value="bank" wire:model="payment_method">
                                                    <label for="bank"> Transferencia Bancaria </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio">
                                                    <input type="radio" name="payment" id="cash"
                                                        value="cash" wire:model="payment_method">
                                                    <label for="cash"> Pago contra entrega </label>
                                                </div>
                                            </li>
                                            <li>
                                                <div class="radio">
                                                    <input type="radio" name="payment" id="paypal"
                                                        value="paypal" wire:model="payment_method">
                                                    <label for="paypal"> PayPal </label>
                                                </div>
                                            </li>
                                        </ul>

                                        <div class="checkbox">
                                            <input id="terms" type="checkbox" wire:model="accept_terms">
                                            <label for="terms"> He leído y acepto los <span class="color">términos
                                                    y condiciones</span> </label>
                                        </div>

                                        <button wire:click="placeOrder" class="btn btn-dark pull-right margin-top-30">
                                            Realizar pedido
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
</div>
</div>
