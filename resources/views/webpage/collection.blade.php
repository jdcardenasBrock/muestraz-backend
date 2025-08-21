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

    <div id="wrap">

        <!-- TOP Bar -->
        <div class="top-bar">
            <div class="container-full">
                <p class="colorAmarillo font-weight-bold"> <i class="icon-user"></i>{{Auth::user()->name}} </p>
                <p class="call colorAmarillo font-weight-bold"><i class="icon-envelope"></i>{{Auth::user()->email}} </p>

                <!-- Login Info -->
                <div class="login-info">
                    <ul>
                        <li><a href="#." class="colorAmarillo font-weight-bold"> MI PERFIL </a></li>
                        <li><a href="#" class="colorAmarillo font-weight-bold">MI CARRITO</a></li>

                        <!-- USER BASKET -->
                        <li class="dropdown user-basket "> <a href="#" class="dropdown-toggle colorAmarillo font-weight-bold"
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
                         <li><a class="colorAmarillo font-weight-bold" href="javascript:void();"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                            class="mdi mdi-logout text-muted font-size-16 align-middle me-2"></i> <span
                            class="align-middle">Cerrar Sesion</span></a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="position-center-center">
            <div class="ldr"></div>
        </div>

        <!-- Wrap -->

        <!-- header -->
        <header class="sticky" style="background-color:#000000;">
            <div class="container">
                <!-- Logo -->
                <div class="logo"> <a href="/index_u"><img class="img-responsive"
                            src="{{ URL::asset('web/images/LogoAmarillo.png') }}" width="400" height=""
                            alt=""></a> </div>
                <nav class="navbar ownmenu navbar-expand-lg" style="margin: 17px;">
                    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse"
                        data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                        aria-label="Toggle navigation"> <span></span>
                    </button>
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

                            <li> <a href="javascript:void(0);" class="search-open" style="color: #ffcc33;"><i
                                        class="lnr lnr-magnifier"></i></a>
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

                                    <!-- Nav Right -->
                                    <div class="nav-right">
                                        <ul class="navbar-right">
                                            <!-- USER INFO -->
                                            <li> <a href="/dashboard" style="color: #ffcc33;"><i
                                                        class="lnr lnr-user"></i> </a>
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
                                                                <button type="submit"><i
                                                                        class="icon-check"></i></button>
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

        <div id="content">

            <!-- New Arrival -->
            <section class="gray-bg padding-top-100 padding-bottom-100">
                <div class="container">

                    <!-- Main Heading -->
                    <div class="heading text-center">
                        <h4>The Only Shop Page</h4>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
                            Sed feugiat, tellus vel tristique posuere diam, </span>
                    </div>

                    <!-- CATEGORIES LIST -->

                    <div class="cate-list">
                        <ul>
                            <li><a href="#.">MEN</a></li>
                            <li class="active"><a href="#.">WOMEN</a></li>
                            <li><a href="#.">KIDS</a></li>
                            <li><a href="#.">ACCESSORIES</a></li>
                            <li><a href="#.">CATEGORIES</a></li>
                            <li><a href="#.">GIFTS</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Item Filters -->
                <div class="container-full">
                    <div class="item-fltr">
                        <!-- short-by -->
                        <div class="short-by"> Showing 1–10 of 20 results </div>
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
                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <div class="on-sale"> Sale </div>

                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-1.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-1-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">The Child
                                            Special
                                            Bag</a> <span class="price"><small>$</small><span
                                                class="line-through">299.00</span> <small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">The Child Special
                                                Bag</a> <span class="price"><small>$</small><span
                                                    class="line-through">299.00</span> <small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <div class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-half-o"></i> <a
                                                    href="#." class="wsh-list"><i class="icon-heart"></i> ADD TO
                                                    WISHLIST</a> </div>
                                            <!-- List Style -->
                                            <ul class="list-style">
                                                <li> Best Shop Products </li>
                                                <li> Color Option </li>
                                                <li> All Sizes </li>
                                                <li> Discounted Prices </li>
                                                <li> Refund Poloicy </li>
                                                <li> New Arrival </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-2.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-2-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Ladies Sandle
                                            Clean</a> <span class="price"><small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Ladies Sandle
                                                Clean</a> <span class="price"><small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-3.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-3-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Lather Bags
                                            Inside
                                            and outside</a> <span class="price"><small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Lather Bags Inside
                                                and
                                                outside</a> <span class="price"><small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                            <ul class="list-style">
                                                <li> Best Shop Products </li>
                                                <li> Color Option </li>
                                                <li> All Sizes </li>
                                                <li> Discounted Prices </li>
                                                <li> Refund Poloicy </li>
                                                <li> New Arrival </li>
                                            </ul>


                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-4.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-4-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Neck Skaff
                                            Full</a>
                                        <span class="price"><small>$</small><span class="line-through">299.00</span>
                                            <small>$</small>199.00</span> <a class="deta animated fadeInRight"
                                            href="#.">View Detail</a>
                                    </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Neck Skaff
                                                Full</a>
                                            <span class="price"><small>$</small><span
                                                    class="line-through">299.00</span>
                                                <small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-5.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-5-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Men's Fashion
                                            Winter Blue</a> <span class="price"><small>$</small><span
                                                class="line-through">299.00</span> <small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Men's Fashion
                                                Winter
                                                Blue</a> <span class="price"><small>$</small><span
                                                    class="line-through">299.00</span> <small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-6.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-6-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Best Bag Stool
                                            Collection</a> <span class="price"><small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Best Bag Stool
                                                Collection</a> <span class="price"><small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-7.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-7-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Angry T-Shirts
                                            White</a> <span class="price"><small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Angry T-Shirts
                                                White</a> <span class="price"><small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-8.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-8-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Child Dressing
                                            Shorts Jeans</a> <span class="price"><small>$</small><span
                                                class="line-through">299.00</span> <small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Child Dressing
                                                Shorts
                                                Jeans</a> <span class="price"><small>$</small><span
                                                    class="line-through">299.00</span> <small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-9.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-9-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">The Best Hand
                                            Back
                                            Small</a> <span class="price"><small>$</small><span
                                                class="line-through">299.00</span> <small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">The Best Hand Back
                                                Small</a> <span class="price"><small>$</small><span
                                                    class="line-through">299.00</span> <small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-10.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-10-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Child White
                                            Skinny
                                            Jeans</a> <span class="price"><small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Child White Skinny
                                                Jeans</a> <span class="price"><small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-11.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-11-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Mid Rise Skinny
                                            Jeans</a> <span class="price"><small>$</small><span
                                                class="line-through">299.00</span> <small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Mid Rise Skinny
                                                Jeans</a> <span class="price"><small>$</small><span
                                                    class="line-through">299.00</span> <small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-12.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-12-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Mid Rise Skinny
                                            Jeans</a> <span class="price"><small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Mid Rise Skinny
                                                Jeans</a> <span class="price"><small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-13.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-13-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Mid Rise Skinny
                                            Jeans</a> <span class="price"><small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Mid Rise Skinny
                                                Jeans</a> <span class="price"><small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-14.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-14-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Mid Rise Skinny
                                            Jeans</a> <span class="price"><small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Mid Rise Skinny
                                                Jeans</a> <span class="price"><small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Item -->
                            <div class="item">
                                <div class="img-ser">
                                    <!-- Images -->
                                    <div class="thumb"> <img class="img-1" src="images/item-img-1-15.jpg"
                                            alt=""><img class="img-2" src="images/item-img-1-15-1.jpg"
                                            alt="">
                                        <!-- Overlay  -->
                                        <div class="overlay">
                                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                                    href="#qck-view-shop"><i class="icon-eye"></i></a> </div>
                                            <div class="add-crt"><a href="#."><i
                                                        class="icon-basket margin-right-10"></i> Add To Cart</a></div>
                                        </div>
                                    </div>

                                    <!-- Item Name -->
                                    <div class="item-name fr-grd"> <a href="#." class="i-tittle">Mid Rise Skinny
                                            Jeans</a> <span class="price"><small>$</small><span
                                                class="line-through">299.00</span> <small>$</small>199.00</span> <a
                                            class="deta animated fadeInRight" href="#.">View Detail</a> </div>
                                    <!-- Item Details -->
                                    <div class="cap-text">
                                        <div class="item-name"> <a href="#." class="i-tittle">Mid Rise Skinny
                                                Jeans</a> <span class="price"><small>$</small><span
                                                    class="line-through">299.00</span> <small>$</small>199.00</span>
                                            <!-- Stars -->
                                            <span class="stras"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i>
                                                <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star-half-o"></i> </span>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus. Sed ullamcorper sapien lacus, eu luctus non.
                                                Nulla
                                                lacinia, eros vel fermentum consectetur,</p>
                                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante
                                                ipsum primis in faucibus.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- View All Items -->
                    <div class="text-center margin-top-30"> <a href="#." class="btn margin-right-20">View ALl
                            Shop
                            Items</a> </div>

                    <!-- Quick View -->
                    <div id="qck-view-shop" class="zoom-anim-dialog qck-inside mfp-hide">
                        <div class="row">
                            <div class="col-md-6">

                                <!-- Images Slider -->
                                <div class="images-slider">
                                    <ul class="slides">
                                        <li data-thumb="images/item-img-1-1.jpg"> <img src="images/item-img-1-1.jpg"
                                                alt=""> </li>
                                        <li data-thumb="images/item-img-1-1-1.jpg"> <img
                                                src="images/item-img-1-1-1.jpg" alt=""> </li>
                                        <li data-thumb="images/item-img-1-1.jpg"> <img src="images/item-img-1-1.jpg"
                                                alt=""> </li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Content Info -->
                            <div class="col-md-6">
                                <div class="contnt-info">
                                    <h3>Mid Rise Skinny Jeans</h3>
                                    <p>This is dummy copy. It is not meant to be read. It has been placed here solely to
                                        demonstrate the look and feel of finished, typeset text. Only for show. He who
                                        searches for meaning here will be sorely disappointed. <br>
                                        <br>
                                        These words are here to provide the reader with a basic impression of how actual
                                        text will appear in its final presentation.
                                    </p>

                                    <!-- Btn  -->
                                    <div class="add-info">
                                        <div class="quantity">
                                            <input type="number" min="1" max="100" step="1"
                                                value="1" class="form-control qty">
                                        </div>
                                        <a href="#." class="btn btn-inverse"><i class="icon-heart"></i></a> <a
                                            href="#." class="btn">ADD TO CART </a>
                                    </div>
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
                        <h4>Latest news about Fashion</h4>
                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus vehicula.
                            Sed feugiat, tellus vel tristique posuere diam, </span>
                    </div>
                    <div class="knowledge-share">
                        <ul class="row">
                            <!-- Post 1 -->
                            <li class="col-md-4">
                                <article>
                                    <!-- Date And comment -->
                                    <div class="date"> <span class="huge">10</span> <span>January</span></div>
                                    <div class="com-sec"> <span>By: <strong><a
                                                    href="#.">Admin</a></strong></span>
                                        <span>Comments: <strong><a href="#.">32</a></strong></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="#." class="b-tittle">Donec commo is vulputate</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec faucibus maximus
                                        vehicula. tellus vel tristique posuere, <a href="#.">Read more</a></p>
                                </article>
                            </li>

                            <!-- Post 2 -->
                            <li class="col-md-4">
                                <article>
                                    <!-- Date And comment -->
                                    <div class="date"> <span class="huge">25</span> <span>February</span></div>
                                    <div class="com-sec"> <span>By: <strong><a
                                                    href="#.">Admin</a></strong></span>
                                        <span>Comments: <strong><a href="#.">32</a></strong></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="#." class="b-tittle">Donec commo is vulputate</a>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed feugiat, tellus vel
                                        tristique posuere, <a href="#.">Read more</a></p>
                                </article>
                            </li>

                            <!-- Post 2 -->
                            <li class="col-md-4">
                                <article>
                                    <!-- Date And comment -->
                                    <div class="date"> <span class="huge">25</span> <span>February</span></div>
                                    <div class="com-sec"> <span>By: <strong><a
                                                    href="#.">Admin</a></strong></span>
                                        <span>Comments: <strong><a href="#.">32</a></strong></span>
                                    </div>
                                    <div class="clearfix"></div>
                                    <a href="#." class="b-tittle">Donec commo is vulputate</a>
                                    <p>Lorem ipsum dolor sit amet elit. Donec faucibus maximus vehicula. Sed feugiat,
                                        tellus
                                        vel tristique posuere, <a href="#.">Read more</a></p>
                                </article>
                            </li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- About -->
            <section class="small-about">
                <div class="container-full">
                    <div class="news-letter padding-top-150 padding-bottom-150">
                        <div class="row">
                            <div class="col-lg-6">
                                <h3>We always stay with our clients and respect their business. We deliver 100% and
                                    provide
                                    instant response to help them succeed in constantly changing and challenging
                                    business
                                    world. </h3>
                                <ul class="social_icons">
                                    <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                                    <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                                    <li><a href="#."><i class="icon-social-tumblr"></i></a></li>
                                    <li><a href="#."><i class="icon-social-youtube"></i></a></li>
                                    <li><a href="#."><i class="icon-social-dribbble"></i></a></li>
                                </ul>
                            </div>
                            <div class="col-lg-6">
                                <h3>Subscribe Our Newsletter</h3>
                                <span>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac.</span>
                                <form>
                                    <input type="email" placeholder="Enter your email address" required>
                                    <button type="submit">Subscribe</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Testimonial -->
            <section class="testimonial padding-top-100 padding-bottom-80">
                <div class="container">

                    <!-- Main Heading -->
                    <div class="heading text-center margin-bottom-60">
                        <h4>Our Customers Feedback</h4>
                        <hr>
                    </div>

                    <!-- Slide -->
                    <div class="two-col">

                        <!-- Slide -->
                        <div class="testi-in"> <i class="fa fa-quote-left"></i>
                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsum primis in
                                faucibus. Sed ullamcorper sapien lacus, eu luctus non. Nulla lacinia, eros vel fermentum
                                consectetur,</p>
                            <h5>John Smith</h5>
                            <span>Themeforest</span>
                        </div>

                        <!-- Slide -->
                        <div class="testi-in"> <i class="fa fa-quote-left"></i>
                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsum primis in
                                faucibus. Sed lacus, eu posuere odio luctus non. Nulla lacinia, eros vel fermentum
                                consectetur, </p>
                            <h5>John Smith</h5>
                            <span>Themeforest</span>
                        </div>

                        <!-- Slide -->
                        <div class="testi-in"> <i class="fa fa-quote-left"></i>
                            <p>Phasellus lacinia fermentum bibendum. Interdum et malesuada fames ac ante ipsum. Sed
                                ullamcorper sapien lacus, eu posuere odio luctus non. Nulla lacinia, eros vel fermentum
                                consectetur, </p>
                            <h5>John Smith</h5>
                            <span>Themeforest</span>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Clients -->
            <section class="clients light-gray-bg padding-top-60 padding-bottom-80">
                <div class="container-full">
                    <div class="clients-slide">
                        <div> <img src="images/c-mg-1.png" alt=""> </div>
                        <div> <img src="images/c-mg-2.png" alt=""> </div>
                        <div> <img src="images/c-mg-3.png" alt=""> </div>
                        <div> <img src="images/c-mg-1.png" alt=""> </div>
                        <div> <img src="images/c-mg-2.png" alt=""> </div>
                        <div> <img src="images/c-mg-3.png" alt=""> </div>
                        <div> <img src="images/c-mg-1.png" alt=""> </div>
                        <div> <img src="images/c-mg-2.png" alt=""> </div>
                        <div> <img src="images/c-mg-3.png" alt=""> </div>
                    </div>
                </div>
            </section>
        </div>

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
                                src="{{ URL::asset('web/images/LogoAmarillo_foot.png') }}" alt="">
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
                            <li><a href="/policyterm_u"> Politica de Privcidad</a></li>
                            <li><a href="/dashboard"> Ingresar</a></li>
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
