<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="M_Adnan">
    <title>Muestraz.com</title>

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
    <link
        href="https://fonts.googleapis.com/css?family=Merriweather:300,400,700,900|Poppins:300,400,500,600,700|Montserrat:300,400,500,600,700,800"
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

        .img-icon {
            height: 80px;
            margin-bottom: 20px;
        }
    </style>

</head>

<body>

    <!-- LOADER -->
    <div id="loader">
        <div class="position-center-center">
            <div class="ldr"></div>
        </div>
    </div>

    <!-- Wrap -->
    <div id="wrap">
        <!-- header -->
        <header class="sticky" style="background-color:black">
            <div class="container">
                <!-- Logo -->
                <div class="logo"> <a href="/"><img class="img-responsive"
                            src="{{ URL::asset('web/images/LogoAmarillo.png') }}" width="300" height="90"
                            alt=""></a> </div>
                <nav class="navbar ownmenu navbar-expand-lg" style="margin: 17px;">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"> <span></span> </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul>
                            <li> <a href="/howwork" class="colorAmarillo font-weight-bold">Como Funciona?</a></li>
                            <li> <a href="/policyterm_u" class="colorAmarillo font-weight-bold">Politicas</a></li>
                            <li> <a href="/index_u" class="colorAmarillo font-weight-bold">Productos</a></li>
                        </ul>
                    </div>

                    <!-- Nav Right -->
                    <div class="nav-right">
                        <ul class="navbar-right">
                            <!-- USER INFO -->
                            <li> <a href="/dashboard" style="color: #ffcc33;"><i class="lnr lnr-user"></i> </a></li>
                            <!-- USER BASKET -->
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="clearfix"></div>
        </header>

        <!-- ABOUT -->
        <section class="about">
            <!-- Right Background -->
            <div class="main-page-section half_left_layout">
                <div class="main-half-layout half_right_layout"> </div>

                <!-- Left Content -->
                <div class="main-half-layout-container half_right_layout">
                    <div class="about-us-con">
                        <h3>Verifique por favor su buzon de entrada de correo</h3>
                        <p>Hemos enviado un mensaje con un vinculo de comprobación, el cual debe abrir para confirmar la
                            identidad
                            , poder acceder a la plataforma y obtener grandes beneficios. En caso de no ver el mensaje
                            en el buzon de entrada por favor
                            vea la carpeta de spam. </p>
                        <p>Verificando el correo podra tener las siguientes funciones, y otras mas.</p>
                        <ul class="order-info">
                            <li>
                                <img src="{{ URL::asset('web/img/icons/membresia.png') }}" alt=""
                                    class="img-icon">
                                <h5>Comprar<br> Membresia</h5>
                            </li>
                            <li>
                                <img src="{{ URL::asset('web/img/icons/pedidos.png') }}" alt=""
                                    class="img-icon">
                                <h5>Gestionar <br>Pedidos</h5>
                            </li>
                            <li>
                                <img src="{{ URL::asset('web/img/icons/entrega.png') }}" alt=""
                                    class="img-icon">
                                <h5>Solicitar Muestras<br> Gratuitas</h5>
                            </li>
                        </ul>
                        <form method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button type="submit" class="btn btn-inverse"
                                style="background-color: #7964caff; color: yellow;">Reenviar correo de
                                verificación</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- FOOTER -->
        <footer style="background-color:#1E1E1E;" style="color: #ffcc33;">
            <div class="container-full">
                <div class="insta-g">
                    <div class="position-center-center">
                        <h3>Para @instgram</h3>
                    </div>
                    <ul>
                        <li><img src="{{ URL::asset('web/images/insta-post-1.jpg') }}" alt=""></li>
                        <li><img src="{{ URL::asset('web/images/insta-post-2.jpg') }}" alt=""></li>
                        <li><img src="{{ URL::asset('web/images/insta-post-6.jpg') }}" alt=""></li>
                        <li><img src="{{ URL::asset('web/images/insta-post-4.jpg') }}" alt=""></li>
                        <li><img src="{{ URL::asset('web/images/insta-post-5.jpg') }}" alt=""></li>
                        <li><img src="{{ URL::asset('web/images/insta-post-3.jpg') }}" alt=""></li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="container">
                <div class="row">
                    <!-- ABOUT Location -->
                    <div class="col-md-4">
                       <div class="about-footer"> <img class="margin-bottom-30"
                            src="{{ URL::asset('web/images/LogoAmarillo_foot.png') }}" style="width:320px">
                            <p><i class="icon-pointer"style="color: #ffcc33;"></i> Bogota, Cundinamarca, Colombia <br>
                            </p>
                            <p><i class="icon-call-end" style="color: #ffcc33;"></i> 315 123 45 67 <br>
                            </p>
                            <p><i class="icon-envelope" style="color: #ffcc33;"></i> Info@Muestraz.com <br>
                                contactanos@Muestraz.com</p>
                        </div>
                    </div>

                    <!-- HELPFUL LINKS -->
                    <div class="col-md-5">
                        <h6>Links </h6>
                        <ul class="link two-half">
                            <li><a href="#."> Productos</a></li>
                            <li><a href="/register"> Registrarme</a></li>
                            <li><a href="#."> Membresia</a></li>
                            <li><a href="/policyterm_u"> Politica de Privcidad</a></li>
                            <li><a href="/dashboard"> Ingresar</a></li>
                            <li><a href="#."> Carrito </a></li>
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
                            <p>© 2025 Muestraz Derechos Reservados. <a href="https://webicode.com/"></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>


    <script src="{{ URL::asset('web/js/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/popper.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/bootstrap.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/own-menu.js') }}"></script>
    <script src="{{ URL::asset('web/js/jquery.lighter.js') }}"></script>
    <script src="{{ URL::asset('web/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/owl.carousel.min.js') }}"></script>
    <script src="{{ URL::asset('web/js/main.js') }}"></script>
    <script src="{{ URL::asset('build/js/pages/fontawesome.init.js') }}"></script>

</body>

</html>
