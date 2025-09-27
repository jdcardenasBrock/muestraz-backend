<li class="dropdown user-basket">
    <a href="#" class="dropdown-toggle font-weight-bold" data-toggle="dropdown" role="button">
        ({{ count($cart) }}) MI CARRITO <i class="icon-basket-loaded"></i>
    </a>

    <ul class="dropdown-menu">
        @forelse ($cart as $id => $item)
            <li>
                <div class="media-left">
                    <div class="cart-img">
                        <a href="#">
                            <img class="media-object img-responsive"
                                 src="{{ $item['imagen'] ?? asset('images/default.png') }}"
                                 style="width:192px;"
                                 alt="{{ $item['nombre'] }}">
                        </a>
                    </div>
                </div>
                <div class="media-body">
                    <h5 class="media-heading">{{ $item['nombre'] }}</h5>
                    <span class="price">COP ${{ number_format($item['precio'], 2) }} </span>
                    <span class="qty">CANT: {{ $item['cantidad'] }}</span>
                    <a href="#" wire:click.prevent="removeItem({{ $id }})" class="text-danger">❌ ELIMINAR</a>
                </div>
            </li>
        @empty
            <li class="text-center p-2">Carrito vacío</li>
        @endforelse

        @if ($cart)
            <li>
                <h5 class="text-left">
                    SUBTOTAL: <small>COP ${{ number_format($total, 2) }} </small>
                </h5>
            </li>
            <li class="margin-0">
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('cart.view') }}" class="btn">VIEW CART</a>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{ route('checkout') }}" class="btn">CHECK OUT</a>
                    </div>
                </div>
            </li>
        @endif
    </ul>
</li>
