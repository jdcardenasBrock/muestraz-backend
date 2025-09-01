<div>
    <style>
        .option-btn {
            display: inline-block;
            min-width: 120px;
            padding: 10px 20px;
            font-size: 17px;
            font-weight: 600;
            text-align: center;
            border: 2px solid #ccc !important;
            border-radius: 25px;
            /* hace los bordes redondeados */
            background-color: #f9f9f9 !important;
            color: #333 !important;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .option-btn:hover {
            border-color: #007bff !important;
            background-color: #e9f3ff !important;
            transform: scale(1.05);
        }

        .option-btn.active {
            border-color: #28a745 !important;
            background-color: #28a745 !important;
            color: #fff !important;
            box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2) !important;
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
                            {{-- <div class="card-header">
                                <h4 class="card-title mb-3">
                                    Pregunta {{ $currentQuestionIndex + 1 }} de
                                    {{ count($questions) }}
                                </h4>
                                <p class="card-title-desc" style="font-size:17px">Por favor responda las siguientes
                                    preguntas para sugerir los
                                    productos adecuados y conocer mas acerca de sus preferencias.</p>
                            </div> --}}
                            <div class="card-body">
                                @php $question = $questions[$currentQuestionIndex]; @endphp
                                <h4 style="color:#1E1E1E"><strong>{{ ucfirst($question->question) }}</strong></h4>

                                <div class="row mt-4">
                                    @if ($question->type === 'text')
                                        <input type="text" class="form-control"
                                            wire:model.defer="answers.{{ $currentQuestionIndex }}">
                                    @elseif ($question->type === 'number')
                                        <input type="number" class="form-control"
                                            wire:model.defer="answers.{{ $currentQuestionIndex }}">
                                    @elseif ($question->type === 'multiple')
                                        <div class="flex flex-wrap gap-3 align-content-center">
                                            @foreach ($question->options as $option)
                                                <button type="button"
                                                    class="option-btn 
                                                        {{ in_array($option->id, $answers[$currentQuestionIndex] ?? []) ? 'active' : '' }}"
                                                    wire:click="toggleOption({{ $currentQuestionIndex }}, {{ $option->id }})">
                                                    {{ ucfirst($option->option_text) }}
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
                                        <button class="btn btn-dark px-5 py-3 m-2"
                                            style="border-radius: 20px; font-size: 15px;" wire:click="previous"
                                            @if ($currentQuestionIndex == 0) disabled @endif>
                                            Anterior
                                        </button>

                                        @if ($currentQuestionIndex == count($questions) - 1)
                                            <button class="btn btn-success px-5 py-3 m-2"
                                                style="border-radius: 20px; font-size: 15px;" wire:click="save">
                                                Finalizar
                                            </button>
                                        @else
                                            <button class="btn btn-primary px-5 py-3 m-2"
                                                style="border-radius: 20px; font-size: 15px;" wire:click="next">
                                                Siguiente
                                            </button>
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
