<div>   
   <div class="row">
        <div class="col-xxl-11">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Edición del Perfil para <td class="p-2">{{ $user->name }}</td>
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
                                    <input type="email" class="form-control" wire:model="email">
                                    <div class="text-muted">Si cambia el correo electronico debera activarlo y no
                                        tendra acceso a hacer pedidos o demas funciones</div>
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
                            <div class="col-md-10 mb-3">
                                <label for="formrow-firstname-input" class="form-label">Dirección Fisica</label>
                                <input type="text" class="form-control" wire:model="address">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label for="formrow-inputCity" class="form-label">Ciudad</label>
                                    <input type="text" class="form-control" wire:model="city">
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="mb-3">
                                    <label for="formrow-inputState" class="form-label">Departamento</label>
                                    <select id="formrow-inputState" class="form-select" wire:model="department">
                                        <option selected>Choose...</option>
                                        <option>...</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="button" wire:click="submit" class="btn btn-primary w-md">Actualizar</button>
                            <a href="/index_u" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a>
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
