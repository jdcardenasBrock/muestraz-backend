<!-- resources/views/livewire/admin/category-manager.blade.php -->
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
                                    <th class="p-2">Nombre</th>
                                    <th class="p-2">Orden</th>
                                    <th class="p-2">Activa</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $category)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $category->name }}</td>
                                        </td>
                                        <td class="p-2">{{ $carousel->order }}</td>
                                        <td class="p-2">{{ $category->active == 1 ? 'Activo' : 'Desactivado' }}
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
                        <h5 class="font-size-16 mb-1">Creación o Edición de Categorias</h5>
                    </div>
                    <div class="p-4 space-y-4 mt-4">
                        <form wire:submit.prevent="save" class="space-y-4">
                            <div class="row mb-4">
                                <label for="">Nombre</label>
                                <input wire:model="title" type="text" class="form-control" />
                            </div>                                            
                            <div class="row mb-4">
                                <label for="">Orden</label>
                                <input wire:model="order" type="number" class="form-control" />
                            </div>
                            <div class="row mb-4">
                                <label>
                                    Activa <input type="checkbox" wire:model="active"
                                        class="form-check-input" />
                                </label>
                            </div>
                            <div class="mt-3">
                                @if ($categoryId)
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
                               