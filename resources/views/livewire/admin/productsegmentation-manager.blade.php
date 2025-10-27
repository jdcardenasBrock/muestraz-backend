<div>
    <div class="col-xxl-12">
        <div class="card m-4 p-4">
            <div class="card-header">
                        <h4 class="card-title mb-0">Segmentar Producto</h4>
            </div>
            <div class="card-body">
                <form>
                    <div class="row">
                        <div class="col-md-6">
                                <div class="mb-3">
                                    <label>
                                        Todos los Usuarios <input type="checkbox" id="alluser" name="alluser" wire:model="alluser" value="1" {{ $alluser=="1" ? 'checked' : '' }}   />
                                    </label>
                                </div>
                        </div>
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
                    </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Rango edad</label>
                                    <select wire:model="agesymbol" class="form-select" style="width:200px">
                                        <option value="" selected>Seleccionar...</option>
                                        <option value=">=">Mayor o igual de</option>
                                        <option value="=<">Menor o igual de</option>
                                    </select>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Edad</label>
                                <input type="text" class="form-control" wire:model="age">
                            </div>
                        </div>

                    <div class="row">
                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Estado Civil</label>
                                <select wire:model="maritalstatus" type="text" class="form-select" 
                                        style="width:200px">
                                        <option value="" selected>Seleccionar...</option>
                                        <option value="Casado(a)">Casado(a)</option>
                                        <option value="Soltero(a)">Soltero(a)</option>
                                        <option value="Viudo(a)">Viudo(a)</option>
                                        <option value="otro">Otro</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="mb-3">
                                <label for="formrow-firstname-input" class="form-label">Clase de Vehiculo</label>
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
                </form>
            </div>
        </div>
    </div>                                                       

    <div class="row mb-4">
        <div class="col text-end">
            <a href="/m_product" class="btn btn-danger"> <i class="bx bx-x me-1"></i> Cancel </a>
            <button type="button" wire:click="save" class="btn btn-primary w-md">Guardar</button>
            @if ($productid)
                <a href="{{ route('admin.m_productsegmetationadvanced.edit', $productid) }}" button type="button"
                    class="btn btn-primary w-md">Avanzado</a>
            @endif

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
   

       
   
    



