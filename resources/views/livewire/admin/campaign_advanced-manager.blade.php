<div class="m-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Clientes <span class="text-muted fw-normal ms-2"> 
                    </span></h5>
            </div>
        </div>
    </div>

    <!-- end row -->

    <div class="row">
                <div class="col-md-6 mt-3">
                    <label for="pregunta" class="form-label">Pregunta</label>
                    <select wire:model="preguntafilter" class="form-control" id="question" onchange="loadoption(this)">
                        <option value="">-- Seleccione --</option>
                        @foreach($question as $question)
                            <option value="{{ $question->id }}">{{ $question->question }}</option>
                        @endforeach 
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label for="respuesta" class="form-label">Respuesta </label>
                    <select wire:model="respuestafilter" class="form-control" id="option">
                        <option value="">-- Seleccione --</option>
                        @foreach($quizoptions as $quizoption)
                            <option value="{{ $quizoption->id }}">{{ $quizoption->option_text }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
   
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive mt-4">
                        <table class="table table-nowrap align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col" class="p-2 text-center">Correo</th>
                                    <th scope="col"class="p-2 text-center">Pregunta </th>
                                    <th scope="col"class="p-2 text-center">Respuesta</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse ($quizquestion as $quizquestion) 
                                      
                                            <tr>
                                                <td class="p-2 text-start"> {{ $quizquestion->user->name }}</td>
                                                <td class="p-2 text-center">{{ $quizquestion->user->email }}</td>
                                                <td class="p-2 text-center">{{ $quizquestion->question->question }}</td>
                                                <td class="p-2 text-center">{{ $quizquestion->option->option_text }}</td>
                                                                                             
                                            </tr>                                 
                                        @empty
                                            <tr>
                                                <td colspan="2">No se encontraron usuarios.</td>
                                            </tr>
                                    @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function loadoption(questionselect) {
        
        let quiz_question_id = questionselect.value;

    //alert(questionid);

        fetch(`/get-data/${quiz_question_id}`)
            
            .then(function (response) {

                //return response.json();
                return response.json();
            })


            .then(function (jsondata) 
            {
                console.log(jsondata);
                buildoptionselect(jsondata);
            })

            function buildoptionselect(data) 
            {
                let optionselect = document.getElementById('option');

                //clear previous options
                optionselect.innerHTML = '';

                //add default option
                let defaultoption = document.createElement('option');
                defaultoption.value = '';
                defaultoption.text = 'Seleccione una Opcion';
                optionselect.appendChild(defaultoption);

                //add new options from data
                data.forEach(function (item) 
                {
                    let optionelement = document.createElement('option');
                    optionelement.value = item.id;
                    optionelement.text = item.option_text;
                    optionselect.appendChild(optionelement);
                });
            }

    }


</script>


