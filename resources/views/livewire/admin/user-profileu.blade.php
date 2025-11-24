<div>
    <style>
        .direccion {
            display: flex;
            align-items: center;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 10px;
        }

        .direccion input,
        .direccion select {
            display: inline-block;
        }

        .direccion label {
            margin-bottom: 0;
            font-weight: bold;
        }

        .card {
            border-radius: 12px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
        }

        .card-header h4 {
            font-weight: 600;
        }

        .btn-primary {
            background-color: #2d89ef;
            border: none;
        }

        .btn-primary:hover {
            background-color: #1b64c2;
        }

        .btn-danger {
            background-color: #e74c3c;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c0392b;
        }
    </style>

    <!-- Logo -->
    <div class="mb-4 pb-2 text-center">
        <a href="/index_u" class="d-block auth-logo">
            <img src="{{ URL::asset('web/images/LogoAmarillo.png') }}" alt="" height="120">
        </a>
    </div>

    <!-- QR o mensaje -->
    <div class="text-center mb-4">
        @if ($user->profile)
            {!! QrCode::size(250)->generate($user->profile->document_id) !!}
        @else
            <h5 class="text-muted">
                Para disfrutar de los beneficios en nuestras máquinas dispensadoras,
                debes diligenciar tu número de documento.
                Esto generará tu código QR.
            </h5>
        @endif
    </div>

    <!-- Formulario -->
    <div class="card p-4 m-4">
        <div class="card-header mb-3">
            <h4 class="card-title mb-0">Modificar Perfil de Usuario</h4>
        </div>
        <div class="card-body">
            <!-- Nombre y Celular -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Nombre completo <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" wire:model="name">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label class="form-label">Celular <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model="mobile_phone">
                </div>
            </div>

            <!-- Correo -->
            <div class="mb-3">
                <label class="form-label">Correo Electrónico <span class="text-danger">*</span></label>
                <input type="email" class="form-control" wire:model="email" disabled>
                <small class="text-muted">No es posible cambiar el correo, se utiliza en nuestro sistema.</small>
            </div>

            <!-- Tipo y número de documento -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Tipo de Documento <span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="type_document">
                        <option value="">Seleccionar...</option>
                        <option value="CC">Cédula de Ciudadanía</option>
                        <option value="CE">Cédula de Extranjería</option>
                        <option value="PAS">Pasaporte</option>
                        <option value="NIT">NIT</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Número de Documento <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model="document_id">
                </div>
            </div>

            <!-- Genero y fecha de nacimiento -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Género <span class="text-danger">*</span></label>
                    <select class="form-select" wire:model="gender">
                        <option value="">Seleccionar...</option>
                        <option value="male">Masculino</option>
                        <option value="female">Femenino</option>
                        <option value="other">Otro</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Fecha de Nacimiento <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" wire:model="born_date">
                </div>
            </div>

            <!-- Estado civil y tipo de vehículo -->
            <div class="row mb-3">
                <div class="col-md-6">
                    <label class="form-label">Estado Civil </label>
                    <select class="form-select" wire:model="maritalstatus">
                        <option value="">Seleccionar...</option>
                        <option value="casado(a)">Casado(a)</option>
                        <option value="soltero(a)">Soltero(a)</option>
                        <option value="viudo(a)">Viudo(a)</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Tipo de Vehículo</label>
                    <select class="form-select" wire:model="vehicletype">
                        <option value="">Seleccionar...</option>
                        <option value="publico">Público</option>
                        <option value="privado">Privado</option>
                    </select>
                </div>
            </div>

            <!-- Hijos y mascotas -->
            <div class="row mb-3">
                <div class="col-md-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" wire:model="children" value="1">
                        Hijos
                    </label>
                </div>
                <div class="col-md-3">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input" wire:model="pet" value="1">
                        Mascotas
                    </label>
                </div>
            </div>

            <!-- Dirección física -->
            <label class="form-label">Completa tu Dirección Física</label>
            <div class="direccion mb-3 d-flex flex-wrap gap-2">
                <select wire:model="sitio" class="form-select" style="width:120px">
                    <option value="">Seleccionar...</option>
                    <option value="Calle">Calle</option>
                    <option value="Carrera">Carrera</option>
                    <option value="Diagonal">Diagonal</option>
                    <option value="Barrio">Barrio</option>
                    <option value="Transversal">Transversal</option>
                </select>

                <input type="text" wire:model="numero1" class="form-control" placeholder="Número 1"
                    style="width:80px">
                <label>#</label>
                <input type="text" wire:model="numero2" class="form-control" placeholder="Número 2"
                    style="width:60px">
                <label>-</label>
                <input type="text" wire:model="numero3" class="form-control" placeholder="Número 3"
                    style="width:60px">
                <label>Adicional</label>
                <input type="text" wire:model="adicional" class="form-control" placeholder="Adicional"
                    style="width:150px">

                <button type="button" class="btn btn-primary" wire:click="armarDireccion">Armar</button>
            </div>

            <div class="row mb-3">
                <div class="col-md-10">
                    <label class="form-label">Dirección Completa <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" wire:model="address" readonly>
                </div>
            </div>


            <!-- Departamento y ciudad -->
            <div class="row mb-3">
                <div class="col-md-5">
                    <label class="form-label">Departamento <span class="text-danger">*</span></label>
                    <select id="state" onchange="loadciudades(this)" wire:model="state_id" class="form-select">
                        @foreach ($state as $st)
                            <option value="{{ $st->id }}">{{ $st->nombre }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-5">
                    <label class="form-label">Ciudad <span class="text-danger">*</span></label>
                    <select id="option" wire:model="city_id" class="form-select">
                        @foreach ($city as $ct)
                            <option value="{{ $ct->id }}">{{ $ct->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Botones -->
            <div class="mt-4">
                <a href="/index_u" class="btn btn-danger me-2">Volver</a>
                <button type="button" wire:click="submit" class="btn btn-primary">Guardar</button>
            </div>

            <!-- Mensajes -->
            <div class="mt-4 col-8">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}
                        <meta http-equiv="refresh" content="1">
                    </div>
                @endif
                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function loadciudades(stateselect) {
            const state_id = stateselect.value;
            fetch(`/get-data_state/${state_id}`)
                .then(res => res.json())
                .then(data => {
                    const optionselect = document.getElementById('option');
                    optionselect.innerHTML = '';
                    const defaultOption = document.createElement('option');
                    defaultOption.value = '';
                    defaultOption.text = 'Seleccione una ciudad';
                    optionselect.appendChild(defaultOption);
                    data.forEach(item => {
                        const opt = document.createElement('option');
                        opt.value = item.id;
                        opt.text = item.nombre;
                        optionselect.appendChild(opt);
                    });
                });
        }
    </script>
</div>
