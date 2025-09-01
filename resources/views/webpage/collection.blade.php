<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M_Adnan">
    <title>Muestraz</title>

    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('web/rs-plugin/css/settings.css') }}" media="screen" />

    <!-- Bootstrap Core CSS -->
    <link href="{{ URL::asset('web/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ URL::asset('web/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('web/css/ionicons.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('web/css/main.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('web/css/style.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('web/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('web/font/flaticon.css') }}" rel="stylesheet">

    <!-- JavaScripts -->
    <script src="{{ URL::asset('web/js/modernizr.js') }}"></script>

    <!-- Online Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sour+Gummy:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <style>
        .hidden {
            display: none !important;
        }

        .visible {
            display: block !important;
        }

        .video-background {
            position: relative;
            overflow: hidden;
        }

        .bg-video {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }

        .home-slide .container {
            position: relative;
            z-index: 2;
            /* para que esté encima del video */
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1840px !important;

            }

        }

        .link-blanco {
            color: #ffff !important;
            font-size: 17px !important;
            font-weight: 600 !important;
        }

        .link-blanco:hover {
            color: #ffcc33 !important;
            font-size: 17px !important;
            font-weight: 600 !important;
        }

        .btn-login {
            background-color: #FFCC33;
            color: #1E1E1E;
            padding: 8px 16px;
            border-radius: 6px;
            font-weight: bold;
            border: none;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background-color: #E6B800;
            color: #FFFFFF;
        }

        .category-card {
            position: relative;
            overflow: hidden;
            border-radius: 1rem;
            /* rounded-4 */
            transition: transform 0.3s ease;
        }

        .category-card img {
            width: 100%;
            height: auto;
            border-radius: 1rem;
            display: block;
        }

        .category-title {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 60px;
            /* altura base */
            background: rgba(0, 0, 0, 0.7);
            color: #FFD700;
            /* amarillo */
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            transition: all 0.3s ease;
            border-radius: 0 0 1rem 1rem;
        }

        /* Hover */
        .category-card:hover .category-title {
            height: 40%;
            /* se expande hacia arriba */
            background: rgba(0, 0, 0, 0.7);
            /* morado en hover */
        }

        .category-title h5 {
            color: #ffcc33 !important;
            font-weight: 800;
        }
    </style>
    <style>
        .full-width-img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }

        .instagram-gallery {
            list-style: none;
            /* Quita viñetas */
            display: flex;
            /* Alinea en fila */
            flex-wrap: wrap;
            /* Permite varias filas en pantallas pequeñas */
            gap: 10px;
            /* Espacio entre imágenes */
            padding: 0;
            margin: 0 auto;
            /* Centrar en el contenedor */
            justify-content: center;
            /* Centra las imágenes */
        }

        .instagram-gallery li {
            flex: 1 1 18%;
            /* Cada imagen ocupa ~18% (5 por fila aprox.) */
            max-width: 180px;
            /* Límite de ancho */
        }

        .img-instagram {
            width: 100%;
            /* Que cubran el ancho de su li */
            height: auto;
            border-radius: 12px;
            /* Bordes redondeados */
            object-fit: cover;
            /* Mantiene proporción */
            display: block;
        }

    </style>

</head>

