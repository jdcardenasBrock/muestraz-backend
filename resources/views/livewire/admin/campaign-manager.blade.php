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
                                    <th scope="col" class="p-2 text-center">Nombre</th>
                                    <th scope="col"class="p-2 text-center">Correo</th>
                                    <th scope="col"class="p-2 text-center">Estado Civil </th>
                                    <th scope="col" class="p-2 text-center">Edad</th>
                                    <th scope="col" class="p-2 text-center">Genero</th>
                                    <th scope="col" class="p-2 text-center">Vehiculo</th>
                                    <th scope="col" class="p-2 text-center">Mascotas</th>
                                    <th scope="col" class="p-2 text-center">Hijos</th>
                                    <th scope="col" class="p-2 text-center">Membresia</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @forelse ($userinfo as $userinfo) 
                                      
                                            <tr>
                                                <td class="p-2 text-start"> {{ $userinfo->user->name }}</td>
                                                <td class="p-2 text-center">{{ $userinfo->user->email }}</td>
                                                <td class="p-2 text-center">{{ $userinfo->maritalstatus }}</td>
                                                <td class="p-2 text-center">{{ now()->year - \Carbon\Carbon::parse($userinfo->born_date)->year }}</td>
                                                <td class="p-2 text-center">{{ $userinfo->gender === 'male' ? 'Hombre' : 'Mujer' }}</td>
                                                <td class="p-2 text-center">{{ $userinfo->vehicletype }}</td>
                                                <td class="p-2 text-center">{{ $userinfo->pet === 1 ? 'Si' : 'No' }}</td>
                                                <td class="p-2 text-center">{{ $userinfo->children === 1 ? 'Si' : 'No' }}</td> 
                                                <td class="p-2 text-center">{{ $userinfo->membership->membershiptype->type}}</td>                                                
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


