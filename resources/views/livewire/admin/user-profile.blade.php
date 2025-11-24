<div>
    <div class="row {{ $currentPage == 1 ? 'block' : 'd-none' }}">
        @if (session()->has('message'))
            <div class="mt-4 mb-4 alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="col-xxl-5">
            <div class="card">
                <div class="card-body p-0">
                    <div class="user-profile-img">
                        <img src="{{ URL::asset('build/images/pattern-bg.jpg') }}"
                            class="profile-img profile-foreground-img rounded-top" style="height: 120px;" alt="">
                        <div class="overlay-content rounded-top">
                        </div>
                    </div>
                    <!-- end user-profile-img -->


                    <div class="p-4 pt-0">

                        <div class="mt-n5 position-relative text-center border-bottom pb-3">
                            <img src="{{ URL::asset('build/images/users/avatar.png') }}" alt=""
                                class="avatar-xl rounded-circle img-thumbnail">
                            <div class="mt-3">
                                <h5 class="mb-1">{{ ucwords($user->name) }}</h5>
                            </div>

                        </div>

                        <div class="table-responsive mt-3 border-bottom pb-3">
                            <table
                                class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fw-bold">Correo Electronico :</th>
                                        <td class="text">{{ ucwords($user->email) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">Genero :</th>
                                        <td class="text">
                                            @if ($user->profile)
                                                @if ($user->profile->gender == 'male')
                                                    Masculino
                                                @elseif ($user->profile->gender == 'female')
                                                    Femenino
                                                @else
                                                    Otro
                                                @endif
                                            @else
                                                Pendiente
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold align-items-center justify-content-center">Fecha de
                                            Nacimiento :</th>
                                        <td class="text">
                                            @if ($user->profile)
                                                {{ $user->profile ? \Carbon\Carbon::parse($user->profile->born_date)->format('d/m/Y') : 'Pendiente' }}
                                                <p class="text-muted mb-0">(
                                                    {{ \Carbon\Carbon::parse($user->profile->born_date)->age }} Años)
                                                </p>
                                            @else
                                                Pendiente
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">Celular:</th>
                                        <td class="text">

                                            @if ($user->profile)
                                                {{ $user->profile ? $user->profile->mobile_phone : 'Pendiente' }}
                                            @else
                                                Pendiente
                                            @endif
                                        </td>
                                    </tr>
                                    <!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table>
                        </div>


                        <div class="pt-2 text-center border-bottom pb-4">
                            <button type="button" class="btn btn-subtle-primary btn-sm w-50" wire:click="editProfile">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Editar Datos <i class="bx bx-user me-1"></i>
                                    </font>
                                </font>
                            </button>

                        </div>

                        <div class="mt-3 pt-1 m-3 text-center">

                            <button type="button" class="btn btn-subtle-link waves-effect colorMorado">Ver Politica de
                                Proteccion de Datos</button>
                            <button type="button" class="btn btn-subtle-link waves-effect colorMorado">Ver Terminos y
                                Condiciones</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xxl-7">
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-body">

                            <h5 class="fw-bold mb-4">📊 Resultado de Segmentación</h5>

                            @if ($useranswer->isEmpty())
                                <div class="alert alert-info text-center mb-0">
                                    Aún no has respondido ninguna encuesta.
                                </div>
                            @else
                                @php
                                    // Agrupamos las respuestas por pregunta
                                    $grouped = $useranswer->groupBy('question_id');
                                @endphp
                                @foreach ($grouped as $questionId => $answers)
                                    <div class="mb-3 p-3 border rounded bg-light">
                                        <div class="fw-bold text-dark mb-1">
                                            {{ $answers->first()->question->question }}
                                        </div>

                                        @foreach ($answers as $answer)
                                            <div class="d-flex justify-content-between align-items-center">
                                                <span class="text-primary fw-semibold">
                                                    {{ $answer->option->option_text ?? 'Respuesta abierta' }}
                                                </span>

                                                @if ($answer->porcentaje)
                                                    <span class="badge bg-primary">
                                                        {{ $answer->porcentaje }}%
                                                    </span>
                                                @endif
                                            </div>

                                            @if ($answer->answer_text)
                                                <div class="mt-2 text-muted small">
                                                    Respuesta ingresada:
                                                    <span class="fw-semibold">{{ $answer->answer_text }}</span>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endforeach

                            @endif

                        </div>
                    </div>


                    <div class="card">
                        <div class="card-body">
                            @php
                                $tipo = $usermembershiptype->type ?? 'Pendiente';
                                $start = $usermembership->begin_date ?? null;
                                $vence = $usermembership->end_date ?? null;
                                $vencida = $vence && \Carbon\Carbon::parse($vence)->isPast();
                            @endphp

                            <div class="card shadow-sm border-0 rounded-4 p-3 mb-4"
                                style="background: linear-gradient(135deg, #ffffff, #f7f9fc);">
                                <div class="d-flex align-items-center mb-3">

                                    <!-- Ícono o logo (puedes reemplazar la imagen por tu logo) -->
                                    <div>
                                        <h5 class="fw-bold mb-0 text-dark">
                                            Licencia {{ $tipo }}
                                        </h5>

                                        <span
                                            class="badge  {{ $vencida ? 'bg-danger' : 'bg-success' }} px-3 py-2 rounded-pill mt-1">
                                            {{ $vencida ? 'Licencia Vencida' : 'Licencia Activa' }}
                                        </span>
                                    </div>
                                </div>

                                <hr>

                                <div class="mb-3">
                                    <p class="fw-semibold text-secondary mb-1">Fecha de Vencimiento:</p>
                                    <p class="fs-5 fw-bold  {{ $vencida ? 'text-danger' : 'text-success' }}">
                                        {{ $vence ? \Carbon\Carbon::parse($vence)->format('d/m/Y') : 'Sin fecha asignada' }}
                                    </p>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end row -->

    <DOCTYPE html>

        <div class="row {{ $currentPage == 2 ? 'block' : 'd-none' }}">
            <div class="col-xxl-11">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title mb-0">Editar Usuario</h4>
                    </div>
                    <div class="card-body">

                        <form>
                            <div class="row">

                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Nombre completo <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" wire:model="name">
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="formrow-firstname-input" class="form-label">Celular <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" wire:model="mobile_phone">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Correo Electronico <span
                                                class="text-danger">*</span></label>
                                        <input type="email" class="form-control" wire:model="email">
                                        <div class="text-muted">Si cambia el correo electronico debera activarlo y no
                                            tendra acceso a hacer pedidos o demas funciones</div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="formrow-inputState" class="form-label">Tipo de Documento <span
                                                class="text-danger">*</span></label>
                                        <select id="formrow-inputState" class="form-select"
                                            wire:model="type_document">
                                            <option value="" selected>Seleccionar...</option>
                                            <option value="CC">Cedula de Ciudadania</option>
                                            <option value="CE">Cedula de Extranjeria</option>
                                            <option value="PAS">Pasaporte</option>
                                            <option value="NIT">NIT</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="formrow-inputCity" class="form-label">Documento de Identidad <span
                                                class="text-danger">*</span></label>
                                        <input type="text" class="form-control" wire:model="document_id">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Genero <span
                                                class="text-danger">*</span></label>
                                        <select wire:model="gender" class="form-select">
                                            <option value="" selected>Seleccionar...</option>
                                            <option value="male">Masculino</option>
                                            <option value="female">Femenino</option>
                                            <option value="other">Otro</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Fecha de Nacimiento<span
                                                class="text-danger">*</span></label>
                                        <input wire:model="born_date" type="date" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Estado Civil<span
                                                class="text-danger">*</span></label>
                                        <select wire:model="maritalstatus" type="text" class="form-select"
                                            style="width:200px">
                                            <option value="" selected>Seleccionar...</option>
                                            <option value="casado(a)">Casado(a)</option>
                                            <option value="soltero(a)">Soltero(a)</option>
                                            <option value="Viudo(a)">Viudo(a)</option>
                                            <option value="otro">Otro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Tipo Vehiculo</label>
                                        <select wire:model="vehicletype" type="text" class="form-select"
                                            style="width:200px">
                                            <option value="" selected>Seleccionar...</option>
                                            <option value="publico">Publico</option>
                                            <option value="privado">Privado</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            <input type="checkbox" id="children" name="children"
                                                wire:model="children" value="1"
                                                {{ $children == '1' ? 'checked' : '' }} /> Hijos
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>
                                            <input type="checkbox" id="pet" name="pet" wire:model="pet"
                                                value="1" {{ $pet == '1' ? 'checked' : '' }} /> Mascotas
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <style>
                                .direccion {

                                    display: flex;
                                    align-items: center;
                                    padding: 10px;

                                }
                            </style>


                            <label for="formrow-inputCity">Completa tu direccion Fisica</label>
                            <div class="direccion">

                                <select id="sitio" style="width:200px">
                                    <option value="" selected>Seleccionar...</option>
                                    <option value="Calle">Calle</option>
                                    <option value="Carrera">Carrera</option>
                                    <option value="Diagonal">Diagonal</option>
                                    <option value="Barrio">Barrio</option>
                                    <option value="Transversal">Transversal</option>
                                </select>


                                <div class="direccion"> <input type="text" id="numero1" style="width:100px">
                                </div>
                                <div class="direccion"> <label aling="center" for="numerodireccion"> #</label> </div>
                                <div class="direccion"> <input type="text" id="numero2" style="width:50px">
                                </div>
                                <div class="direccion"> <label for="numerodireccion"> - </label> </div>
                                <div class="direccion"> <input type="text" id="numero3"style="width:50px">
                                </div>
                                <div class="direccion"> <label for="numerodireccion"> Adicional </label> </div>
                                <div class="direccion"> <input type="text" id="adicional"style="width:150px">
                                </div>
                                <div> <button type="button" class="btn btn-primary w-md"
                                        onclick="concatenarTextos()">Armar</button> </div>
                            </div>

                            <script>
                                function concatenarTextos() {
                                    // 1. Obtener las referencias a las cajas de texto de entrada y salida.
                                    const caja1 = document.getElementById('sitio');
                                    const caja2 = document.getElementById('numero1');
                                    const caja3 = document.getElementById('numero2');
                                    const caja4 = document.getElementById('numero3');
                                    const caja5 = document.getElementById('adicional');
                                    const cajaResultado = document.getElementById('address');

                                    // 2. Obtener los valores de cada caja.
                                    const valor1 = caja1.value;
                                    const valor2 = caja2.value;
                                    const valor3 = caja3.value;
                                    const valor4 = caja4.value;
                                    const valor5 = caja5.value;


                                    // 3. Concatenar los valores. Se añade un espacio entre ellos para mayor legibilidad.
                                    const textoConcatenado = valor1 + " " + valor2 + "#" + valor3 + "-" + valor4 + " " + valor5;

                                    // 4. Asignar el texto concatenado a la caja de texto de resultado.
                                    cajaResultado.value = textoConcatenado;
                                }
                            </script>


                            <div class="row">
                                <div class="col-md-10 mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Dirección Fisica <span
                                            class="text-danger">*</span></label>
                                    <input id="address" type="text" class="form-control" wire:model="address">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Departamento <span
                                                class="text-danger">*</span></label>
                                        <select id="state" onchange="loadciudades(this)"
                                            wire:model="state_id"class="form-select">
                                            @foreach ($state as $state)
                                                <option value="{{ $state->id }}">{{ $state->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-5">
                                    <div class="mb-3">
                                        <label for="choices-single-default" class="form-label">Ciudad<span
                                                class="text-danger">*</span></label>
                                        <select id="option" wire:model="city_id" class="form-select">
                                            @foreach ($city as $city)
                                                <option value="{{ $city->id }}">{{ $city->nombre }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <script>
                                    function loadciudades(stateselect) {

                                        let state_id = stateselect.value;

                                        //alert(state_id);

                                        fetch(`/get-data_state/${state_id}`)

                                            .then(function(response) {

                                                //return response.json();
                                                //console.log(response.json());
                                                return response.json();
                                            })

                                            .then(function(jsondata) {
                                                console.log(jsondata);
                                                buildciudadesselect(jsondata);
                                            })

                                        function buildciudadesselect(data) {
                                            let optionselect = document.getElementById('option');

                                            //clear previous options
                                            optionselect.innerHTML = '';

                                            //add default option
                                            let defaultoption = document.createElement('option');
                                            defaultoption.value = '';
                                            defaultoption.text = 'Seleccione una ciudad';
                                            optionselect.appendChild(defaultoption);

                                            //add new options from data
                                            data.forEach(function(item) {
                                                let optionelement = document.createElement('option');
                                                optionelement.value = item.id;
                                                optionelement.text = item.nombre;
                                                optionselect.appendChild(optionelement);
                                            });
                                        }


                                    }
                                </script>


                            </div>

                            <div class="mt-4">
                                <button type="button" wire:click="submit"
                                    class="btn btn-primary w-md">Guardar</button>
                                <button type="button" wire:click="backUser"
                                    class="btn btn-secondary w-md">Volver</button>
                            </div>
                        </form>
                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->
            </div>
        </div>
</div>

</div>
