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
                <div class="row" style="display: flex; align-items: center; gap: 10px;">
                    <h4>{{ $product->nombre }}</h4>
                    @if ($product->clasificacion == 'muestra')
                        <img src="{{ asset('web/images/muestra.png') }}" alt="Muestra"
                            style="width: 50px; height: 50px;">
                    @endif
                </div>

                <div class="rating-strs"><i class="fa fa-star"></i><i class="fa fa-star"></i><i
                        class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i></div>
                @if ($product->valormembresia)
                    <div class="row mt-4" style="display: flex; align-items: center; gap: 10px;">
                        <img src="{{ asset('web/images/membresia.png') }}" alt="Membresía"
                            style="width: 30px; height: 30px; object-fit: contain;">

                        <span style="color: #558b18; font-weight: bold; font-size:18px">
                            <span>PRECIO CON MEMBRESÍA</span>
                            ${{ number_format($product->valormembresia, 0, ',', '.') }}
                        </span>
                    </div>
                @endif
                @if ($product->valor)
                    <span class="price"><span>PRECIO NORMAL </span> ${{ number_format($product->valor, 0, ',', '.') }}
                    </span>
                @endif


                @if ($product->iva)
                    <span class="price"><span>IVA </span> ${{ number_format($product->iva, 0, ',', '.') }}</span>
                @endif


                <ul class="item-owner">
                    <li>Clasificación:<span> {{ ucfirst($product->clasificacion) }}</span></li>
                    <li>Categoria:<span> <a href="#">{{ ucfirst($product->category->name) }}</a></span></li>
                </ul>

                <!-- Item Detail -->
                <p>{{ $product->textodestacado }}</p>


                <!-- Short By -->
                <div class="some-info">
                    @if ($product->solomembresia)
                        <button class="locked">🔒 Hazte miembro para adquirir el producto</button>
                    @else
                        <ul class="row margin-top-30">
                            @if ($product->clasificacion == 'venta')
                                <li class="col-md-6">

                                    <!-- Quantity -->
                                    <div class="quinty">
                                        <button type="button" class="quantity-left-minus" wire:click="decrement"
                                            data-type="minus" data-field="">
                                            <span>-</span> </button>
                                        <input type="number" wire:model="quantity" class="form-control input-number"
                                            value="1">
                                        <button type="button" class="quantity-right-plus" data-type="plus"
                                            data-field="" wire:click="increment">
                                            <span>+</span> </button>
                                    </div>
                                </li>
                            @endif
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
                            <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">

        <div class="m-4 col-11">
            <div class="item-decribe ml-4">
                <!-- Nav tabs -->
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item"> <a class="nav-link active show" href="#descr" role="tab"
                            data-toggle="pill" aria-selected="true">DESCRIPCIÓN DETALLADA</a></li>
                    <li class="nav-item"><a class="nav-link" href="#terms" role="tab" data-toggle="pill"
                            aria-selected="false">TERMINOS Y CONDICIONES</a></li>
                    <li class="nav-item"><a class="nav-link" href="#review" role="tab" data-toggle="pill"
                            aria-selected="false">REVIEWS</a></li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content">
                    <!-- DESCRIPTION -->
                    <div role="tabpanel" class="tab-pane active show" id="descr">
                        @if ($product->descripcionlarga)
                            <p class="text-justify">{{ $product->descripcionlarga }}</p>
                        @endif
                    </div>
                    <!-- TAGS -->
                    <div role="tabpanel" class="tab-pane fade" id="terms">
                        @if ($product->condiciones)
                            <p class="text-justify">{{ $product->condiciones }}</p>
                            @else

                            <p class="text-justify">No hay condiciones</p>
                        @endif
                    </div>
                    <!-- REVIEW -->
                    <div role="tabpanel" class="tab-pane fade" id="review">
                        <h6>3 REVIEWS FOR SHIP YOUR IDEA</h6>

                        <!-- REVIEW PEOPLE 1 -->
                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="avatar"> <a href="#"> <img class="media-object"
                                            src="images/avatar-1.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt
                                    ut
                                    labore et dolore magna aliqua.”</p>
                                <h6>TYRION LANNISTER <span class="pull-right">MAY 10, 2016</span> </h6>
                            </div>
                        </div>

                        <!-- REVIEW PEOPLE 1 -->

                        <div class="media">
                            <div class="media-left">
                                <!--  Image -->
                                <div class="avatar"> <a href="#"> <img class="media-object"
                                            src="images/avatar-2.jpg" alt=""> </a> </div>
                            </div>
                            <!--  Details -->
                            <div class="media-body">
                                <p>“Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                    incididunt
                                    ut
                                    labore et dolore magna aliqua.”</p>
                                <h6>TYRION LANNISTER <span class="pull-right">MAY 10, 2016</span> </h6>
                            </div>
                        </div>

                        <!-- ADD REVIEW -->
                        <h6 class="margin-t-40">ADD YOUR REVIEW</h6>
                        <form>
                            <ul class="row">
                                <li class="col-sm-6">
                                    <label> *NAME
                                        <input type="text" value="" placeholder="">
                                    </label>
                                </li>
                                <li class="col-sm-6">
                                    <label> *EMAIL
                                        <input type="email" value="" placeholder="">
                                    </label>
                                </li>
                                <li class="col-sm-12">
                                    <label> *YOUR REVIEW
                                        <textarea></textarea>
                                    </label>
                                </li>
                                <li class="col-sm-6">
                                    <!-- Rating Stars -->
                                    <div class="stars"> <span>YOUR RATING</span> <i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i><i
                                            class="fa fa-star"></i><i class="fa fa-star"></i></div>
                                </li>
                                <li class="col-sm-6">
                                    <button type="submit" class="btn btn-dark btn-small pull-right no-margin">POST
                                        REVIEW</button>
                                </li>
                            </ul>
                        </form>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