<body>

    <div id="wrap">
        <!-- TOP Bar -->
        <div class="top-bar" style="background-color:#1E1E1E">
            <div class="container-full pl-4 pr-4">
                <p class="font-weight-bold"> <i class="icon-user"></i>{{ Auth::user()->name }}
                </p>
                <p class="font-weight-bold"><i class="icon-envelope"></i>{{ Auth::user()->email }}
                </p>

                <!-- Login Info -->
                <div class="login-info">
                    <ul>
                        <li><a href="#" class="font-weight-bold">Pedidos</a></li>

                        <!-- USER BASKET -->
                        <li class="dropdown user-basket "> <a href="#" class="dropdown-toggle font-weight-bold"
                                data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> (2)
                                Items <i class="icon-basket-loaded"></i> </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <div class="media-left">
                                        <div class="cart-img"> <a href="#"> <img
                                                    class="media-object img-responsive" src="images/cart-img-1.jpg"
                                                    alt="..."> </a> </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Rise Skinny Jeans</h6>
                                        <span class="price">129.00 USD</span> <span class="qty">QTY: 01</span>
                                    </div>
                                </li>
                                <li>
                                    <div class="media-left">
                                        <div class="cart-img"> <a href="#"> <img
                                                    class="media-object img-responsive" src="images/cart-img-2.jpg"
                                                    alt="..."> </a> </div>
                                    </div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Mid Rise Skinny Jeans</h6>
                                        <span class="price">129.00 USD</span> <span class="qty">QTY: 01</span>
                                    </div>
                                </li>
                                <li>
                                    <h5 class="text-left">SUBTOTAL: <small> 258.00 USD </small></h5>
                                </li>
                                <li class="margin-0">
                                    <div class="row">
                                        <div class="col-sm-6"> <a href="shopping-cart.html" class="btn">VIEW CART</a>
                                        </div>
                                        <div class="col-sm-6 "> <a href="checkout.html" class="btn">CHECK OUT</a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li><a class=" font-weight-bold" href="javascript:void();"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                                    class="align-middle">Cerrar Sesion</span></a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="position-center-center">
            <div class="ldr"></div>
        </div>

        <!-- Wrap -->

        <!-- header -->
        <header class="sticky" style="background-color:#1E1E1E">
            <div class="container">
                <!-- Logo -->
                <div class="logo"> <a href="/index_u"><img class="img-responsive"
                            src="{{ URL::asset('web/images/LogoAmarillo.png') }}" width="300" height="90"
                            alt=""></a></div>
                <nav class="navbar ownmenu navbar-expand-lg" style="margin: 17px;">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"> <span></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <li> <a href="/howwork" class="link-blanco">Como Funciona?</a></li>
                        <li> <a href="/policyterm_u" class="link-blanco">Politicas</a></li>
                        <li> <a href="/index_u" class="link-blanco">Servcios</a> </li>
                        </ul>
                    </div>

                    <!-- Nav Right -->
                    <div class="nav-right">
                        <ul class="navbar-right">
                            <a href="/dashboard" class="btn btn-login">Catalogo</a>
                            <a href="{{ route('m_account_u') }}" class="btn btn-login">Mi Perfil</a>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="clearfix"></div>
        </header>

        <div id="content">
            <!-- New Arrival -->
            <section class="gray-bg padding-top-100 padding-bottom-100">
                <div class="container mb-4">
                    <!-- Main Heading -->
                    {{-- <div class="heading text-center mb-4">
                        <h3 style="font-weight:900 color:#1E1E1E">CATALOGO DE PRODUCTOS</h3>

                    </div> --}}

                    <!-- CATEGORIES LIST -->

                    <livewire:client.categories />

                </div>

                <!-- Item Filters -->
                <div class="container-full m-4">
                    <div class="item-fltr">
                        <!-- short-by -->
                        <div class="short-by"> Mostrando 1–10 of 4 resultados </div>
                        <!-- List and Grid Style -->
                        <div class="lst-grd"> <a href="#" id="list"><i
                                    class="flaticon-interface"></i></a> <a href="#" id="grid"><i
                                    class="icon-grid"></i></a>
                            <!-- Select -->
                            <select>
                                <option> Short By: New</option>
                                <option> Top </option>
                                <option> Price</option>
                                <option> Products</option>
                                <option> Rating</option>
                            </select>
                        </div>
                    </div>

                    <!-- Item -->
                    <div id="products" class="arrival-block list-group">
                        <div class="row">
                            @foreach (\App\Models\Product::orderBy('created_at', 'desc')->get() as $product)
                                <div class="item">
                                    <!-- Item img -->
                                    <div class="item-img">
                                        <img class="img-1 product-image"
                                            src="{{ Storage::url($product->imagenuno_path) }}"
                                            alt="{{ $product->name }}">
                                        @if ($product->imagendos_path)
                                            <img class="img-2 product-image"
                                                src="{{ Storage::url($product->imagendos_path) }}"
                                                alt="{{ $product->name }}">
                                        @endif

                                        <!-- Overlay -->
                                        <div class="overlay">
                                            <div class="position-bottom">
                                                <div class="inn">
                                                    <!-- Ver imagen -->
                                                    <a href="{{ Storage::url($product->main_image) }}" data-lighter>
                                                        <i class="icon-magnifier"></i>
                                                    </a>
                                                    <!-- Agregar al carrito -->
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="Add To Cart">
                                                        <i class="icon-basket"></i>
                                                    </a>
                                                    <!-- Agregar a favoritos -->
                                                    <a href="#" data-toggle="tooltip" data-placement="top"
                                                        title="Add To WishList">
                                                        <i class="icon-heart"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name">
                                        <a href="#">{{ $product->nombre }}</a>
                                        <p class="parrafo" >{{ \Illuminate\Support\Str::limit($product->textodestacado, 80) }}</p>
                                    </div>

                                    <!-- Price -->
                                    <span class="price">
                                        <small>COP $</small>{{ number_format($product->valor, 2) }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </section>

        </div>

        <!-- FOOTER -->
        <footer style="background-color:#1E1E1E;" style="color: #ffcc33;">
            <div class="container-full">
                <div class="insta-g">
                    <ul class="instagram-gallery">
                        <li>
                            <a href="https://www.instagram.com/muestraz/?hl=es" target="_blank"
                                rel="noopener noreferrer">
                                <img class="img-instagram" src="{{ URL::asset('web/images/instagram/1.jpg') }}"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/muestraz/?hl=es" target="_blank"
                                rel="noopener noreferrer">
                                <img class="img-instagram" src="{{ URL::asset('web/images/instagram/1.png') }}"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/muestraz/?hl=es" target="_blank"
                                rel="noopener noreferrer">
                                <img class="img-instagram" src="{{ URL::asset('web/images/instagram/2.png') }}"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/muestraz/?hl=es" target="_blank"
                                rel="noopener noreferrer">
                                <img class="img-instagram" src="{{ URL::asset('web/images/instagram/3.png') }}"
                                    alt="">
                            </a>
                        </li>
                        <li>
                            <a href="https://www.instagram.com/muestraz/?hl=es" target="_blank"
                                rel="noopener noreferrer">
                                <img class="img-instagram" src="{{ URL::asset('web/images/instagram/4.png') }}"
                                    alt="">
                            </a>
                        </li>
                    </ul>

                </div>
            </div>

            <div class="clearfix"></div>
            <div class="container">
                <div class="row">
                    <!-- ABOUT Location -->
                    <div class="col-md-4 ml-4">
                        <div class="about-footer"> <img class="margin-bottom-30"
                                src="{{ URL::asset('web/images/LogoAmarillo_foot.png') }}" style="width:320px">
                            <p class="text-white"><i class="icon-pointer"style="color: #ffcc33;"></i> Bogota,
                                Cundinamarca,
                                Colombia <br>
                            </p>
                            <p class="text-white"><i class="icon-call-end" style="color: #ffcc33;"></i> 315 123 45 67
                                <br>
                            </p>
                            <p class="text-white"><i class="icon-envelope" style="color: #ffcc33;"></i>
                                Info@Muestraz.com
                                <br>
                                contactanos@Muestraz.com
                            </p>
                        </div>
                    </div>

                    <!-- HELPFUL LINKS -->
                    <div class="col-md-5">
                        <h6><b>Mapa del Sitio Web </b></h6>
                        <ul class="link two-half">
                            <li><a class="text-white" href="#."> Productos</a></li>
                            <li><a class="text-white" href="/register"> Registrarme</a></li>
                            <li><a class="text-white" href="#."> Membresia</a></li>
                            <li><a class="text-white" href="/policyterm_u"> Politica de Privcidad</a></li>
                            <li><a class="text-white" href="index"> Ingresar</a></li>
                            <li><a class="text-white" href="#."> Carrito </a></li>
                        </ul>
                    </div>
                    </ul>
                </div>
            </div>


            <!-- Rights -->
            <div class="rights">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-white">© 2025 Muestraz Derechos Reservados. <a
                                    href="https://webicode.com/"></a>
                            </p>
                        </div>
                        <!-- <div class="col-md-6 text-right"> <img src="images/card-icon.png" alt=""> </div>-->
                    </div>
                </div>
            </div>
        </footer>
        @auth
            <livewire:client.form-reminder />
        @endauth
    </div>


    <script src="{{ URL::asset('web/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/own-menu.js') }}"></script>
    <script src="{{ URL::asset('web/js/jquery.lighter.js') }}"></script>
    <script src="{{ URL::asset('web/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/main.js') }}"></script>


</body>

</html>
