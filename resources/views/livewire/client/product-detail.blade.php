<div>
    <div class="shop-detail m-4">
        <div class="row m-4">
            <!-- Popular Images Slider -->
            <div class="col-md-7" wire:ignore>
                <div class="images-slider">
                    <ul class="slides">
                        @if ($product->imagenuno_path)
                            <li data-thumb="{{ Storage::url($product->imagenuno_path) }}">
                                <img class="img-responsive" src="{{ Storage::url($product->imagenuno_path) }}"
                                    alt="{{ $product->name ?? '' }}">
                            </li>
                        @endif

                        @if ($product->imagendos_path)
                            <li data-thumb="{{ Storage::url($product->imagendos_path) }}">
                                <img class="img-responsive" src="{{ Storage::url($product->imagendos_path) }}"
                                    alt="{{ $product->name ?? '' }}">
                            </li>
                        @endif

                        @if ($product->imagentres_path)
                            <li data-thumb="{{ Storage::url($product->imagentres_path) }}">
                                <img class="img-responsive" src="{{ Storage::url($product->imagentres_path) }}"
                                    alt="{{ $product->name ?? '' }}">
                            </li>
                        @endif
                    </ul>
                </div>

            </div>

            <!-- COntent -->
            <div class="col-md-5">
                <h4> {{ $product->nombre }} </h4>
                <div class="rating-strs"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></div>
                @if ($product->clasificacion == 'muestra')
                    <span class="price"><small>MUESTRA </span>
                @elseif ($product->clasificacion == 'venta')
                    <span class="price"><small>PRECIO NORMAL $</small> {{ $product->valor }} </span>
                    <span class="price"><small>PRECIO MEMBRESIA $</small> {{ $product->valormembresia }} </span>
                    <span class="price"><small>IVA $</small> {{ $product->iva }} </span>
                @endif


                <ul class="item-owner">
                    <li>Brand:<span> Top Shop</span></li>
                    <li>Category:<span> <a href="#">{{ $product->category->name }}</a></span></li>
                </ul>

                <!-- Item Detail -->
                <p>{{ $product->textodestacado }}</p>
                @if ($product->condiciones)
                    <h6 class="m-2">Condiciones:</h6>
                    <p class="text-justify">{{ $product->condiciones }}</p>
                @endif

                <!-- Short By -->
                <div class="some-info">
                    @if ($product->solomembresia)
                        <button class="locked">🔒 Hazte miembro para adquirir el producto</button>
                    @else
                        <ul class="row margin-top-30">
                            <li class="col-md-6">

                                <!-- Quantity -->
                                <div class="quinty">
                                    <button type="button" class="quantity-left-minus" wire:click="decrement"
                                        data-type="minus" data-field="">
                                        <span>-</span> </button>
                                    <input type="number" wire:model="quantity" class="form-control input-number"
                                        value="1">
                                    <button type="button" class="quantity-right-plus" data-type="plus" data-field=""
                                        wire:click="increment">
                                        <span>+</span> </button>
                                </div>
                            </li>

                            <!-- ADD TO CART -->
                            <li class="col-md-6"> <button wire:click="addToCart" class="btn btn-primary">
                                    Añadir al Carrito
                                </button> </li>

                            <!-- LIKE -->
                            {{-- <li class="col-md-6"> <a href="#." class="like-us"><i class="icon-heart"></i> ADD TO
                                WISHLIST </a> </li> --}}
                        </ul>
                    @endif

                    <!-- INFOMATION -->
                    <div class="inner-info">
                        <h5>Compartelo con tus amigos</h5>
                        <!-- Social Icons -->
                        <ul class="social_icons">
                            <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                            <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                            <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                            <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                            <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
