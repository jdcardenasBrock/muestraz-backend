<!-- resources/views/livewire/admin/carousel-manager.blade.php -->
<div>
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="font-size-16 mb-1">Listado</h5>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light text-center">
                                <tr class="bg-gray-200">
                                    <th class="p-2">Título</th>
                                    <th class="p-2">Estatus</th>
                                    <th class="p-2">Orden</th>
                                    <th class="p-2">Imagen</th>
                                    <th class="p-2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($carousels as $carousel)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $carousel->title }}</td>
                                        <td class="p-2">{{ $carousel->active == 1 ? 'Activo' : 'Desactivado' }}
                                        </td>
                                        <td class="p-2">{{ $carousel->order }}</td>
                                        <td class="p-2">
                                            @if ($carousel->layout_type == 'full')
                                                <img src="{{ Storage::url($carousel->image_path) }}"
                                                    style="max-width:90px; height:auto; border-radius:8px;">
                                            @elseif ($carousel->layout_type == 'split')
                                                <div style="display: flex; gap: 10px; justify-content: center;">
                                                    <img src="{{ Storage::url($carousel->image_left) }}"
                                                        style="max-width:90px; height:auto; border-radius:8px;">
                                                    <img src="{{ Storage::url($carousel->image_right) }}"
                                                        style="max-width:90px; height:auto; border-radius:8px;">
                                                </div>
                                            @endif
                                        </td>
                                        <td class="p-2 space-x-2">
                                            <button wire:click="edit({{ $carousel->id }})"
                                                class="text-success btn btn-link waves-effect"><i
                                                    class="mdi mdi-pencil font-size-18"></i></button>
                                            <button wire:click="delete({{ $carousel->id }})"
                                                class="text-danger btn btn-link waves-effect"><i
                                                    class="mdi mdi-delete font-size-18"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card checkout-order-summary">
                <div class="card-body">
                    <div>
                        <h5 class="font-size-16 mb-1">Creación o Edición de Banners</h5>
                    </div>
                    <div class="p-4 space-y-4 mt-4">
                        <form wire:submit.prevent="save" enctype="multipart/form-data" class="space-y-4">
                            <div class="row mb-4">
                                <label for="">Titulo <span class="text-danger">*</span></label>
                                <input wire:model="title" type="text" class="form-control" />
                            </div>

                            <div class="row mb-4">
                                <label for="">Descripción <span class="text-danger">*</span></label>
                                <textarea wire:model="description" placeholder="" class="form-control"></textarea>
                            </div>

                            <!-- Tipo de Banner -->
                            <div class="row mb-4">
                                <label for="">Tipo de Banner <span class="text-danger">*</span></label><br>

                                <label>
                                    <input type="radio" name="layout_type" value="full"
                                        wire:model.live="layout_type" />
                                    Banner Completo
                                </label>

                                <label class="ml-3">
                                    <input type="radio" name="layout_type" value="split"
                                        wire:model.live="layout_type" />
                                    Banner Dividido
                                </label>
                            </div>
                            <!-- Imagenes -->
                            @if ($layout_type === 'full')
                                <div class="row mb-4">
                                    <label for="">Imagen de Banner <span class="text-danger">*</span></label>
                                    <input wire:model="image" type="file" class="form-control" />

                                    <div class="mt-2">
                                        @if ($image)
                                            {{-- Preview temporal si se está subiendo --}}
                                            <img src="{{ $image->temporaryUrl() }}"
                                                style="max-width:200px; height:auto; border-radius:8px;">
                                        @elseif($carouselSelected)
                                            {{-- Imagen guardada en BD --}}
                                            <img src="{{ Storage::url($carouselSelected->image_path) }}"
                                                style="max-width:200px; height:auto; border-radius:8px;">
                                        @endif
                                    </div>
                                </div>
                            @elseif ($layout_type === 'split')
                                <div class="row mb-4">
                                    <label for="">Imagen Izquierda <span class="text-danger">*</span></label>
                                    <input wire:model="image_left" type="file" class="form-control" />
                                </div>
                                <div class="row mb-4">
                                    <label for="">Imagen Derecha <span class="text-danger">*</span></label>
                                    <input wire:model="image_right" type="file" class="form-control" />
                                </div>
                            @endif

                            <div class="row mb-4">
                                @if ($image_left && $image_right)
                                    {{-- Preview temporal si se está subiendo --}}
                                    <div style="display: flex; gap: 10px; justify-content: center;">
                                        <img src="{{ $image_left->temporaryUrl() }}"
                                            style="max-width:200px; height:auto; border-radius:8px;">
                                        <img src="{{ $image_right->temporaryUrl() }}"
                                            style="max-width:200px; height:auto; border-radius:8px;">
                                    </div>
                                @elseif($carouselSelected)
                                    {{-- Imagen guardada en BD --}}
                                    <div style="display: flex; gap: 10px; justify-content: center;">
                                        <img src="{{ Storage::url($carouselSelected->image_left) }}"
                                            style="max-width:200px; height:auto; border-radius:8px;">
                                        <img src="{{ Storage::url($carouselSelected->image_right) }}"
                                            style="max-width:200px; height:auto; border-radius:8px;">
                                    </div>
                                @endif
                            </div>

                            <div class="row mb-4">
                                <label for="">Url de Redirección</label>
                                <input wire:model="link" type="text" placeholder="https://ejemplo.com"
                                    class="form-control" />
                            </div>

                            <div class="row mb-4">
                                <label for="">Tipo de Url</label>
                                <select wire:model="target" class="form-select w-full">
                                    <option value="">Seleccionar</option>
                                    <option value="_self">Misma pestaña</option>
                                    <option value="_blank">Nueva pestaña</option>
                                </select>
                            </div>

                            <div class="row mb-4">
                                <label for="">Orden <span class="text-danger">*</span></label>
                                <input wire:model="order" type="number" class="form-control" />
                            </div>

                            <div class="row mb-4">
                                <label>
                                    <input type="checkbox" wire:model="active"
                                        class="form-check-input" /> Mantener Activo? <span class="text-danger">*</span> 
                                </label>
                            </div>

                            <div class="mt-3">
                                @if ($carouselId)
                                    <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                @else
                                    <button type="submit" class="btn btn-success w-md">Crear</button>
                                @endif
                                 <button type="button" class="btn btn-secondary w-md" wire:click="resetForm">Limpiar Formulario</button>
                            </div>
                        </form>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
</div>
