<div>
    <div class="row mt-4">
        @if (session()->has('message'))
            <div class="alert alert-primary" role="alert">{{ session('message') }}</div>
        @endif
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="font-size-16 mb-1">Listado de Preguntas para: {{ $quiz->title }}</h5>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light text-center">
                                <tr class="bg-gray-200">
                                    <th class="p-2">Pregunta</th>
                                    <th class="p-2">Tipo</th>
                                    <th class="p-2">Orden</th>
                                    <th class="p-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $q)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $q->question }}</td>
                                        <td class="p-2">{{ $q->type }}</td>
                                        <td class="p-2">{{ $q->order }}</td>
                                        <td class="p-2 space-x-2">
                                            <button wire:click="edit({{ $q->id }})"
                                                class="text-blue-600 btn btn-link waves-effect"><i
                                                    class="mdi mdi-pencil font-size-18"></i></button>
                                            <button wire:click="delete({{ $q->id }})"
                                                class="text-red-600 btn btn-link waves-effect"><i
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
                        <h5 class="font-size-16 mb-1">Creación o Edición de Preguntas</h5>
                    </div>
                    <div class="p-4 space-y-4">
                        <!-- Formulario -->
                        <div class="row mb-4">
                            <input type="text" wire:model="question" placeholder="Pregunta" class="form-control">
                        </div>

                        <div class="row mb-4">
                            <select wire:model="type" class="form-select">
                                <option value="">Seleccione el tipo de Encuesta</option>
                                <option value="text">Escribir Texto</option>
                                <option value="number">Ingresar Número</option>
                                <option value="multiple">Selección múltiple</option>
                                <option value="popular">Opción popular</option>
                            </select>
                        </div>

                        <div class="row mb-4">
                            <input type="number" wire:model="order" placeholder="Orden" class="form-control">
                        </div>

                        <div class="row mb-4">
                            <label class="block">
                                <input type="checkbox" wire:model="is_required" class="form-check-input">
                                <label class="form-check-label" for="is_required">
                                    Pregunta Requerida
                                </label>
                            </label>
                        </div>
                        @if (in_array($type, ['multiple', 'popular']))
                            <div class="mt-2 space-y-2">
                                <h6 class="font-semibold">Opciones:</h6>
                                @foreach ($optionInputs as $index => $option)
                                    <div class="hstack gap-3 mt-2">
                                        <input type="text" wire:model="optionInputs.{{ $index }}"
                                            class="form-control" placeholder="Opción {{ $index + 1 }}">

                                        <button type="button" wire:click="removeOptionInput({{ $index }})"
                                            class="btn btn-subtle-danger  waves-effect waves-light">
                                            ✕
                                        </button>
                                    </div>
                                @endforeach
                                <div class="d-flex mt-3">
                                    <button type="button" wire:click="addOptionInput"
                                        class="text-blue-600 text-sm btn  btn-subtle-dark waves-effect waves-light">+
                                        Agregar
                                        opción</button>
                                </div>
                            </div>
                        @endif

                        <div class="mt-4">
                            <button wire:click="save" class="btn btn-primary w-md">Guardar</button>
                            @if ($question_id)
                                <button wire:click="resetForm"
                                    class="btn btn-secondary waves-effect waves-light">Cancelar</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
