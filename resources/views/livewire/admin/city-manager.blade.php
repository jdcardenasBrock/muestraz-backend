<!-- resources/views/livewire/admin/city-manager.blade.php -->

<div class="m-4">
    <div class="row mb-4">
        <div class="col-xl-3 col-md-12">
            <div class="pb-3 pb-xl-0">
                <form class="email-search">
                    <div class="position-relative">
                        <input type="text" wire:model.live="search" placeholder="Buscar ciudades..."
                            class="form-control mb-3" />
                        <span class="bx bx-search font-size-18"></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-9 col-md-12">
            <div class="pb-3 pb-xl-0">
                <div class="btn-toolbar float-end" role="toolbar">
                    <div class="btn-group me-2 mb-2">
                        {{-- <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Exportar <i class="mdi mdi-dots-vertical ms-2"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Excel</a>
                            <a class="dropdown-item" href="#">PDF</a>
                            <a class="dropdown-item" href="#">JSON</a>
                        </div> --}}
                    </div>
                </div>
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
                                        <th class="p-2">Departamento</th>
                                        <th class="p-2">Costo Envío</th>
                                        <th class="p-2">Opciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cities as $city)
                                        <tr class="border-t text-center">
                                            <td class="p-2">{{ $city->codigo_dane }}</td>
                                            <td class="p-2">{{ $city->nombre }}
                                            <td class="p-2">{{ $city->state->nombre }}</td>
                                            <td class="p-2">{{ $city->costoenvio }}</td>
                                            </td>
                                            <td class="p-2 space-x-2">
                                                <button wire:click="edit({{ $city->id }})"
                                                    class="text-success btn btn-link waves-effect"><i
                                                        class="mdi mdi-pencil font-size-18"></i></button>
                                                <button wire:click="delete({{ $city->id }})"
                                                    class="text-danger btn btn-link waves-effect"><i
                                                        class="mdi mdi-delete font-size-18"></i></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                               

                            </table>
                        </div>
                         <div class="mt-3">
                                    {{ $cities->links() }}
                                </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5">
                <div class="card checkout-order-summary">
                    <div class="card-body">
                        <div>
                            <h5 class="font-size-16 mb-1">Creación o Edición de Ciudades</h5>
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
                                <div class="row mb-4">
                                    <label for="">Costo Envío</label>
                                    <input wire:model="costoenvio" type="text" class="form-control" />
                                </div>
                                <div class="row mb-4">
                                    <label for="">Departamento</label>
                                    <select wire:model="state_id" type="text" class="form-select">
                                        <option value="">Seleccione un Departamento</option>
                                        @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mt-3">
                                    @if ($cityId)
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
