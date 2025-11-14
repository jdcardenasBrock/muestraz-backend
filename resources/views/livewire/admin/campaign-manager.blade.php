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
                                    <th scope="col">Correo</th>
                                    <th scope="col">Estado Civil </th>
                                    <th scope="col">Edad</th>
                                    <th scope="col">Genero</th>
                                    <th scope="col">Vehiculo</th>
                                    <th scope="col">Mascotas</th>
                                    <th scope="col">Hijos</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse ($userinfo as $userinfo) 
                                      
                                            <tr>
                                                <td class="p-2 text-start"> {{ $userinfo->user->name }}</td>
                                                <td >{{ $userinfo->user->email }}</td>
                                                <td >{{ $userinfo->maritalstatus }}</td>
                                                <td >{{ now()->year - \Carbon\Carbon::parse($userinfo->born_date)->year }}</td>
                                                <td >{{ $userinfo->gender === 'male' ? 'Hombre' : 'Mujer' }}</td>
                                                <td >{{ $userinfo->vehicletype }}</td>
                                                <td >{{ $userinfo->pet === 1 ? 'Si' : 'No' }}</td>
                                                <td >{{ $userinfo->children === 1 ? 'Si' : 'No' }}</td>                                                 
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


