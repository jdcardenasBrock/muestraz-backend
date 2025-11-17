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


