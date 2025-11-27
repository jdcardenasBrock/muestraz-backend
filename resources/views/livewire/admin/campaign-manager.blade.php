<div>
    <div class="container">
        <div class="row justify-content-center">

            <div class="row">
                
                <div class="col-md-6 mt-3">
                    <label for="children" class="form-label">Hijos</label>
                    <input wire:model.live="childrenfilter" id="childrenfilter" type="checkbox"  >
                </div>

                <div class="col-md-6 mt-3">
                    <label for="pet" class="form-label">Mascota</label>
                    <input wire:model.live="petfilter" id="petfilter" type="checkbox"  >
                </div>

                <div class="col-md-6 mt-3">
                    <label for="maritalstatus" class="form-label">Estado Civil</label>
                    <select wire:model.live="maritalstatusfilter" class="form-control" id="maritalstatusfilter">
                        <option value="">-- Seleccione --</option>
                        <option value="casado(a)">Casado(a)</option>
                        <option value="soltero(a)">Soltero(a)</option>
                        <option value="viudo(a)">Viudo(a)</option>
                        <option value="otro">Otro</option> 
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label for="gender" class="form-label">Genero</label>
                    <select wire:model.live="genderfilter" class="form-control" id="genderfilter">
                        <option value="">-- Seleccione --</option>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                        <option value="otro">Otro</option> 
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label for="vehicletype" class="form-label">Tipo de Vehículo</label>
                    <select wire:model.live="vehicletypefilter" class="form-control" id="vehicletypefilter">
                        <option value="">-- Seleccione --</option>
                        <option value="publico">Publico</option>
                        <option value="privado">Privado</option>
                    </select>
                </div>

                
            </div>

            <div class="col-md-12 mt-3">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Estado Civil</th>
                            <th>Genero</th>
                            <th>Tipo de Vehículo</th>
                            <th>Mascota</th>                    
                            <th>Hijos</th>   
                            <!--<th>Membresía</th>-->
                        </tr>
                    
                        @forelse($userinfos as $userinfo)                
                        <tbody>                        
                            <tr>
                                <td>{{ $userinfo->user->name }}</td>
                                <td>{{ $userinfo->user->email }}</td>
                                <td>{{ $userinfo->maritalstatus }}</td>
                                <td>{{ $userinfo->gender==='male' ? 'Masculino' : 'Femenino' }}</td>
                                <td>{{ $userinfo->vehicletype }}</td>
                                <td>{{ $userinfo->pet ? 'Si' : 'No' }}</td>                        
                                <td>{{ $userinfo->children ? 'Si' : 'No' }}</td>   
                                <!--<td>{{ $userinfo->membership->membershiptype->type }}</td>-->
                            </tr>  
                        </tbody>
                        @empty

                        @endforelse
                    </thead>
                </table>
                {{ $userinfos->links() }}
            </div>    
        </div>
    </div>
</div>


