<div>

    @if ($isOpen)
        <div class="modal fade show d-block custom-modal" tabindex="-1" style="background-color: rgba(0,0,0,0.5); z-index: 99999 !important;">
            <div class="modal-dialog modal-lg modal-dialog-centered" style="z-index: 100000 !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ $product->nombre ?? 'Producto' }}</h5>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"
                            wire:click="closeModal">
                            <span aria-hidden="true"><b>X</b></span>
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
                                        <li data-thumb="{{ $product->imagendos_path }}">
                                            <img src="{{ Storage::url($product->imagendos_path) }}" class="img-2"
                                                style="width: 240px" alt="" />
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Content Info -->
                            <div class="col-md-6">
                                <div class="contnt-info">
                                    <h3>{{ $product->nombre ?? 'Producto' }}</h3>
                                    <p class="responsive-text">{!! $product->descripcionlarga !!}</p>
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
                                    <div class="alert alert-{{ $alertType }} alert-dismissible fade show shadow-sm border-0 position-relative"
                                        role="alert" id="livewire-alert"
                                        style="padding: 1rem 3rem 1rem 1.25rem; font-size: 1rem; line-height: 1.4; border-radius: 0.75rem;">
                                        <strong>{{ $alertMessage }}</strong>

                                        <button type="button" class="btn-close text-dark position-absolute"
                                            data-bs-dismiss="alert" aria-label="Close" wire:click="clear"
                                            style="top: 0.75rem; right: 1rem; font-size: 1.2rem; opacity: 0.7;">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
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
