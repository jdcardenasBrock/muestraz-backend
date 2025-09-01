@extends('layouts.layoutWeb')
@section('title')
    Muestraz.com
@endsection

@section('styles')
    <style>
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

        .btn-light {
            background-color: #ffcc33 !important;
            color: #1E1E1E !important;
        }

        .texto-gris {
            color: #E5E5E5 !important;
        }
    </style>
@endsection
@section('content')
    <!-- HOME MAIN  -->
    <section class="home-slide simple-head video-background" style="height: 880px;">
        <!-- Video de fondo -->
        <video autoplay muted loop playsinline class="bg-video">
            <source src="{{ URL::asset('web/videos/Intro_membresia2.mp4') }}" type="video/mp4">
            Tu navegador no soporta video HTML5.
        </video>

        <div class="container">
            <div class="single-slide owl-carousel" style="top:-60px">

                <!-- Slide 1 -->
                <div class="owl-slide">
                    <div class="text-left col-md-8 pl-4">

                        <h4 class="texto-gris">Únete sin costo y descubre productos de grandes marcas</h4>
                        <h1 class="extra-huge-text text-white">Empieza a disfrutar sin pagar</h1>
                        <div class="text-btn">
                            <a href="{{ route('register') }}" class="btn btn-inverse margin-top-40 btn-light">
                                Registrarme
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Slide 2 -->
                <div class="owl-slide">
                    <div class="text-left col-md-8 pl-4">
                        <h4 class="texto-gris">Accede a productos exclusivos sin costo</h4>
                        <h2 class="extra-huge-text text-white"> Recibe muestras exclusivas</h2>
                        <div class="text-btn">
                            <a href="#." class="btn btn-inverse margin-top-40 btn-light">Comprar membresía</a>
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="owl-slide">
                    <div class="text-left col-md-8 pl-4">
                        <h4 class="texto-gris">Disfruta lo que tu membresía te ofrece</h4>
                        <h1 class="extra-huge-text text-white">Conoce todos los beneficios exclusivos</h1>
                        <div class="text-btn">
                            <a href="#." class="btn btn-inverse margin-top-40 btn-light">Ver beneficios</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- HOME MAIN  -->
    <section class="home-slide" style="text-align: center; padding-top:0px; max-height:800px">
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
    <!-- Content -->
    <div id="content">

        <section class="padding-top-100 padding-bottom-100">



            <div class="container-full">

                <!-- About Sec -->
                <div class="acces-ser">
                    <!-- Heading -->
                    <div class="row">
                        <div class="row g-4">
                            @foreach (\App\Models\Category::where('active', true)->orderBy('order')->get() as $item)
                                <a href="{{ route('dashboard') }}"></a>
                                <div class="col-sm-4">
                                    <div class="category-card">
                                        <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->name }}"
                                            class="img-fluid">
                                        <div class="category-title">
                                            <h5>{{ $item->name }}</h5>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Popular Products -->
    <section class="light-gray-bg padding-top-100 padding-bottom-100">
        <div class="container">

            <!-- Main Heading -->
            <div class="heading text-center">
                <h4>Productos Destacados</h4>
                <hr>
            </div>

            <!-- Popular Item Slide -->
            <div class="papular-block block-slide-con">
                <!-- Item -->
                <div class="item">
                    <!-- Sale -->
                    <div class="on-sale"> Sale </div>
                    <!-- Item img -->
                    <div class="item-img"> <img class="img-1" src="images/item-img-1-1.jpg" alt=""> <img
                            class="img-2" src="images/item-img-1-1-1.jpg" alt="">
                        <!-- Overlay -->
                        <div class="overlay">
                            <div class="position-bottom">
                                <div class="inn"><a href="images/product-1.jpg" data-lighter><i
                                            class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a
                                        href="#." data-toggle="tooltip" data-placement="top" title="Add To WishList"><i
                                            class="icon-heart"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Item Name -->
                    <div class="item-name"> <a href="#.">Mid Rise Skinny Jeans </a>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Price -->
                    <span class="price"><small>$</small><span class="line-through">299.00</span>
                        <small>$</small>199.00</span>
                </div>

                <!-- Item -->
                <div class="item">
                    <!-- Item img -->
                    <div class="item-img"> <img class="img-1" src="images/item-img-1-2.jpg" alt=""> <img
                            class="img-2" src="images/item-img-1-2-1.jpg" alt="">
                        <!-- Overlay -->
                        <div class="overlay">
                            <div class="position-bottom">
                                <div class="inn"><a href="images/product-2.jpg" data-lighter><i
                                            class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a
                                        href="#." data-toggle="tooltip" data-placement="top"
                                        title="Add To WishList"><i class="icon-heart"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Item Name -->
                    <div class="item-name"> <a href="#.">Mid Rise Skinny Jeans </a>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Price -->
                    <span class="price"><small>$</small>299</span>
                </div>

                <!-- Item -->
                <div class="item">

                    <!-- Item img -->
                    <div class="item-img"> <img class="img-1" src="images/item-img-1-3.jpg" alt=""> <img
                            class="img-2" src="images/item-img-1-3-1.jpg" alt="">
                        <!-- Overlay -->
                        <div class="overlay">
                            <div class="position-bottom">
                                <div class="inn"><a href="images/product-3.jpg" data-lighter><i
                                            class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a
                                        href="#." data-toggle="tooltip" data-placement="top"
                                        title="Add To WishList"><i class="icon-heart"></i></a></div>
                            </div>
                        </div>
                    </div>

                    <!-- Item Name -->
                    <div class="item-name"> <a href="#.">Mid Rise Skinny Jeans </a>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Price -->
                    <span class="price"><small>$</small>299</span>
                </div>

                <!-- Item -->
                <div class="item">
                    <!-- Item img -->
                    <div class="item-img"> <img class="img-1" src="images/item-img-1-4.jpg" alt=""> <img
                            class="img-2" src="images/item-img-1-4-1.jpg" alt="">
                        <!-- Overlay -->
                        <div class="overlay">
                            <div class="position-bottom">
                                <div class="inn"><a href="images/product-4.jpg" data-lighter><i
                                            class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a
                                        href="#." data-toggle="tooltip" data-placement="top"
                                        title="Add To WishList"><i class="icon-heart"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#.">Mid Rise Skinny Jeans </a>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Price -->
                    <span class="price"><small>$</small>299</span>
                </div>

                <!-- Item -->
                <div class="item">

                    <!-- Item img -->
                    <div class="item-img"> <img class="img-1" src="images/item-img-1-5.jpg" alt=""> <img
                            class="img-2" src="images/item-img-1-5-1.jpg" alt="">
                        <!-- Overlay -->
                        <div class="overlay">
                            <div class="position-bottom">
                                <div class="inn"><a href="images/product-3.jpg" data-lighter><i
                                            class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a
                                        href="#." data-toggle="tooltip" data-placement="top"
                                        title="Add To WishList"><i class="icon-heart"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#.">Mid Rise Skinny Jeans </a>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Price -->
                    <span class="price"><small>$</small>299</span>
                </div>

                <!-- Item -->
                <div class="item">

                    <!-- Item img -->
                    <div class="item-img"> <img class="img-1" src="images/item-img-1-6.jpg" alt=""> <img
                            class="img-2" src="images/item-img-1-6-1.jpg" alt="">
                        <!-- Overlay -->
                        <div class="overlay">
                            <div class="position-bottom">
                                <div class="inn"><a href="images/product-4.jpg" data-lighter><i
                                            class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a
                                        href="#." data-toggle="tooltip" data-placement="top"
                                        title="Add To WishList"><i class="icon-heart"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#.">Mid Rise Skinny Jeans </a>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Price -->
                    <span class="price"><small>$</small>299</span>
                </div>

                <!-- Item -->
                <div class="item">

                    <!-- Item img -->
                    <div class="item-img"> <img class="img-1" src="images/item-img-1-7.jpg" alt=""> <img
                            class="img-2" src="images/item-img-1-7-1.jpg" alt="">
                        <!-- Overlay -->
                        <div class="overlay">
                            <div class="position-bottom">
                                <div class="inn"><a href="images/product-3.jpg" data-lighter><i
                                            class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a
                                        href="#." data-toggle="tooltip" data-placement="top"
                                        title="Add To WishList"><i class="icon-heart"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#.">Mid Rise Skinny Jeans </a>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Price -->
                    <span class="price"><small>$</small>299</span>
                </div>

                <!-- Item -->
                <div class="item">

                    <!-- Item img -->
                    <div class="item-img"> <img class="img-1" src="images/item-img-1-8.jpg" alt=""> <img
                            class="img-2" src="images/item-img-1-8-1.jpg" alt="">
                        <!-- Overlay -->
                        <div class="overlay">
                            <div class="position-bottom">
                                <div class="inn"><a href="images/product-4.jpg" data-lighter><i
                                            class="icon-magnifier"></i></a> <a href="#." data-toggle="tooltip"
                                        data-placement="top" title="Add To Cart"><i class="icon-basket"></i></a> <a
                                        href="#." data-toggle="tooltip" data-placement="top"
                                        title="Add To WishList"><i class="icon-heart"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#.">Mid Rise Skinny Jeans </a>
                        <p>Lorem ipsum dolor sit amet</p>
                    </div>
                    <!-- Price -->
                    <span class="price"><small>$</small>299</span>
                </div>
            </div>
        </div>
    </section>

    <!-- About -->
    <section class="small-about">
        <div class="container-full">
            <div class="news-letter padding-top-150 padding-bottom-150">
                <div class="row">
                    <div class="col-lg-6">
                        <h3>Te regalamos una muestra gratuita para que pruebes la calidad en tus manos. Solo regístrate,
                            ¡así de fácil! </h3>
                        <ul class="social_icons">
                            <li><a href="#."><i class="icon-social-facebook"></i></a></li>
                            <li><a href="#."><i class="icon-social-twitter"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <h3>Únete a quienes ya comprobaron la diferencia</h3>
                        <br>
                        <a href="/register">
                            <button type="button" class="btn btn-login mt-4">Probar ahora →</button>
                        </a>
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
                        <div class="img-por"> <img src="{{ URL::asset('web/images/ToshComment.jpg') }}" alt="">
                        </div>
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
                        <div class="img-por"> <img src="{{ URL::asset('web/images/PetysComment.jpg') }}" alt="">
                        </div>
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
@endsection
