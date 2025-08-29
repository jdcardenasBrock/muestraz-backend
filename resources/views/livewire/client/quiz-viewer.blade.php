<div>
    <style>
        .btn-green {
            background-color: #3a9b1a;
        }

        .btn-outline-secondary:hover {
            background-color: #2d3a4b;
            color: #fff;
        }

        .btn:hover {
            background-color: #2d3a4b;
            color: #fff;
        }
    </style>
    <div wire:ignore.self class="modal fade" id="quizModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content p-4">
                @if (session()->has('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (!empty($questions))
                    @if (count($questions) > 0)


                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-3">
                                    Pregunta {{ $currentQuestionIndex + 1 }} de
                                    {{ count($questions) }}
                                </h4>
                                <p class="card-title-desc" style="font-size:17px">Por favor responda las siguientes
                                    preguntas para sugerir los
                                    productos adecuados y conocer mas acerca de sus preferencias.</p>
                            </div>
                            <div class="card-body">
                                @php $question = $questions[$currentQuestionIndex]; @endphp
                                <h5><strong>{{ ucfirst($question->question) }}</strong></h5>

                                <div class="row mt-4">
                                    @if ($question->type === 'text')
                                        <input type="text" class="form-control"
                                            wire:model.defer="answers.{{ $currentQuestionIndex }}">
                                    @elseif ($question->type === 'number')
                                        <input type="number" class="form-control"
                                            wire:model.defer="answers.{{ $currentQuestionIndex }}">
                                    @elseif ($question->type === 'multiple')
                                        <div class="flex flex-wrap gap-2 align-content-center">
                                            @foreach ($question->options as $option)
                                                <button type="button"
                                                    class="px-4 py-2 m-2 btn 
            {{ in_array($option->id, $answers[$currentQuestionIndex] ?? [])
                ? 'btn-success btn-green'
                : 'btn-outline-secondary' }}"
                                                    wire:click="toggleOption({{ $currentQuestionIndex }}, {{ $option->id }})">
                                                    {{ $option->option_text }}
                                                </button>
                                            @endforeach
                                        </div>
                                    @elseif ($question->type === 'popular')
                                        <input type="text" class="form-control"
                                            wire:model.defer="answers.{{ $currentQuestionIndex }}"
                                            placeholder="Escribe tu respuesta popular">
                                    @endif


                                </div>
                                <div class="add-info">
                                    <div class="d-flex justify-content-end mt-4">
                                        <button class="btn btn-dark btn-rounded waves-effect waves-light px-4 py-2 m-2"
                                            wire:click="previous" @if ($currentQuestionIndex == 0) disabled @endif>
                                            Anterior
                                        </button>

                                        @if ($currentQuestionIndex == count($questions) - 1)
                                            <button class="btn btn-inverse px-4 py-2 m-2"
                                                wire:click="save">Finalizar</button>
                                        @else
                                            <button class="btn btn-primary px-4 py-2 m-2"
                                                wire:click="next">Siguiente</button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        <p class="text-primary" style="font-weight: 700">Este cuestionario aún no tiene preguntas.</p>
                    @endif
                @endif
            </div>
        </div>
    </div>
</div>
