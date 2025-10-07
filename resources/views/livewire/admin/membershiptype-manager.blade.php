<!-- resources/views/livewire/admin/categorymembershiptype-manager.blade.php -->
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
                                    <th class="p-2">Tipo</th>
                                    <th class="p-2">Valor</th>
                                    <th class="p-2">Cantidad Muestras</th>
                                    <th class="p-2">Cantidad de Meses</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($$membershiptype as $$membershiptype)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $$membershiptype->type }}</td>                                        
                                        <td class="p-2">{{ $$membershiptype->value }} 
                                        </td>
                                        <td class="p-2">{{ $membershiptype->quantitysamples }}</td>
                                        <td class="p-2">{{ $membershiptype->quantitymonths }}</td>
                                        <td class="p-2 space-x-2">
                                            <button wire:click="edit({{ $membershiptype->id }})"
                                                class="text-success btn btn-link waves-effect"><i
                                                    class="mdi mdi-pencil font-size-18"></i></button>
                                            <button wire:click="delete({{ $membershiptype->id }})"
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
                        <h5 class="font-size-16 mb-1">Creación o Edición de Membresias</h5>
                    </div>
                    <div class="p-4 space-y-4 mt-4">
                        <form wire:submit.prevent="save" class="space-y-4">
                            <div class="row mb-4">
                                <label for="">Tipo</label>
                                <input wire:model="type" type="text" class="form-control" />
                            </div> 
                            <div class="row mb-4">
                                <label for="">Valor</label>
                                <input wire:model="value" type="number" class="form-control" />
                            </div>                           
                            <div class="row mb-4">
                                <label for="">Cantidad Muestras</label>
                                <input wire:model="quantitysamples" type="number" class="form-control" />
                            </div>
                            <div class="row mb-4">
                                <label for="">Cantidad de Meses</label>
                                <input wire:model="quantitymonths" type="number" class="form-control" />
                            </div>

                            <div class="mt-3">
                                @if ($membershiptypeId)
                                    <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                @else
                                    <button type="submit" class="btn btn-success w-md">Crear</button>
                                @endif

                                    <button type="button" class="btn btn-secondary w-md" wire:click="clear">Limpiar Formulario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                               