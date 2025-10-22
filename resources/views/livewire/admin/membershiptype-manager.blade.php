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
                                    <th class="p-2">Muestras</th>
                                    <th class="p-2">Meses</th>
                                    <th class="p-2">Imagen</th>
                                    <th class="p-2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($membershiptype as $membershiptype)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $membershiptype->type }}</td>
                                        <td class="p-2">{{ $membershiptype->value }}
                                        </td>
                                        <td class="p-2">{{ $membershiptype->quantitysamples }}</td>
                                        <td class="p-2">{{ $membershiptype->quantitymonths }}</td>
                                        <td class="p-2"><img src="{{ Storage::url($membershiptype->image_path) }}"
                                                alt="" style="width: 90px"> </td>
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
                                <label for="">Nombre de Membresía</label>
                                <input wire:model="type" type="text" class="form-control" />
                                @error('type')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <label for="">Tipo de Membresía</label>
                                <select wire:model.live="memberType" class="form-control">
                                    <option value="">Selecciona un tipo</option>
                                    <option value="free">Gratis</option>
                                    <option value="paid">Pago</option>
                                </select>
                                @error('memberType')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            @if ($memberType === 'paid')
                                <div class="row mb-4">
                                    <label for="">Valor</label>
                                    <input wire:model="value" type="number" class="form-control" />
                                    @error('value')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <div class="row mb-4">
                                <label for="">Cantidad Muestras</label>
                                <input wire:model="quantitysamples" type="number" class="form-control" />
                                @error('quantitysamples')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <label for="">Cantidad de Meses</label>
                                <input wire:model="quantitymonths" type="number" class="form-control" />
                                @error('quantitymonths')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="row mb-4">
                                <label for="">Imagen de Membresía</label>
                                <input wire:model="image" type="file" class="form-control" />
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>


                            <div class="mt-3">
                                @if ($membershiptypeId)
                                    <button type="submit" class="btn btn-primary w-md">Actualizar</button>
                                @else
                                    <button type="submit" class="btn btn-success w-md">Crear</button>
                                @endif

                                <button type="button" class="btn btn-secondary w-md" wire:click="clear">Limpiar
                                    Formulario</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
