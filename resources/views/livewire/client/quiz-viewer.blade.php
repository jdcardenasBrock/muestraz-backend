<div>
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
                                <p class="card-title-desc">Por favor responda las siguientes preguntas para sugerir los
                                    productos adecuados y conocer mas acerca de sus preferencias.</p>
                            </div>
                            <div class="card-body">
                                @php $question = $questions[$currentQuestionIndex]; @endphp
                                <h6><strong>{{ $question->question }}</strong></h6>

                                <div class="row mt-4">
                                    @if ($question->type === 'text')
                                        <input type="text" class="form-control"
                                            wire:model.defer="answers.{{ $currentQuestionIndex }}">
                                    @elseif ($question->type === 'number')
                                        <input type="number" class="form-control"
                                            wire:model.defer="answers.{{ $currentQuestionIndex }}">
                                    @elseif ($question->type === 'multiple')
                                        @foreach ($question->options as $option)
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" type="radio"
                                                    id="option_{{ $option->id }}"
                                                    wire:model="answers.{{ $currentQuestionIndex }}"
                                                    value="{{ $option->id }}">
                                                <label class="form-check-label" for="option_{{ $option->id }}">
                                                    {{ $option->option_text }}
                                                </label>
                                            </div>
                                        @endforeach
                                    @elseif ($question->type === 'popular')
                                        <input type="text" class="form-control"
                                            wire:model.defer="answers.{{ $currentQuestionIndex }}"
                                            placeholder="Escribe tu respuesta popular">
                                    @endif

                                    <div class="d-flex justify-content-between mt-4">
                                        <button class="btn btn-secondary" wire:click="previous"
                                            @if ($currentQuestionIndex == 0) disabled @endif>
                                            Anterior
                                        </button>

                                        @if ($currentQuestionIndex == count($questions) - 1)
                                            <button class="btn btn-success" wire:click="save">Finalizar</button>
                                        @else
                                            <button class="btn btn-primary" wire:click="next">Siguiente</button>
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
