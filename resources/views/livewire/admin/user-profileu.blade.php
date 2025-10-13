<div>
    <div class="mb-4 pb-2">
        <a href="/index_u" class="d-block auth-logo">
            <img src="{{ URL::asset('web/images/LogoAmarillo.png') }}" alt="" height="120"
                class="auth-logo-dark me-start">
            <img src="{{ URL::asset('web/images/LogoAmarillo.png') }}" alt="" height="120"
                class="auth-logo-light me-start">
        </a>
    </div>

     <div style="text-align: center;">

        {!! QrCode::size(250)->generate($user->profile->document_id); !!}

    </div>
    <br>
    <br>
    <br>
    
    <div>
        <div class="col-xxl-12">
            <div class="card m-4 p-4">
                <div class="card-header">
                    <h4 class="card-title mb-0">Modificar Perfil de Usuario</h4>
                </div>
                <div class="card-body">
                    <form>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" wire:model="name">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="formrow-firstname-input" class="form-label">Celular</label>
                                    <input type="text" class="form-control" wire:model="mobile_phone">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Correo Electronico</label>
                                    <input type="email" class="form-control" wire:model="email" disabled>
                                    <div class="text-muted">No es posible cambiar el correo eletronico
                                        este es usado en nuestro sistema para el manejo de pedidos y funciones</div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Tipo de Documento</label>
                                    <select id="formrow-inputState" class="form-select" wire:model="type_document">
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
                                    <label for="formrow-inputCity" class="form-label">Documento de Intidad</label>
                                    <input type="text" class="form-control" wire:model="document_id">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="formrow-email-input" class="form-label">Genero</label>
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
                                    <label for="formrow-email-input" class="form-label">Fecha de Nacimiento</label>
                                    <input type="date" class="form-control" wire:model="born_date">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                                <div class="col-md-5">
                                    <div class="mb-3">
                                        <label for="formrow-email-input" class="form-label">Estado Civil</label>
                                        <select wire:model="maritalstatus" type="text" class="form-select" 
                                            style="width:200px">
                                            <option value="" selected>Seleccionar...</option>
                                            <option value="casado(a)">Casado(a)</option>
                                            <option value="soltero(a)">Soltero(a)</option>
                                            <option value="viudo(a)">Viudo(a)</option>
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
                                    Hijos <input type="checkbox" id="children" name="children" wire:model="children" value="1" {{ $children=="1" ? 'checked' : '' }}   />
                                </label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label>
                                    Mascotas <input type="checkbox" id="pet" name="pet" wire:model="pet" value="1" {{ $pet=="1" ? 'checked' : '' }}    />
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

                            <select id="sitio" class="form-control" style="width:200px">
                                <option value="" selected>Seleccionar...</option>
                                <option value="Calle">Calle</option>
                                <option value="Carrera">Carrera</option>
                                <option value="Diagonal">Diagonal</option>
                                <option value="Barrio">Barrio</option>
                                <option value="Transversal">Transversal</option>
                            </select>


                            <div class="direccion"> <input type="text" class="form-control" id="numero1" style="width:150px"> </div>
                            <div class="direccion"> <label aling="center" for="numerodireccion"> #</label> </div>
                            <div class="direccion"> <input type="text" class="form-control" id="numero2" style="width:80px"> </div>
                            <div class="direccion"> <label for="numerodireccion"> - </label> </div>
                            <div class="direccion"> <input type="text" class="form-control" id="numero3"style="width:80px"> </div>
                            <div class="direccion"> <label for="numerodireccion"> Adicional </label> </div>
                            <div class="direccion"> <input type="text" class="form-control" id="adicional"style="width:250px"> </div>
                            <div> <button type="button" class="btn btn-primary w-md"
                                    onclick="concatenarTextos()">Actualizar Direccion</button> </div>
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
                                <label for="formrow-firstname-input" class="form-label">Dirección Fisica</label>
                                <input id="address" type="text" class="form-control" wire:model="address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="choices-single-default" class="form-label">Departamento</label>
                                    <select wire:model="state_id"class="form-select">
                                        @foreach ($state as $state)
                                            <option value="{{ $state->id }}">{{ $state->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-5">
                                <div class="mb-3">
                                    <label for="choices-single-default" class="form-label">Ciudad</label>
                                    <select wire:model="city_id" class="form-select">
                                        @foreach ($city as $city)
                                            <option value="{{ $city->id }}">{{ $city->nombre }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="button" wire:click="submit" class="btn btn-primary w-md">Guardar</button>
                            <a href="/index_u" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a>
                        </div>
                    </form>
                </div>
                <!-- end card body -->
            </div>
            <!-- end card -->
        </div>
    </div>
    <div class="row mb-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
                <meta http-equiv="refresh" content="1">
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    </div>
</div>


</div>
