<div>
    @if ($isOpen)
        <div class="modal fade show d-block" tabindex="-1" style="background-color: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $product->nombre ?? 'Producto' }}</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Images Slider -->
                                <div class="images-slider">
                                    <ul class="slides">
                                        <li data-thumb="{{ $product->imagenuno_path }}">
                                            <img src="{{ Storage::url($product->imagenuno_path) }}" class="img-1"
                                                style="width: 240px" alt="" />
                                        </li>
                                        {{-- <li data-thumb="{{$product->imagendos_path}}">
                              <img src="{{ Storage::url($product->imagendos_path) }}" class="img-2" style="width: 240px" alt="" />
                            </li> --}}
                                    </ul>
                                </div>
                            </div>
                            <!-- Content Info -->
                            <div class="col-md-6">
                                <div class="contnt-info">
                                    <h3>{{ $product->nombre ?? 'Producto' }}</h3>
                                    <p>{{ $product->descripcionlarga }}</p>
                                    @if ($product->solomembresia)
                                        <button class="locked">🔒 Hazte miembro para adquirir el producto</button>
                                    @else
                                        <div class="add-info d-flex align-items-center">

                                            @if ($product->clasificacion == 'venta')
                                                <div class="quantity me-2">
                                                    <div class="d-flex align-items-center">
                                                        <input type="number" min="1" max="100"
                                                            step="1" class="form-control qty text-center"
                                                            wire:model="quantity">

                                                        <div class="quantity-nav d-flex flex-column ms-2">
                                                            <button
                                                                class="quantity-button quantity-up btn btn-light p-1"
                                                                wire:click="increment"><i
                                                                    class="fa fa-caret-up"></i></button>
                                                            <button
                                                                class="quantity-button quantity-down btn btn-light p-1"
                                                                wire:click="decrement"><i
                                                                    class="fa fa-caret-down"></i></button>
                                                        </div>
                                                    </div>

                                                </div>
                                            @endif

                                            <button wire:click="addToCart" class="btn btn-primary">
                                                Añadir al Carrito
                                            </button>
                                        </div>
                                    @endif
                                    <br>
                                </div>
                                @if ($alertMessage)
                                    <div class="alert alert-{{ $alertType }} alert-dismissible fade show"
                                        role="alert" id="livewire-alert">
                                        <p>{{ $alertMessage }}<button type="button" class="btn-close"
                                                data-bs-dismiss="alert" aria-label="Close"></button></p>

                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

@section('scripts')
    <script>
        document.addEventListener('livewire:load', function() {
            window.addEventListener('hide-alert', event => {
                setTimeout(() => {
                    const alert = document.getElementById('livewire-alert');
                    if (alert) {
                        alert.classList.remove('show');
                        alert.classList.add('hide');
                    }
                }, event.detail.timeout || 3000);
            });
        });
    </script>
@endsection
