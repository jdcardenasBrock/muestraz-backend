@php
    use Illuminate\Support\Facades\Crypt;
@endphp
<div class="m-4">
    <div class="row mb-4">
        <div class="col-xl-3 col-md-12">
            <div class="pb-3 pb-xl-0">
                <form class="email-search">
                    <div class="position-relative">
                        <input type="text" wire:model.live="search" placeholder="Buscar usuarios..."
                            class="form-control mb-3" />
                        <span class="bx bx-search font-size-18"></span>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-xl-9 col-md-12">
            <div class="pb-3 pb-xl-0">
                <div class="btn-toolbar float-end" role="toolbar">
                    <div class="btn-group me-2 mb-2">
                        <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Exportar <i class="mdi mdi-dots-vertical ms-2"></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Excel</a>
                            <a class="dropdown-item" href="#">PDF</a>
                            <a class="dropdown-item" href="#">JSON</a>
                        </div>
                    &nbsp; 
                    <div> 
                        <a href="/m_campaign">                       
                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                aria-expanded="false">
                                Campaña
                            </button>
                        </a>
                    </div>                        
                    &nbsp; 
                    <div> 
                        <a href="/m_campaign_advanced">                       
                            <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"
                                aria-expanded="false">
                                Campaña Avanzada
                            </button>
                        </a>
                    </div> 
                </div>
            </div>
        </div>
    </div>

    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Usuarios Activos <span class="text-muted fw-normal ms-2"> {{ $users->count() }}
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
                                    <th scope="col">Estado de la Cuenta</th>
                                    <th scope="col">Ultimo Acceso</th>
                                    <th scope="col" style="width: 200px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <img src="{{ URL::asset('build/images/users/avatar.png') }}" alt=""
                                                class="avatar rounded-circle img-thumbnail me-2">
                                            <a href="{{ url('m_user_detail') . '?ut=' . Crypt::encrypt($user->id) }}">
                                                {{ ucwords($user->name) }}
                                            </a>
                                        </td>
                                        <td> {{ $user->email }} </td>
                                        @php
                                            if ($user->status_account == 'active') {
                                                $spanColor = 'bg-success-subtle text-success ';
                                                $status = 'Cuenta Activada';
                                            } elseif ($user->status_account == 'pending') {
                                                $spanColor = 'bg-primary-subtle text-primary ';
                                                $status = 'Cuenta sin Verificar';
                                            } elseif ($user->status_account == 'inactive') {
                                                $spanColor = 'bg-warning-subtle text-primary ';
                                                $status = 'Cuenta Inactiva por Usuario';
                                            } elseif ($user->status_account == 'suspended') {
                                                $spanColor = 'bg-danger-subtle text-danger';
                                                $status = 'Cuenta Suspendida por Admin';
                                            }
                                        @endphp
                                        <td><span class="badge {{ $spanColor }} text-uppercase  mb-0"
                                                style="font-size: 12px">
                                                {{ $status }} </span></td>
                                        <td> {{ $user->updated_at }} </td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                     <a href="{{ url('m_user_detail') . '?ut=' . Crypt::encrypt($user->id) }}" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit"
                                                        class="px-2 text-primary">
                                                    <i
                                                            class="bx bx-pencil font-size-18"></i></a>
                                                </li>
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete"
                                                        class="px-2 text-danger"><i
                                                            class="bx bx-trash-alt font-size-18"></i></a>
                                                </li>
                                                <li class="list-inline-item dropdown">
                                                    <a class="text-muted dropdown-toggle font-size-18 px-2"
                                                        href="#" role="button" data-bs-toggle="dropdown"
                                                        aria-haspopup="true">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </a>

                                                    <div class="dropdown-menu dropdown-menu-end">
                                                        <a class="dropdown-item" href="#">Action</a>
                                                        <a class="dropdown-item" href="#">Another action</a>
                                                        <a class="dropdown-item" href="#">Something else
                                                            here</a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </td>
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
    {{ $users->links('vendor.livewire.bootstrap') }}
    <!-- end row -->

    <!--  successfully modal  -->
    <div id="success-btn" class="modal fade" tabindex="-1" aria-labelledby="success-btnLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <i class="bx bx-check-circle display-1 text-success"></i>
                        <h4 class="mt-3">User Added Successfully</h4>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <!--  Extra Large modal example -->
    <div class="modal fade add-new" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myExtraLargeModalLabel">Add New</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="AddNew-Username">Username</label>
                                <input type="text" class="form-control" placeholder="Enter Username"
                                    id="AddNew-Username">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Position</label>
                                <select class="form-select">
                                    <option selected>Select Position</option>
                                    <option>Full Stack Developer</option>
                                    <option>Frontend Developer</option>
                                    <option>UI/UX Designer</option>
                                    <option>Backend Developer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="AddNew-Email">Email</label>
                                <input type="text" class="form-control" placeholder="Enter Email"
                                    id="AddNew-Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label" for="AddNew-Phone">Phone</label>
                                <input type="text" class="form-control" placeholder="Enter Phone"
                                    id="AddNew-Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-end">
                            <button type="button" class="btn btn-danger me-1" data-bs-dismiss="modal"><i
                                    class="bx bx-x me-1 align-middle"></i> Cancel</button>
                            <button type="submit" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#success-btn" id="btn-save-event"><i
                                    class="bx bx-check me-1 align-middle"></i> Confirm</button>
                        </div>
                    </div>

                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</div>
