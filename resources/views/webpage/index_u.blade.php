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
    </style>
    <style>
        .full-width-img {
            width: 100%;
            height: auto;
            object-fit: cover;
            display: block;
        }
    </style>
</head>

<body>

    <!-- LOADER -->

    <div class="position-center-center">
        <div class="ldr"></div>
    </div>

    <!-- Wrap -->

    <!-- header -->
    <header class="sticky" style="background-color:#000000;">
        <div class="container">
            <!-- Logo -->
            <div class="logo"> <a href="/index_u"><img class="img-responsive"
                        src="{{ URL::asset('web/images/LogoAmarilloFondoMorado.png') }}" background-color="#000000"
                        width="300" height="90" alt=""></a> </div>
            <nav class="navbar ownmenu navbar-expand-lg" style="margin: 17px;">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <li> <a href="/howwork" style="color: #ffcc33;">Como Funciona?</a></li>

                    <li> <a href="/policyterm_u" style="color: #ffcc33;">Politicas</a></li>

                    <li> 
                        <a href="/index_u" style="color: #ffcc33;">Servcios</a></li>
                    </ul>
                </div>

                 

                <!-- Nav Right -->
                <div class="nav-right">
                    <ul class="navbar-right">
                        <!-- USER INFO -->
                        <li> <a href="/index" style="color: #ffcc33;"><i class="lnr lnr-user"></i> </a></li>
                        <!-- USER BASKET -->
                        <li> <a href="shopping-cart.html" style="color: #ffcc33;"><span class="c-no">2</span><i
                                    class="lnr lnr-cart"></i> </a> </li>
                        <!-- SEARCH BAR -->
                        <li> <a href="javascript:void(0);" class="search-open" style="color: #ffcc33;"><i
                                    class="lnr lnr-magnifier"></i></a>
                            <div class="search-inside animated bounceInUp"> <i class="icon-close search-close"></i>
                                <div class="search-overlay"></div>
                                <div class="position-center-center">
                                    <div class="search">
                                        <form>
                                            <input type="search" placeholder="Search Shop">
                                            <button type="submit"><i class="icon-check"></i></button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Nav Right -->
                                <div class="nav-right">
                                    <ul class="navbar-right">
                                        <!-- USER INFO -->
                                        <li> <a href="/index" style="color: #ffcc33;"><i class="lnr lnr-user"></i> </a>
                                        </li>
                                        <!-- USER BASKET -->
                                        <li> <a href="shopping-cart.html" style="color: #ffcc33;"><span
                                                    class="c-no">2</span><i class="lnr lnr-cart"></i> </a>
                                        </li>
                                        <!-- SEARCH BAR -->
                                        <li> <a href="javascript:void(0);" class="search-open"
                                                style="color: #ffcc33;"><i class="lnr lnr-magnifier"></i></a>
                                            <div class="search-inside animated bounceInUp"> <i
                                                    class="icon-close search-close"></i>
                                                <div class="search-overlay"></div>
                                                <div class="position-center-center">
                                                    <div class="search">
                                                        <form>
                                                            <input type="search" placeholder="Search Shop">
                                                            <button type="submit"><i class="icon-check"></i></button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="clearfix"></div>
    </header>

    <!-- HOME MAIN  -->
    <section class="home-slide simple-head video-background" style="height: 928px;">
        <!-- Video de fondo -->
        <video autoplay muted loop playsinline class="bg-video">
            <source src="{{ URL::asset('web/videos/Intro_membresia.mp4') }}" type="video/mp4">
            Tu navegador no soporta video HTML5.
        </video>

        <div class="container">
            <div class="single-slide owl-carousel">

                <!-- Slide 1 -->
                <div class="owl-slide">
                    <div class="text-left col-md-11 no-padding colorAmarillo">

                        <h4 class="colorAmarillo">Únete sin costo y descubre productos de grandes marcas</h4>
                        <h1 class="extra-huge-text colorAmarillo">Empieza a disfrutar sin pagar</h1>
                        <div class="text-btn">
                            <a href="/register" class="btn btn-inverse margin-top-40">Registrarme</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="owl-slide">
                    <div class="text-left col-md-11 no-padding">
                        <h4 class="colorAmarillo">Accede a productos exclusivos sin costo</h4>
                        <h2 class="extra-huge-text colorAmarillo"> Recibe muestras exclusivas</h2>
                        <div class="text-btn">
                            <a href="#." class="btn btn-inverse margin-top-40">Comprar membresía</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="owl-slide">
                    <div class="text-left col-md-11 no-padding">
                        <h4 class="colorAmarillo">Disfruta lo que tu membresía te ofrece</h4>
                        <h1 class="extra-huge-text colorAmarillo">Conoce todos los beneficios exclusivos</h1>
                        <div class="text-btn">
                            <a href="#." class="btn btn-inverse margin-top-40">Ver beneficios</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>



    <section class="shipment">
        <div class="container">
            <ul class="colorMorado">
                <li><img src="{{ URL::asset('web/img/icons/envio.png') }}" alt=""
                        style="height: 148px; padding-bottom: 25px;">
                    <h4 class="colorMorado">Envios Nacionales</h4>
                </li>

                <li><img src="{{ URL::asset('web/img/icons/soporte.png') }}" alt=""
                        style="height: 148px; padding-bottom: 25px;">
                    <h4 class="colorMorado">Soporte Online 24/7 </h4>
                </li>

                <li><img src="{{ URL::asset('web/img/icons/pago.png') }}" alt=""
                        style="height: 148px; padding-bottom: 25px;">
                    <h4 class="colorMorado"> Pago 100% Seguro </h4>
                </li>

                <li><img src="{{ URL::asset('web/img/icons/compania.png') }}" alt=""
                        style="height: 148px; padding-bottom: 25px;">
                    <h4 class="colorMorado">Compañias Reconocidas </h4>
                </li>
            </ul>
        </div>
    </section>


    <!-- HOME MAIN  -->
    <section class="home-slide simple-head" style="text-align: center;">
        <div class="">
            <!-- Item Slider -->
            <div class="single-slide">
                @foreach (\App\Models\Carousel::where('active', true)->orderBy('order')->get() as $item)
                    <div class="owl-slide">
                        <div class="w-full h-[300px] md:h-[400px] lg:h-[500px]">
                            <a href="{{ $item->link }}" target="{{ $item->target }}">
                                <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}"
                                    class="full-width-img">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Intro Section -->
    <section class="light-gray-bg padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="intro-sec">
                <div class="center-block">
                    <h1>Somos un sitio diferente</h1>
                    <h4>Existimos porque existen los consumidores “atípicos”, los que no son como todo el
                        mundo.
                        Consumidores
                        inteligentes que prueban antes de comprar.
                        Le llevamos a la puerta de su casa los productos y servicios que sólo le sirven a
                        usted.<br>
                        <br>
                        <a href="/howwork">Leer Mas...</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Content -->
    <div id="content">
        <!-- Shop By Items -->
        <section class="padding-top-100 padding-bottom-100">
            <div class="container">
                <!-- About Sec -->
                <div class="acces-ser">
                    <!-- Heading -->
                    <div class="row">

                        <!-- Bags -->
                        <div class="col-sm-4">
                            <article> <img class="img-responsive" src="{{ URL::asset('web/images/belleza.jpg') }}"
                                    alt="">
                                <h6>Belleza</h6>
                                <a href="#." class="btn by"> Ingresa Ahora</a>
                            </article>
                        </div>

                        <!-- Women -->
                        <div class="col-sm-4">
                            <article> <img class="img-responsive"
                                    src="{{ URL::asset('web/images/saludbinestar.jpg') }}" alt="">
                                <h6>Salud y Bienestar</h6>
                                <a href="#." class="btn by">Ingresa Ahora</a>
                            </article>
                        </div>

                        <!-- Bags -->
                        <div class="col-sm-4">
                            <article> <img class="img-responsive" src="{{ URL::asset('web/images/mascotas.jpg') }}"
                                    alt="">
                                <h6>Mascotas</h6>
                                <a href="#." class="btn by">Ingresa Ahora</a>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>


    <!-- New Arrival -->
    <section class="padding-top-100 padding-bottom-100">
        <div class="container">

            <!-- Main Heading -->
            <div class="heading text-center">
                <h4>PRODUCTOS DESTACADOS</h4>
                <hr>
            </div>

            <!-- New Arrival -->
            <div class="arrival-block item-col-3 with-spaces">
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/bloqueador.jpg') }}" alt=""> <img
                            class="img-2" src="{{ URL::asset('web/images/bloqueador.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                            <div class="add-crt"><a href="#."><i class="icon-basket margin-right-10"></i> Añadir
                                    al Carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Anthelios UVMUNE 400
                            50+SPF</a> <span class="price"><small></small><span class="line-through"></span>
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- Item -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/botilito.jpg') }}" alt=""> <img
                            class="img-2" src="{{ URL::asset('web/images/botilito.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    href="#qck-view-shop1"><i class="icon-eye"></i></a> </div>
                            <div class="add-crt"><a href="#."><i class="icon-basket margin-right-10"></i> Añadir
                                    al Carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Botilito</a> <span
                            class="price"><small></small><span class="line-through"></span>
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- Item -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/turbana.jpg') }}" alt="">
                        <img class="img-2" src="{{ URL::asset('web/images/turbana.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    href="#qck-view-shop1"><i class="icon-eye"></i></a> </div>
                            <div class="add-crt"><a href="#."><i class="icon-basket margin-right-10"></i> Añadir
                                    al Carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Turbana Chips de Platano
                        </a>
                        <span class="price"><small></small><span class="line-through"></span>
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- Item -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/katsil.jpg') }}" alt="">
                        <img class="img-2" src="{{ URL::asset('web/images/katsil.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    href="#qck-view-shop3"><i class="icon-eye"></i></a> </div>
                            <div class="add-crt"><a href="#."><i class="icon-basket margin-right-10"></i> Añadir
                                    al Carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">KATSIL – 5KG</a> <span
                            class="price">
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- Item -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/Cerave.jpg') }}" alt="">
                        <img class="img-2" src="{{ URL::asset('web/images/Cerave.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    href="#qck-view-shop4"><i class="icon-eye"></i></a> </div>
                            <div class="add-crt"><a href="#."><i class="icon-basket margin-right-10"></i> Añadir
                                    al Carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Cerave Crema
                            Hidratante</a>
                        <span class="price">
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- Item -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/Tosh.jpg') }}" alt="">
                        <img class="img-2" src="{{ URL::asset('web/images/Tosh.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    href="#qck-view-shop5"><i class="icon-eye"></i></a> </div>
                            <div class="add-crt"><a href="#."><i class="icon-basket margin-right-10"></i> Añadir
                                    al Carrito</a>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Galleta Wafer Tosh
                            Kiwi</a>
                        <span class="price">
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>



                <!-- View All Items -->
                <div class="text-center margin-top-30"> <a href="#." class="btn margin-right-20">Ver
                        mas
                        productos</a> </div>
            </div>

            <!-- Quick View -->
            <div id="qck-view-shop" class="zoom-anim-dialog qck-inside mfp-hide">
                <div class="row">
                    <div class="col-md-6">

                        <!-- Images Slider -->
                        <div class="images-slider">
                            <ul class="slides">
                                <li data-thumb="images/bloqueador.jpg"> <img
                                        src="{{ URL::asset('web/images/bloqueador.jpg') }}" alt="">
                                </li>
                                <li data-thumb="images/bloqueador2.jpg"> <img
                                        src="{{ URL::asset('web/images/bloqueador2.jpg') }}" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Content Info -->
                    <div class="col-md-6">
                        <div class="contnt-info">
                            <h3>Anthelios UVMUNE 400 50+SPF</h3>
                            <p>DERMATOLÓGICA. Fórmula ligera, cómoda para el uso diario y pieles sensibles.
                                Protección de amplio espectro que ayuda a prevenir daños causados por los
                                rayos
                                UVA, UVB, infrarojos y la polución. <br>
                                <br>
                            <h4 style="text-transform: bold;">
                                Tamaño de la muestra 5ml
                                Recibes dos (2) Unidades</h4>
                            </p>

                            <!-- Btn  -->
                            <div class="add-info">
                                <div class="quantity">
                                    <input type="number" min="1" max="100" step="1"
                                        value="1" class="form-control qty">
                                </div>
                                <a href="#." class="btn">Añadir a Carrito
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick View -->
            <div id="qck-view-shop1" class="zoom-anim-dialog qck-inside mfp-hide">
                <div class="row">
                    <div class="col-md-6">

                        <!-- Images Slider -->
                        <div class="images-slider">
                            <ul class="slides">
                                <li data-thumb="images/botilito.jpg"> <img
                                        src="{{ URL::asset('web/images/botilito.jpg') }}" alt="">
                                </li>
                                <li data-thumb="images/botilito2.jpg"> <img
                                        src="{{ URL::asset('web/images/botilito2.jpg') }}" alt="">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <!-- Content Info -->
                    <div class="col-md-6">
                        <div class="contnt-info">
                            <h3>Botilito Deportivo Plastico y Aluminio</h3>
                            <p>Botilito Deportivo Plastico y Aluminio en Rojo, Blanco, Azul o Verde<br>
                                <br>
                            <h4 style="text-transform: bold;">
                                Pagas solo $3.300</h4>
                            </p>

                            <!-- Btn  -->
                            <div class="add-info">
                                <div class="quantity">
                                    <input type="number" min="1" max="100" step="1"
                                        value="1" class="form-control qty">
                                </div>
                                <a href="#." class="btn">Añadir a Carrito
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <!-- Knowledge Share -->
    <section class="light-gray-bg padding-top-100 padding-bottom-100">
        <div class="container-full">

            <!-- Main Heading -->
            <div class="heading text-center">
                <h4>Lo que opinan nuestros clientes</h4>
                <hr>
            </div>
            <div class="knowledge-share">
                <ul class="row">
                    <!-- Post 1 -->
                    <li class="col">

                        <!-- Post Img -->
                        <div class="img-por"> <img src="{{ URL::asset('web/images/ToshComment.jpg') }}"
                                alt=""></div>
                        <article>
                            <!-- Date And comment -->
                            <div class="date"> <span class="huge">10</span> <span>Enero</span></div>
                            <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                                <span><strong><a href="#."></a></strong></span>
                            </div>
                            <div class="clearfix"></div>
                            <a href="#." class="b-tittle">Galleta Tosh Kiwi</a>
                            <p>Produto muy buen sabor y saludable, lo recibi en el tiempo estimado!!!! <a
                                    href="#."></a></p>
                        </article>
                    </li>

                    <!-- Post 2 -->
                    <li class="col">

                        <!-- Post Img -->
                        <div class="img-por"> <img src="{{ URL::asset('web/images/BacHumanComment.jpg') }}"
                                alt="">
                        </div>
                        <article>
                            <!-- Date And comment -->
                            <div class="date"> <span class="huge">25</span> <span>Febrero</span></div>
                            <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                                <span><strong><a href="#."></a></strong></span>
                            </div>
                            <div class="clearfix"></div>
                            <a href="#." class="b-tittle">Bac Human</a>
                            <p>Muy efectivo el producto, lo quiero comprar...<a href="#."></a></p>
                        </article>
                    </li>

                    <!-- Post 2 -->
                    <li class="col">
                        <!-- Post Img -->
                        <div class="img-por"> <img src="{{ URL::asset('web/images/PetysComment.jpg') }}"
                                alt=""></div>
                        <article>
                            <!-- Date And comment -->
                            <div class="date"> <span class="huge">27</span> <span>Febrero</span></div>
                            <div class="com-sec"> <span><strong><a href="#."></a></strong></span>
                                <span><strong><a href="#."></a></strong></span>
                            </div>
                            <div class="clearfix"></div>
                            <a href="#." class="b-tittle">Petys Familia</a>
                            <p>Le encanto a mi mascota, tan pronto lo acabe, lo comprare. Me llego en
                                optimas
                                condiciones<a href="#."></a></p>
                        </article>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer style="background-color:#000000;" style="color: #ffcc33;">
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
                            src="{{ URL::asset('web/images/LogoAmarilloFondoMorado_foot.png') }}" alt="">
                        <p><i class="icon-pointer"style="color: #ffcc33;"></i> Bogota,
                            Cundinamarca,
                            Colombia <br>
                        </p>
                        <p><i class="icon-call-end" style="color: #ffcc33;"></i> 315 123 45 67
                            <br>
                        </p>
                        <p><i class="icon-envelope" style="color: #ffcc33;"></i> Info@Muestraz.com
                            <br>
                            contactanos@Muestraz.com
                        </p>
                    </div>
                </div>

                <!-- HELPFUL LINKS -->
                <div class="col-md-5">
                    <h6>Links </h6>
                    <ul class="link two-half">
                        <li><a href="#."> Productos</a></li>
                        <li><a href="/register"> Registrarme</a></li>
                        <li><a href="#."> Membresia</a></li>
                        <li><a href="#."> Politica de Privcidad</a></li>
                        <li><a href="#."> Ingresar</a></li>
                        <li><a href="#."> Carrito </a></li>
                    </ul>
                </div>
                </ul>
            </div>
        </div>
        </div>

        <!-- Rights -->
        <div class="rights">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <p>© 2025 Muestraz Derechos Reservados. <a href="https://webicode.com/"></a>
                        </p>
                    </div>
                    <!-- <div class="col-md-6 text-right"> <img src="images/card-icon.png" alt=""> </div>-->
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


</body>

</html>
