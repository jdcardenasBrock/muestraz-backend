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
    <header class="sticky" style="background-color:#7964caff;">
        <div class="container">
            <!-- Logo -->
            <div class="logo"> <a href="/index_u"><img class="img-responsive"
                        src="{{ URL::asset('web/images/LogoAmarilloFondoMorado.png') }}" background-color="#7964caff"
                        width="300" height="90" alt=""></a> </div>
            <nav class="navbar ownmenu navbar-expand-lg" style="margin: 17px;">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">

                    <li> <a href="/index_u" style="color: #ffcc33;">Como Funciona?</a></li>

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

<body>

  <!-- LOADER -->
  <div id="loader" style="background-color:#4b33a8;">
    <div class="position-center-center">
      <div class="ldr"></div>
    </div>
  </div>

  <!-- Wrap -->
  <div id="wrap">
    <!-- header -->
    <header class="sticky" style="background-color:#4b33a8;">
      <div class="container">
          <!-- Logo -->
          <div class="logo"> <a href="index.html"><img class="img-responsive" src="images/LogoAmarilloFondoMorado.png"
                background-color="#4b33a8" width="300" height="90" alt=""></a> </div>
          <nav class="navbar ownmenu navbar-expand-lg" style="margin: 17px;">
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
              aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> <span></span> </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <li class="dropdown active"> <a href="#." class="dropdown-toggle" data-toggle="dropdown"
                  style="color: #ffcc33;">Como Funciona?</a>
              </li>
              <li class="dropdown"> <a href="index.html" class="dropdown-toggle" data-toggle="dropdown"
                  style="color: #ffcc33;">Registrarse</a></li>
              <li> <a href="about-us_01.html" style="color: #ffcc33;">Pop Up </a> </li>
              <li class="dropdown"> <a href="#." class="dropdown-toggle" data-toggle="dropdown"
                  style="color: #ffcc33;">Servicios</a></li>
              </ul>
            </div>

            <!-- Nav Right -->
            <div class="nav-right">
              <ul class="navbar-right">
                <!-- USER INFO -->
                <li> <a href="#" style="color: #ffcc33;"><i class="lnr lnr-user"></i> </a></li>
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
                  </div>
                </li>
              </ul>
            </div>
          </nav>
      </div>
      <div class="clearfix"></div>
    </header>



    <!-- Intro Section -->
    <section class="light-gray-bg padding-top-100 padding-bottom-100">
      <div class="container">
        <div class="intro-sec">
          <div class="center-block">
            <h1>Somos un sitio diferente</h1>
            <h5>Existimos porque existen los consumidores “atípicos”, los que no son como todo el mundo. Consumidores
              inteligentes que prueban antes de comprar.
              Le llevamos a la puerta de su casa los productos y servicios que sólo le sirven a usted.</h5><br>
            
              <h1>Únete a la comunidad</h1>
            <h5>Lo primero que debes hacer es ser miembro de la comunidad que lo prueba todo, y para eso debes pagar 
              la <strong>suscripción anual de solo $48.000</strong> —prácticamente como si pagaras <strong>$4.000 al mes.</strong>
              ¡NADA! Para lo que vas a recibir.</h5><br>
              <a href="#." class="btn btn-inverse margin-right-20">Membresia</a><br><br>

            <h1>¡Lleva hasta <strong>8 productos GRATIS </strong> por pedido!</h1>
            <h5>¡Pedir productos gratis es muy fácil! Solo pagas el valor del domicilio y te los llevamos directo a 
              tu casa. Además, puedes comprar productos con descuentos especiales que conseguimos para ti.</h5><br> 
              
             <h1>Registro</h1>
            <h5>Entre más exacta sea tu información al registrarte, más vamos a saber de ti y así vamos a poder trabajar
              para encontrar los productos que van con tu perfil.<br> 
              Podemos incluso tener productos para ti que, así no los pidas, te pueden llegar de sorpresa
              a tu casa.</h5><br>
              <a href="#." class="btn btn-inverse margin-right-20">Registrarse</a><br><br>

              <h1>Recomendaciones para pedir</h1>
            <h5>
            <ul></ul> 
            <li>Por cada orden puedes pedir hasta 8 productos gratis</li> <br>
            <li>Puedes volver a pedir todas las veces que quieras, pero <strong> NO puedes repetir producto.</strong>
            Si te gusta un producto, ¡puedes comprarlo después si está disponible!</li> <br>
            <li><strong>También podrás participar por premios.</strong> Habrá marcas que, si probaste y te gustó, 
            y demuestras que compraste después de la prueba, te vamos a premiar por tu fidelidad.</li> <br>
            <li>Debes estar atento a las condiciones de cada producto.</li> <br>
            </ul></h5>
            
            <h1>Entregas</h1>
            <h5>
            <ul></ul> 
            <li>Tiempo de entrega: <strong>8 a 10 días hábiles.</strong></li> <br>
            <li>Solo entregamos en ciudades que aparecen en el menú</li> <br>
            <li>Verifica bien tu dirección y que tu ciudad tenga cobertura</li><br>
            </ul></h5>
            
            <h1>Datos importantes</h1>
            <h5>
            <ul></ul> 
            <li>Escribe correctamente tu dirección, número de celular y número de documento</li> <br>
            <li>Solo permitimos registros de hogares, no comercios</li> <br>
            <li>Verifica bien tu dirección y que tu ciudad tenga cobertura</li> <br>
            <li>Si detectamos fraude, se cancelará tu cuenta y dirección registrada</li> <br>
            </ul></h5>
            
              
          </div>
        </div>
      </div>
    </section>

    <!-- FOOTER -->
    <footer style="background-color:#7964caff;" style="color: #ffcc33;">
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
