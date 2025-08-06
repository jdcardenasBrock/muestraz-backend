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
                                        <td class="p-2"><img src="{{ Storage::url($carousel->image_path) }}"
                                                alt="" style="width: 90px"> </td>
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
                        <form wire:submit.prevent="save" class="space-y-4">
                            <div class="row mb-4">
                                <label for="">Titulo</label>
                                <input wire:model="title" type="text" class="form-control" />
                            </div>
                            <div class="row mb-4">
                                <label for="">Descripción</label>
                                <textarea wire:model="description" placeholder="" class="form-control"></textarea>
                            </div>

                            <div class="row mb-4">
                                <label for="">Imagen de Banner</label>
                                <input wire:model="image" type="file" class="form-control" />
                            </div>
                            <div class="row mb-4">
                                <label for="">Url de Redirección</label>
                                <input wire:model="link" type="url" placeholder="https://ejemplo.com"
                                    class="form-control" />
                            </div>
                            <div class="row mb-4">
                                <label for="">Tipo de Url</label>
                                <select wire:model="target" class="form-select w-full">
                                    <option value="_self">Misma pestaña</option>
                                    <option value="_blank">Nueva pestaña</option>
                                </select>
                            </div>
                            <div class="row mb-4">
                                <label for="">Orden</label>
                                <input wire:model="order" type="number" class="form-control" />
                            </div>

                            <div class="row mb-4">
                                <label>
                                    Mantener Activo? <input type="checkbox" wire:model="active"
                                        class="form-check-input" />
                                </label>
                            </div>
                            <div class="mt-3">
                                @if ($carouselId)
                                    <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                @else
                                    <button type="submit" class="btn btn-success w-md">Crear</button>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
