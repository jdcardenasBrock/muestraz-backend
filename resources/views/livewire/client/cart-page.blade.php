<div>
    <div class="container py-5">
        <div class="card shadow-lg border-0">
            <div class="card-body p-4">
                <h4 class="mb-4">🛒 Carrito de Compras</h4>

                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-dark">
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
                                                alt="{{ $item['nombre'] }}" class="img-fluid rounded me-4"
                                                style="width:70px;">
                                            <div class="pl-4">
                                                <strong class="h6">{{ $item['nombre'] }}</strong>
                                                <p class="text-muted small mb-0">{{ $item['textodestacado'] ?? '' }}</p>
                                            </div>
                                        </td>

                                        <td>${{ number_format($item['precio'], 2) }}</td>

                                        <td style="width:120px;">
                                            <input type="number" min="1" value="{{ $item['cantidad'] }}"
                                                class="form-control text-center"
                                                wire:change="updateCart({{ $id }}, $event.target.value)">
                                        </td>

                                        <td>${{ number_format($item['precio'] * $item['cantidad'], 2) }}</td>

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
                <div class="row mt-5">
                    <div class="col-md-7">
                        <h6>Código de Descuento</h6>
                        <form class="d-flex mb-3">
                            <input type="text" class="form-control me-2" placeholder="Ingresa tu código">
                            <button type="button" class="btn btn-dark">Aplicar</button>
                        </form>
                        <div>
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary me-2">Seguir Comprando</a>
                            <button wire:click="$refresh" class="btn btn-outline-primary">Actualizar Carrito</button>
                        </div>
                    </div>

                    <div class="col-md-5">
                        <h6>Total a Pagar</h6>
                        <div class="p-3 border rounded bg-light">
                            <h5 class="d-flex justify-content-between mb-0">
                                TOTAL <span>${{ number_format($grandTotal, 2) }}</span>
                            </h5>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-success w-100 mt-3">
                            Proceder al Pago
                        </a>
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
        <script>
            document.addEventListener('livewire:init', () => {
                Livewire.on('cart-item-removed', (event) => {
                    let product = event.name ?? 'Producto';
                    alert(`❌ ${product} eliminado del carrito`);
                    // o si usas Toastify / Bootstrap Toast aquí lo llamas
                });
            });
        </script>
    @endpush

</div>
