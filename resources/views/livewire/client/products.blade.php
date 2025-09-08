<div>

    <div id="products" class="arrival-block col-item-4 list-group">
        <div class="row">
            @forelse($products as $product)
                <div class="item">
                    <div class="img-ser">
                        <div class="thumb">
                            <img class="img-1" src="{{ Storage::url($product->imagenuno_path) }}"
                                alt="{{ $product->name }}">
                            @if ($product->imagendos_path)
                                <img class="img-2" src="{{ Storage::url($product->imagendos_path) }}"
                                    alt="{{ $product->name }}">
                            @endif
                            <div class="overlay">
                                <div class="position-center-center"> <a class="popup-with-move-anim"
                                        href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                <div class="add-crt"><a href="#."><i class="icon-basket margin-right-10"></i>
                                        Añadir al
                                        Carrito</a>
                                </div>
                            </div>
                        </div>
                        <div class="item-card">
                            <div class="item-info">
                                <a href="#." class="i-tittle">{{ $product->nombre }}</a>
                                <small class="price">COP $
                                    {{ number_format($product->valor, 2) }}</small>
                            </div>
                            <a class="detail_card" href="#.">Ver Detalles</a>
                        </div>
                        <div class="cap-text">
                            <div class="item-name"> <a href="#." class="i-tittle">{{ $product->name }}</a>
                                <small>COP $</small>{{ number_format($product->valor, 2) }}</span>
                                <!-- Stars -->
                                <div class="stras"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                        class="fa fa-star-half-o"></i> <a href="#." class="wsh-list"><i
                                            class="icon-heart"></i>
                                        Añadir a la lista de favoritos</a> </div>
                                <!-- Details -->
                                <p> {{ \Illuminate\Support\Str::limit($product->textodestacado, 250) }}
                                </p>

                                <!-- List Style -->
                                <ul class="list-style">
                                    <li> Best Shop Products </li>
                                    <li> Color Option </li>
                                    <li> All Sizes </li>
                                    <li> Discounted Prices </li>
                                    <li> Refund Poloicy </li>
                                    <li> New Arrival </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center">No hay productos en esta categoría.</p>
            @endforelse
        </div>
    </div>

</div>
