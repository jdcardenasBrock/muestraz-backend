<div>
    <div class="container">
        <div class="row justify-content-center">

            <div class="row">
                
                <div class="col-md-6 mt-3">
                    <label for="children" class="form-label">Hijos</label>
                    <input wire:model="children" id="children" type="checkbox"  >
                </div>

                <div class="col-md-6 mt-3">
                    <label for="pet" class="form-label">Mascota</label>
                    <input wire:model="pet" id="pet" type="checkbox"  >
                </div>

                <div class="col-md-6 mt-3">
                    <label for="maritalstatus" class="form-label">Estado Civil</label>
                    <select wire:model="maritalstatusfilter" class="form-control" id="maritalstatus">
                        <option value="">-- Seleccione --</option>
                        <option value="casado(a)">Casado(a)</option>
                        <option value="soltero(a)">Soltero(a)</option>
                        <option value="viudo(a)">Viudo(a)</option>
                        <option value="otro">Otro</option> 
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label for="gender" class="form-label">Genero</label>
                    <select wire:model="genderfilter" class="form-control" id="gender">
                        <option value="">-- Seleccione --</option>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                        <option value="otro">Otro</option> 
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label for="maritalstatus" class="form-label">Tipo de Vehículo</label>
                    <select wire:model="maritalstatusfilter" class="form-control" id="maritalstatus">
                        <option value="">-- Seleccione --</option>
                        <option value="publico">Publico</option>
                        <option value="privado">Privado</option>
                    </select>
                </div>

                <div class="col-md-6 mt-3">
                    <label for="membership" class="form-label">Membresía </label>
                    <select wire:model="membershipfilter" class="form-control" id="membership">
                        <option value="">-- Seleccione --</option>
                        @foreach($membershipstype as $membershipstype)
                            <option value="{{ $membershipstype->id }}">{{ $membershipstype->type }}</option>
                        @endforeach
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
                            <th>Membresía</th>
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
                                <td>{{ $userinfo->membership->membershiptype->type }}</td>
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


