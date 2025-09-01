@extends('layouts.layoutWeb')
@section('title')
    Mustraz.com
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
        .btn-light{ 
            background-color: #ffcc33 !important;
            color: #1E1E1E !important;
        }
        .texto-gris{
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
{{-- 


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
                            <a href="{{route('dashboard')}}"></a>
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
    <!-- Intro Section -->
    <section class="light-gray-bg padding-top-100 padding-bottom-100">
        <div class="container">
            <div class="intro-sec">
                <div class="center-block">
                    <h1>Somos un sitio diferente</h1>
                    <h4>Existimos porque existen los consumidores “atípicos”, los que no son como todo el
                        mundo. Consumidores inteligentes que prueban antes de comprar. Le llevamos a la puerta de su 
                        casa los productos y servicios que sólo le sirven a usted. <br> <a href="/howwork">Leer Mas...</a>
                </div>
            </div>
        </div>
    </section>




    <!-- New Arrival -->
    <section class="padding-top-100 padding-bottom-100">
        <div>

            <!-- Main Heading -->
            <div class="heading text-center">
                <h4>PRODUCTOS DESTACADOS</h4>
                <hr>
            </div>

            <!-- PRODUCTOS DESTACADOS  -->

            <!-- PRODUCTO UNO -->
            <div class="arrival-block item-col-3 with-spaces">
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/bloqueador.jpg') }}" alt=""> <img
                            class="img-2" src="{{ URL::asset('web/images/bloqueador.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    style="background-color: #7964caff; color: yellow;" href="#qck-view-shop"><i
                                        class="icon-eye"></i></a> </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Anthelios UVMUNE 400
                            50+SPF</a> <span class="price"><small></small><span class="line-through"></span>
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- ZOOM PRODUCTO UNO -->
                <div id="qck-view-shop" class="zoom-anim-dialog qck-inside mfp-hide">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Images Slider -->
                            <div class="images-slider">
                                <ul class="slides">
                                    <li data-thumb="web/images/bloqueador.jpg"> <img
                                            src="{{ URL::asset('web/images/bloqueador.jpg') }}" alt="">
                                    </li>
                                    <li data-thumb="web/images/bloqueador2.jpg"> <img
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
                                    Protección de amplio espectro que ayuda a prevenir daños causados por los rayos
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
                                    <a href="#." class="btn"
                                        style="background-color: #7964caff; color: yellow;">Añadir a Carrito
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTO DOS -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/botilito.jpg') }}" alt=""> <img
                            class="img-2" src="{{ URL::asset('web/images/botilito.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    style="background-color: #7964caff; color: yellow;" href="#qck-view-shop1"><i
                                        class="icon-eye"></i></a> </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Botilito</a> <span
                            class="price"><small></small><span class="line-through"></span>
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- ZOOM PRODUCTO DOS -->
                <div id="qck-view-shop1" class="zoom-anim-dialog qck-inside mfp-hide">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Images Slider -->
                            <div class="images-slider">
                                <ul class="slides">
                                    <li data-thumb="web/images/botilito.jpg"> <img
                                            src="{{ URL::asset('web/images/botilito.jpg') }}" alt="">
                                    </li>
                                    <li data-thumb="web/images/botilito2.jpg"> <img
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
                                    <a href="#." class="btn"
                                        style="background-color: #7964caff; color: yellow;">Añadir a Carrito
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTO TRES -->
                <!-- Item -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/turbana.jpg') }}" alt="">
                        <img class="img-2" src="{{ URL::asset('web/images/turbana.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    style="background-color: #7964caff; color: yellow;" href="#qck-view-shop3"><i
                                        class="icon-eye"></i></a> </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Turbana Chips de Platano
                        </a>
                        <span class="price"><small></small><span class="line-through"></span>
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- ZOOM PRODUCTO TRES -->
                <div id="qck-view-shop3" class="zoom-anim-dialog qck-inside mfp-hide">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Images Slider -->
                            <div class="images-slider">
                                <ul class="slides">
                                    <li data-thumb="images/turbana.jpg"> <img
                                            src="{{ URL::asset('web/images/turbana.jpg') }}" alt=""> </li>

                                </ul>
                            </div>
                        </div>

                        <!-- Content Info -->
                        <div class="col-md-6">
                            <div class="contnt-info">
                                <h3>TURBANA CHIPS de PLATANO con SAL MARINA</h3>
                                <p>Turbana es una empresa que elabora chips o snacks de plátanos en una amplia variedad
                                    de presentaciones.
                                    Los snacks de Turbana son ideales para disfrutar en cualquier ocasión, los chips de
                                    plátano de Turbana
                                    son libres de gluten, libre de grasas trans, cuentan con 0% colesterol y además son
                                    aptos para personas veganas.<br>
                                    <br>
                                <h4 style="text-transform: bold;">
                                    Muestra GRATIS</h4>
                                </p>

                                <!-- Btn  -->
                                <div class="add-info">
                                    <div class="quantity">
                                        <input type="number" min="1" max="100" step="1"
                                            value="1" class="form-control qty">
                                    </div>
                                    <a href="#." class="btn"
                                        style="background-color: #7964caff; color: yellow;">Añadir a Carrito
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTO CUATRO -->
                <!-- Item -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/katsil.jpg') }}" alt="">
                        <img class="img-2" src="{{ URL::asset('web/images/katsil.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    style="background-color: #7964caff; color: yellow;" href="#qck-view-shop4"><i
                                        class="icon-eye"></i></a> </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">KATSIL 5KG</a> <span class="price">
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- ZOOM PRODUCTO CUATRO -->
                <div id="qck-view-shop4" class="zoom-anim-dialog qck-inside mfp-hide">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Images Slider -->
                            <div class="images-slider">
                                <ul class="slides">
                                    <li data-thumb="images/katsil.jpg"> <img
                                            src="{{ URL::asset('web/images/katsil.jpg') }}" alt=""> </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Content Info -->
                        <div class="col-md-6">
                            <div class="contnt-info">
                                <h3>KATSIL Tu mascota quiere algo MEJOR 5Kg</h3>
                                <p>Las mejores Cualidades del producto para gatos
                                    Tiene la propiedad de aglomerante, reteniendo los residuos líquidos inmediatamente;
                                    es fácilmente manipulable con pala. Controla el olor y la humedad de las excretas de
                                    los gatos <br>
                                    <br>
                                <h4 style="text-transform: bold;">
                                    Venta $25.500 <br></h4>
                                <h3>Con MEMBRESIA $20.000</h3>
                                </p>

                                <!-- Btn  -->
                                <div class="add-info">
                                    <div class="quantity">
                                        <input type="number" min="1" max="100" step="1"
                                            value="1" class="form-control qty">
                                    </div>
                                    <a href="#." class="btn"
                                        style="background-color: #7964caff; color: yellow;">Añadir a Carrito
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTO CINCO -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/Cerave.jpg') }}" alt="">
                        <img class="img-2" src="{{ URL::asset('web/images/Cerave.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    style="background-color: #7964caff; color: yellow;" href="#qck-view-shop5"><i
                                        class="icon-eye"></i></a> </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Cerave Crema
                            Hidratante</a>
                        <span class="price">
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- ZOOM PRODUCTO CINCO -->
                <div id="qck-view-shop5" class="zoom-anim-dialog qck-inside mfp-hide">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Images Slider -->
                            <div class="images-slider">
                                <ul class="slides">
                                    <li data-thumb="images/Cerave.jpg"> <img
                                            src="{{ URL::asset('web/images/cerave.jpg') }}" alt=""> </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Content Info -->
                        <div class="col-md-6">
                            <div class="contnt-info">
                                <h3>CeraVe Crema Hidratante</h3>
                                <p>La crema hidratante con Tecnología MVE®, incluye en su formulación 3 ceramidas
                                    esenciales
                                    por lo que es capaz de restaurar la función barrera de la piel de rostro y cuerpo.
                                    En combinación,
                                    estas ceramidas no solo mantienen la hidratación las 24 horas del día, sino que van
                                    liberando agentes
                                    hidratantes capa por capa para penetrar en profundidad en cada pequeño pliegue de la
                                    piel.
                                    Se trata de una formulación sin perfumes e hipoalergénica por lo que es apta para
                                    pieles sensibles.<br>
                                    <br>
                                <h4 style="text-transform: bold;">
                                    Tres sachets (3) 7gr</h4>
                                </p>

                                <!-- Btn  -->
                                <div class="add-info">
                                    <div class="quantity">
                                        <input type="number" min="1" max="100" step="1"
                                            value="1" class="form-control qty">
                                    </div>
                                    <a href="#." class="btn"
                                        style="background-color: #7964caff; color: yellow;">Añadir a Carrito
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- PRODUCTO SEIS -->
                <div class="item">
                    <div class="img-ser">
                        <!-- Images -->
                        <img class="img-1" src="{{ URL::asset('web/images/Tosh.jpg') }}" alt="">
                        <img class="img-2" src="{{ URL::asset('web/images/Tosh.jpg') }}" alt="">
                        <!-- Overlay  -->
                        <div class="overlay">
                            <div class="position-center-center"> <a class="popup-with-move-anim"
                                    href="#qck-view-shop6"><i class="icon-eye"></i></a> </div>
                        </div>
                    </div>
                    <!-- Item Name -->
                    <div class="item-name"> <a href="#." class="i-tittle">Galleta Wafer Tosh
                            Kiwi</a>
                        <span class="price">
                            <small>$</small>0</span> <a class="deta animated fadeInRight" href="#."></a>
                    </div>
                </div>

                <!-- ZOOM PRODUCTO SEIS -->
                <div id="qck-view-shop6" class="zoom-anim-dialog qck-inside mfp-hide">
                    <div class="row">
                        <div class="col-md-6">

                            <!-- Images Slider -->
                            <div class="images-slider">
                                <ul class="slides">
                                    <li data-thumb="images/Tosh.jpg"> <img src="{{ URL::asset('web/images/tosh.jpg') }}"
                                            alt=""> </li>

                                </ul>
                            </div>
                        </div>

                        <!-- Content Info -->
                        <div class="col-md-6">
                            <div class="contnt-info">
                                <h3>RECIBES 2 UNIDADES (GALLETAS) </h3>
                                <p>Las galletas wafer con crema con kiwi sin azúcar adicionada están
                                    endulzadas con estevia. Prefíerelas porque son muy deliciosas, además son la opción
                                    ideal para cuando
                                    tienes antojo de dulce y quieres cuidarte sin castigarte. Elígelas porque no
                                    contienen colorantes
                                    ni saborizantes artificiales, además las puedes llevar a cualquier lugar en su
                                    práctico empaque.</p>
                                <p> <br>
                                    <br>
                                <h4 style="text-transform: bold;">
                                    Muestra GRATIS <br>
                                    Venta $0</h4>
                                </p>

                                <!-- Btn  -->
                                <div class="add-info">
                                    <div class="quantity">
                                        <input type="number" min="1" max="100" step="1"
                                            value="1" class="form-control qty">
                                    </div>
                                    <a href="#." class="btn"
                                        style="background-color: #7964caff; color: yellow;">Añadir a Carrito
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- View All Items -->
                <div class="text-center margin-top-30"> <a href="#." class="btn margin-right-20"
                        style="background-color: #7964caff; color: yellow;">Ver mas productos</a> </div>
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
