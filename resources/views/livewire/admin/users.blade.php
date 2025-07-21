<div class="m-4">
    <div class="row align-items-center">
        <div class="col-md-6">
            <div class="mb-3">
                <h5 class="card-title">Usuarios Activos <span class="text-muted fw-normal ms-2"> {{ $users->count() }}
                    </span></h5>
            </div>
        </div>

        <div class="col-md-6">
            <div class="d-flex flex-wrap align-items-center justify-content-end gap-2 mb-3">
                <div>
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link active" href="m_users" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="" data-bs-original-title="List" aria-label="List"><i
                                    class="bx bx-list-ul"></i></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contacts-grid" data-bs-toggle="tooltip" data-bs-placement="top"
                                title="" data-bs-original-title="Grid" aria-label="Grid"><i
                                    class="bx bx-grid-alt"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="dropdown">
                    <a class="btn btn-link text-muted py-1 font-size-16 shadow-none dropdown-toggle" href="#"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bx bx-dots-horizontal-rounded"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

    <!-- end row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-nowrap align-middle">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col" style="width: 200px;">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($users as $user)
                                    <tr>

                                        <td>
                                            <img src="{{ URL::asset('build/images/users/avatar-2.jpg') }}"
                                                alt="" class="avatar rounded-circle img-thumbnail me-2">
                                            <a href="#" class="text-body"> {{$user->name}} </a>
                                        </td>
                                        <td><span class="badge bg-success-subtle text-success mb-0"> {{$user->name}} </span></td>
                                        <td> {{$user->email}} </td>
                                        <td> {{$user->phone}} </td>
                                        <td>
                                            <ul class="list-inline mb-0">
                                                <li class="list-inline-item">
                                                    <a href="javascript:void(0);" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit"
                                                        class="px-2 text-primary"><i
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
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <div class="row g-0 align-items-center pb-4">
        <div class="col-sm-6">
            <div>
                <p class="mb-sm-0">Showing 1 to 10 of 57 entries</p>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="float-sm-end">
                <ul class="pagination mb-sm-0">
                    <li class="page-item disabled">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-left"></i></a>
                    </li>
                    <li class="page-item active">
                        <a href="#" class="page-link">1</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">2</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">3</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">4</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link">5</a>
                    </li>
                    <li class="page-item">
                        <a href="#" class="page-link"><i class="mdi mdi-chevron-right"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
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
