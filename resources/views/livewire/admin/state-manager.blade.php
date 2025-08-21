<!-- resources/views/livewire/admin/state-manager.blade.php -->

@php
    use Illuminate\Support\Facades\Crypt;
@endphp

 <div class="m-4">
    <div class="row mb-4">
        <div class="col-xl-3 col-md-12">
            <div class="pb-3 pb-xl-0">
                <form class="email-search">
                    <div class="position-relative">
                        <input type="text" wire:model.live="search" placeholder="Buscar departamentos..."
                            class="form-control mb-3" />
                        <span class="bx bx-search font-size-18"></span>
                    </div>
                </form>
            </div>
        </div>
    </div>


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
                                    <th class="p-2">Codigo Dane</th>
                                    <th class="p-2">Nombre</th>
                                    <th class="p-2">Opciones</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($state as $state)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $state->codigo_dane }}</td>                                        
                                        <td class="p-2">{{ $state->nombre }} 
                                        </td>
                                        <td class="p-2 space-x-2">
                                            <button wire:click="edit({{ $state->id }})"
                                                class="text-success btn btn-link waves-effect"><i
                                                    class="mdi mdi-pencil font-size-18"></i></button>
                                            <button wire:click="delete({{ $state->id }})"
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
                        <h5 class="font-size-16 mb-1">Creación o Edición de Departamentos</h5>
                    </div>
                    <div class="p-4 space-y-4 mt-4">
                        <form wire:submit.prevent="save" class="space-y-4">
                            <div class="row mb-4">
                                <label for="">Codigo Dane</label>
                                <input wire:model="codigo_dane" type="text" class="form-control" />
                            </div>                           
                            <div class="row mb-4">
                                <label for="">Nombre</label>
                                <input wire:model="nombre" type="text" class="form-control" />
                            </div>
                            <div class="mt-3">
                                @if ($stateId)
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
                               