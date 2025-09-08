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
            <div class="card">
                <div class="card-body">
                    <!-- Nav tabs -->
                    <ul class="nav nav-pills nav-justified" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#overview" role="tab">
                                <span>Overview</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#messages" role="tab">
                                <span>Messages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#post" role="tab">
                                <span>Post</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Tab content -->
            <div class="tab-content">
                <div class="tab-pane active" id="overview" role="tabpanel">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-size-16 mb-3">Resultado de Encuesta</h5>
                            <div class="mt-3">
                                <div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="tab-pane" id="messages" role="tabpanel">
                    <div class="card">
                        <div class="card-body">

                            <div class="py-2">

                                <div class="mx-n4 px-4" data-simplebar style="max-height: 360px;">
                                    <div class="border-bottom pb-3">
                                        <p class="float-sm-end text-muted font-size-13">12 July, 2021</p>
                                        <div class="badge bg-success mb-2"><i class="mdi mdi-star"></i> 4.1</div>
                                        <p class="text-muted mb-4">Maecenas non vestibulum ante, nec efficitur orci.
                                            Duis eu ornare mi, quis bibendum quam. Etiam imperdiet aliquam purus sit
                                            amet rhoncus. Vestibulum pretium consectetur leo, in mattis ipsum
                                            sollicitudin eget. Pellentesque vel mi tortor.
                                            Nullam vitae maximus dui dolor sit amet, consectetur adipiscing elit.</p>
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <div class="d-flex">
                                                    <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                                        class="avatar-sm rounded-circle" alt="">|
                                                    <div class="flex-1 ms-2 ps-1">
                                                        <h5 class="font-size-15 mb-0">Samuel</h5>
                                                        <p class="text-muted mb-0 mt-1">65 Followers, 86 Reviews</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex-shrink-0">
                                                <ul class="list-inline product-review-link mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="bx bx-like"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="bx bx-comment-dots"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="border-bottom py-3">
                                        <p class="float-sm-end text-muted font-size-13">06 July, 2021</p>
                                        <div class="badge bg-success mb-2"><i class="mdi mdi-star"></i> 4.0</div>
                                        <p class="text-muted mb-4">Cras ac condimentum velit. Quisque vitae elit auctor
                                            quam egestas congue. Duis eget lorem fringilla, ultrices justo consequat,
                                            gravida lorem. Maecenas orci enim, sodales id condimentum et, nisl arcu
                                            aliquam velit,
                                            sit amet vehicula turpis metus cursus dolor cursus eget dui.</p>
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <div class="d-flex">
                                                    <img src="{{ URL::asset('build/images/users/avatar-3.jpg') }}"
                                                        class="avatar-sm rounded-circle" alt="">
                                                    <div class="flex-1 ms-2 ps-1">
                                                        <h5 class="font-size-15 mb-0">Joseph</h5>
                                                        <p class="text-muted mb-0 mt-1">85 Followers, 102 Reviews</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex-shrink-0">
                                                <ul class="list-inline product-review-link mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="bx bx-like"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="bx bx-comment-dots"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="pt-3">
                                        <p class="float-sm-end text-muted font-size-13">26 June, 2021</p>
                                        <div class="badge bg-success mb-2"><i class="mdi mdi-star"></i> 4.2</div>
                                        <p class="text-muted mb-4">Aliquam sit amet eros eleifend, tristique ante sit
                                            amet, eleifend arcu. Cras ut diam quam. Fusce quis diam eu augue semper
                                            ullamcorper vitae sed massa. Mauris lacinia, massa a feugiat mattis, leo
                                            massa porta eros, sed congue arcu sem nec orci.
                                            In ac consectetur augue. Nullam pulvinar risus non augue tincidunt blandit.
                                        </p>
                                        <div class="d-flex align-items-start">
                                            <div class="flex-grow-1">
                                                <div class="d-flex">
                                                    <img src="{{ URL::asset('build/images/users/avatar-6.jpg') }}"
                                                        class="avatar-sm rounded-circle" alt="">
                                                    <div class="flex-1 ms-2 ps-1">
                                                        <h5 class="font-size-15 mb-0">Paul</h5>
                                                        <p class="text-muted mb-0 mt-1">27 Followers, 66 Reviews</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="flex-shrink-0">
                                                <ul class="list-inline product-review-link mb-0">
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="bx bx-like"></i></a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#"><i class="bx bx-comment-dots"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="mt-2">
                                    <div class="border rounded mt-4">
                                        <form action="#">
                                            <div class="px-2 py-1 bg-light">
                                                <div class="btn-group" role="group">
                                                    <button type="button"
                                                        class="btn btn-sm btn-link text-darbodyxt-decoration-none"><i
                                                            class="bx bx-link"></i></button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-link text-darbodyxt-decoration-none"><i
                                                            class="bx bx-smile"></i></button>
                                                    <button type="button"
                                                        class="btn btn-sm btn-link text-darbodyxt-decoration-none"><i
                                                            class="bx bx-at"></i></button>
                                                </div>
                                            </div>
                                            <textarea rows="3" class="form-control border-0 resize-none" placeholder="Your Message..."></textarea>
                                        </form>
                                    </div>

                                    <div class="text-end mt-3">
                                        <button type="button" class="btn btn-success w-sm text-truncate ms-2"> Send
                                            <i class="bx bx-send ms-2 align-middle"></i></button>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <!-- end row -->

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
                            
                            <div class="col-lg-5">
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
