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

                                    <!-- Botones -->
                                    <div class="add-info d-flex align-items-center">
                                        <div class="quantity me-2">
                                            <input type="number" min="1" max="100" step="1"
                                                wire:model="quantity" class="form-control qty" />
                                        </div>
                                        <button wire:click="addToCart" class="btn btn-primary">
                                            Añadir al Carrito
                                        </button>
                                    </div>
                                </div>
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
