<div> 
    <div class="mb-4 pb-2">
                                <a href="/index_u" class="d-block auth-logo">
                                    <img src="{{ URL::asset('web/images/LogoAmarillo.png') }}" alt="" height="120"
                                        class="auth-logo-dark me-start">
                                    <img src="{{ URL::asset('web/images/LogoAmarillo.png') }}" alt="" height="120"
                                        class="auth-logo-light me-start">
                                </a>
                            </div> 
    <div>
        <div class="col-xxl-11">
            <div class="card">
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
                                    <label for="formrow-email-input" class="form-label" >Correo Electronico</label>
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
                        
                        <div class="container">
                            <div >
                                <div >
                                    <label for="formrow-inputCity" class="form-label">Completa tu direccion Fisica</label> <br>
                                    <select id="sitio" class="form-select" style="width:200px">
                                        <option value="" selected>Seleccionar...</option>
                                        <option value="Calle">Calle</option>
                                        <option value="Carrera">Carrera</option>
                                        <option value="Diagonal">Diagonal</option>
                                        <option value="Barrio">Barrio</option>
                                        <option value="Transversal">Transversal</option>
                                    </select>
                                </div>
                            </div>
                           
                                    <input type="text" class="form-control" id="numero1" style="width:200px" >
                                    <label for="numerodireccion" class="form-label">  #  </label> 
                                    <input type="text" class="form-control" id="numero1"style="width:200px" >
                                
                    </div>

                        <div class="row">
                            <div class="col-md-10 mb-3">
                                <label for="formrow-firstname-input" class="form-label">Dirección Fisica</label>
                                <input type="text" class="form-control" wire:model="address">
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
