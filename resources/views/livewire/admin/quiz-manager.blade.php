<div>
        @if (session()->has('message'))
        <div class="row">
            <div class="alert alert-primary col-5 m-3" role="alert">{{ session('message') }}</div>
        </div>
        @endif
    <div class="row">
        <div class="col-xl-7">
            <div class="card">
                <div class="card-body">
                    <div>
                        <h5 class="font-size-16 mb-1">Listado de Encuestas</h5>
                    </div>
                    <div class="table-responsive mt-4">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light text-center">
                                <tr class="bg-gray-200">
                                    <th class="p-2">Título</th>
                                    <th class="p-2">Orden</th>
                                    <th class="p-2">Visible</th>
                                    <th class="p-2">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quizzes as $quiz)
                                    <tr class="border-t text-center">
                                        <td class="p-2">{{ $quiz->title }}</td>
                                        <td class="p-2">{{ $quiz->order }}</td>
                                        <td class="p-2">{{ $quiz->is_visible ? 'Sí' : 'No' }}</td>
                                        <td class="p-2 space-x-2">
                                            <button wire:click="edit({{ $quiz->id }})"
                                                class="text-success btn btn-link waves-effect"><i
                                                    class="mdi mdi-pencil font-size-18"></i></button>
                                            <button wire:click="delete({{ $quiz->id }})"
                                                class="text-danger btn btn-link waves-effect"><i
                                                    class="mdi mdi-delete font-size-18"></i></button>
                                            <button wire:click="toggleVisibility({{ $quiz->id }})"
                                                class="btn btn-link waves-effect text-yellow-600 font-size-16">
                                                {!! $quiz->is_visible ? '<i class="bx bx-hide"></i>' : '<i class="bx bx-show-alt"></i>' !!}
                                            </button>
                                            <button
                                                onclick="window.location.href='{{ route('admin.quiz.questions', $quiz->id) }}'"
                                                class="btn btn-link waves-effect font-size-16">
                                                <i class="bx bx-list-ul"></i>Preguntas

                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>


<!-- Botón para mostrar el cuestionario -->
<button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#quizModal">
    Ver Cuestionario
</button>

<livewire:client.quiz-viewer :quiz="$quiz" />


                </div>
            </div>
        </div>
        <div class="col-xl-5">
            <div class="card checkout-order-summary">
                <div class="card-body">
                    <div>
                        <h5 class="font-size-16 mb-1">Creación o Edición de Encuestas</h5>
                    </div>
                    <div class="p-4 space-y-4 mt-4">
                        <div class="row mb-4">
                            <input type="text" wire:model="title" placeholder="Ingrese Título" class="form-control">
                        </div>
                        <div class="row mb-4">
                            <textarea wire:model="description" placeholder="Descripción" class="form-control"></textarea>
                        </div>

                        <div class="row mb-4">
                            <input type="number" wire:model="order" placeholder="Orden"
                                class="w-full mb-2 p-2 border rounded">
                        </div>
                        <div class="row mb-4">
                            <label class="block">
                                <input type="checkbox" wire:model="is_visible" class="form-check-input">
                                <label class="form-check-label" for="is_visible">
                                    Visible para clientes
                                </label>
                            </label>
                        </div>

                        <div class="mt-3">
                            <button wire:click="save" class="btn btn-primary w-md">Guardar</button>
                            @if ($quizId)
                                <button wire:click="resetForm"
                                    class="btn btn-secondary waves-effect waves-light">Cancelar
                                    edición</button>
                            @endif
                        </div>


                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
