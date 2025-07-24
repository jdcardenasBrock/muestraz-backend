<div>
    <div class="row">
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
                                <h5 class="mb-1">{{ $user->name }}</h5>
                            </div>

                        </div>

                        <div class="table-responsive mt-3 border-bottom pb-3">
                            <table
                                class="table align-middle table-sm table-nowrap table-borderless table-centered mb-0">
                                <tbody>
                                    <tr>
                                        <th class="fw-bold">Correo Electronico :</th>
                                        <td class="text">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">Ciudad :</th>
                                        <td class="text">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">Fecha de Nacimiento :</th>
                                        <td class="text">{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th class="fw-bold">Celular:</th>
                                        <td class="text">{{ $user->email }}</td>
                                    </tr>
                                    <!-- end tr -->
                                </tbody><!-- end tbody -->
                            </table>
                        </div>


                        <div class="pt-2 text-center border-bottom pb-4">
                            <button type="button" class="btn btn-outline-primary waves-effect waves-light">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Editar Datos <i
                                            class="bx bx-send ms-1 align-middle"></i></font>
                                </font>
                            </button>
                        </div>

                        <div class="mt-3 pt-1 text-center">

                            <button type="button" class="btn btn-outline-primary waves-effect">Ver Politica de
                                Proteccion de Datos</button>
                            <button type="button" class="btn btn-outline-primary waves-effect">Ver Terminos y
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
                            <h5 class="font-size-16 mb-3">Summary</h5>
                            <div class="mt-3">
                                <p class="font-size-15 mb-1">Hi my name is Jennifer Bennett.</p>
                                <p class="font-size-15">I'm the Co-founder and Head of Design at Company agency.</p>

                                <p class="text-muted">Been the industry's standard dummy text To an English person.
                                    Our team collaborators and clients to achieve cupidatat non proident, sunt in culpa
                                    qui officia deserunt mollit anim id est some advantage from it? But who has any
                                    right to find fault with a man who chooses to enjoy a pleasure that has no annoying
                                    consequences debitis aut rerum necessitatibus saepe eveniet ut et voluptates laborum
                                    growth.</p>

                                <h5 class="font-size-15">Experience :</h5>
                                <div class="row">
                                    <div class="col-4">
                                        <ul class="list-unstyled mb-0 pt-1">
                                            <li class="py-1"><i
                                                    class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec
                                                vitae libero venenatis faucibus</li>
                                            <li class="py-1"><i
                                                    class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque
                                                rutrum aenean imperdiet</li>
                                            <li class="py-1"><i
                                                    class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer
                                                ante a consectetuer eget</li>
                                        </ul>
                                    </div>

                                    <div class="col">
                                        <ul class="list-unstyled mb-0 pt-1">
                                            <li class="py-1"><i
                                                    class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Donec
                                                vitae libero venenatis faucibus</li>
                                            <li class="py-1"><i
                                                    class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Quisque
                                                rutrum aenean imperdiet</li>
                                            <li class="py-1"><i
                                                    class="mdi mdi-circle-medium me-1 text-success align-middle"></i>Integer
                                                ante a consectetuer eget</li>
                                        </ul>
                                    </div>
                                </div>
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
                                                        class="avatar-sm rounded-circle" alt="">
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

</div>

</div>
