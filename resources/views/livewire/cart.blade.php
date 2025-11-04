<li class="dropdown user-basket">
    <a href="#" class="dropdown-toggle font-weight-bold" data-toggle="dropdown" role="button">
        ({{ count($cart) }}) MI CARRITO <i class="icon-basket-loaded"></i>
    </a>

    <ul class="dropdown-menu" style="max-height: 600px; overflow-y: auto; overflow-x: hidden;">
        @forelse ($cart as $id => $item)

            @php
                $isMember = $membresiaActiva && isset($item['valormembresia']);
                $precioMostrar = $isMember ? $item['valormembresia'] : $item['precio'];
            @endphp
            <li class="d-flex align-items-start p-2 border-bottom">
                <div class="me-3">
                    <a href="#">
                        <img class="img-fluid rounded" src="{{ $item['imagen'] ?? asset('images/default.png') }}"
                            alt="{{ $item['nombre'] }}" style="width:70px; height:70px; object-fit:cover;">
                    </a>
                </div>
                <div class="flex-grow-1 ml-4">
                    <h6 class="mb-1">{{ $item['nombre'] }}</h6>
                     @if($isMember)
                        <span class="price d-block text-success fw-bold">
                            ${{ number_format($item['valormembresia'], 0, ',', '.') }}
                        </span>
                        <small class="price d-block text-decoration-line-through">
                            ${{ number_format($item['precio'], 0, ',', '.') }}
                        </small>
                    @else
                        ${{ number_format($item['precio'], 0, ',', '.') }}
                    @endif
                    <span class="qty d-block"><b> Cantidad: {{ $item['cantidad'] }} </b></span>
                    <a href="#" wire:click.prevent="removeItem({{ $id }})" class="text-danger small">
                        <i class="bi bi-trash"></i> Eliminar
                    </a>
                </div>
            </li>
        @empty
            <li class="text-center p-2">Carrito vacío</li>
        @endforelse

        @if ($cart)
            <li class="p-2 border-top bg-light">
                <h6 class="mb-2">SUBTOTAL: <b>COP ${{ number_format($total, 2) }}</b></h6>
                <div class="row g-2 mt-4">
                    <div class="col-6">
                        <a href="{{ route('cart.view') }}" class="btn btn-outline-dark w-100 btn-sm">Ver Carrito</a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('checkout') }}" class="btn btn-success w-100 btn-sm">Pagar</a>
                    </div>
                </div>
            </li>
        @endif
    </ul>

</li>
