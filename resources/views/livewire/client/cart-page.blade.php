<div>
    <style>
        /* ---------- General ---------- */
        body,
        .cart-table {
            font-family: 'Inter', sans-serif;
            font-size: 14px;
            color: #333;
        }

        /* ---------- Tabla ---------- */
        .cart-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 10px;
        }

        .cart-table th,
        .cart-table td {
            vertical-align: middle !important;
            padding: 12px 15px;
        }

        .cart-table thead th {
            background-color: #343a40;
            color: #fff;
            border: none;
        }

        .cart-table tbody tr {
            background: #fff;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            transition: transform 0.2s;
        }

        .cart-table tbody tr:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .cart-table img {
            width: 70px;
            height: 70px;
            object-fit: cover;
            border-radius: 6px;
        }

        .cart-table .product-info strong {
            font-size: 15px;
        }

        .cart-table .product-info p {
            font-size: 13px;
            color: #6c757d;
        }

        /* ---------- Cantidades ---------- */
        .cart-table input.form-control {
            font-size: 14px;
            height: 36px;
            text-align: center;
        }

        .cart-table .quantity-fixed {
            text-align: center;
            font-weight: 600;
            color: #198754;
        }

        /* ---------- Botones ---------- */
        .cart-table .btn-outline-danger {
            width: 36px;
            height: 36px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .btn {
            font-weight: 600;
        }

        /* ---------- Badges ---------- */
        .badge-sale {
            background-color: #ffc107;
            color: #000;
            font-weight: 600;
            padding: 3px 6px;
            border-radius: 4px;
        }

        .badge-sample {
            background-color: #198754;
            color: #fff;
            font-weight: 600;
            padding: 3px 6px;
            border-radius: 4px;
        }

        /* ---------- Resumen / Totales ---------- */
        .cart-summary h5,
        .cart-summary h6 {
            font-weight: 600;
        }

        .cart-summary .btn {
            font-weight: 600;
        }

        .cart-summary .total-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 15px;
            box-shadow: inset 0 0 3px rgba(0, 0, 0, 0.05);
        }
    </style>

    <div class="container py-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-4">
                <h4 class="mb-4">🛒 Carrito de Compras</h4>

                <!-- Tabla Carrito -->
                <div class="table-responsive">
                    <table class="table align-middle cart-table">
                        <thead>
                            <tr>
                                <th class="text-start pl-4">Producto</th>
                                <th>Precio</th>
                                <th>Cantidad</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($cart && count($cart) > 0)
                                @foreach ($cart as $id => $item)
                                    <tr>
                                        <td class="d-flex align-items-center">
                                            <img src="{{ $item['imagen'] ?? 'https://via.placeholder.com/70' }}"
                                                alt="{{ $item['nombre'] }}">
                                            <div class="pl-3 product-info">
                                                <strong>{{ $item['nombre'] }}</strong>
                                                <p>{{ $item['textodestacado'] ?? '' }}</p>
                                            </div>
                                        </td>

                                        <td>
                                            @if ($item['clasificacion'] === 'muestra')
                                                <span class="badge-sample">Muestra</span>
                                            @else
                                                ${{ number_format($item['precio'], 2) }}
                                            @endif
                                        </td>

                                        <td style="width:120px;">
                                            @if ($item['clasificacion'] === 'muestra')
                                                <div class="quantity-fixed">1 Muestra</div>
                                            @else
                                                <input type="number" min="1" value="{{ $item['cantidad'] }}"
                                                    class="form-control text-center"
                                                    wire:change="updateCart({{ $id }}, $event.target.value)">
                                            @endif
                                        </td>

                                        <td>
                                            @if ($item['clasificacion'] === 'muestra')
                                                <span class="text-success">--</span>
                                            @else
                                                ${{ number_format($item['precio'] * $item['cantidad'], 2) }}
                                            @endif
                                        </td>

                                        <td>
                                            <button class="btn btn-sm btn-outline-danger rounded-circle"
                                                wire:click="removeFromCart({{ $id }})" title="Eliminar">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4">
                                        Tu carrito está vacío 🛍️
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>

                <!-- Totales -->
                <div class="cart-summary row mt-5">
                    <div class="col-md-7">
                        {{-- <h6>Código de Descuento</h6>
                        <form class="d-flex mb-3">
                            <input type="text" class="form-control me-2" placeholder="Ingresa tu código">
                            <button type="button" class="btn btn-dark">Aplicar</button>
                        </form> --}}
                        <div class="d-flex gap-2">
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-secondary">Seguir Comprando</a>
                            {{-- <button wire:click="$refresh" class="btn btn-outline-primary">Actualizar Carrito</button> --}}
                        </div>
                    </div>

                    <div class="col-md-5">
                        <h6>Total a Pagar</h6>
                        <div class="total-box">
                            <h5 class="d-flex justify-content-between mb-0">
                                TOTAL <span>${{ number_format($grandTotal, 2) }}</span>
                            </h5>
                        </div>
                        {{-- <a href="{{ route('checkout') }}" class="btn btn-success w-100 mt-3">
                            Proceder al Pago
                        </a> --}}

                        <div>
                            {{-- Botón principal --}}
                            <button wire:click="proceed" class="btn btn-success w-100 mt-3 mb-4">
                                Proceder al Pago
                            </button>

                            {{-- Modal --}}
                            @if ($showModal)
                                <div class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
                                    wire:click.self="$set('showModal', false)">
                                    <div class="bg-white rounded-2xl shadow-lg p-6 w-11/12 md:w-1/3">
                                        <h5 class="text-lg font-semibold mb-3 text-warning">
                                            ⚠️ Datos incompletos
                                        </h5>
                                        <p class="text-gray-700 mb-4">
                                            Para continuar con tu compra, por favor completa tu información de envío en
                                            tu perfil. <br>
                                            Necesitamos dirección, ciudad, departamento, tipo y número de documento, y
                                            número de celular.
                                        </p>
                                        <div class="flex justify-end gap-2">
                                            <button wire:click="$set('showModal', false)" class="btn btn-secondary">
                                                Cerrar
                                            </button>
                                            <button wire:click="goToProfile" class="btn btn-primary">
                                                Ir al Perfil
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            window.addEventListener('cart-item-removed', event => {
                Swal.fire({
                    icon: 'success',
                    title: 'Producto eliminado',
                    text: event.detail.name + ' se eliminó del carrito',
                    timer: 2000,
                    showConfirmButton: false
                });
            });
        </script>
    @endpush
</div>
