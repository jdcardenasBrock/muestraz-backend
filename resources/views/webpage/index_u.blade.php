@extends('layouts.layoutWeb')
@section('title')
    Muestraz.com
@endsection
@section('styles')
    <style>
        /* ===== Banner general ===== */
        .banner-container {
            height: 55vh !important;
            /* más alto */
            max-height: 600px;
            width: 100%;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 14px;
            position: relative;
        }

        /* Para evitar espacios en blanco en imágenes individuales */
        .banner-container.one-image {
            height: 55vh !important;
        }

        .banner-img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* llena sin espacios */
            border-radius: 14px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.25);
            transition: transform 0.4s ease;
        }

        .banner-img:hover {
            transform: scale(1.03);
        }

        /* Split (2 imágenes) */
        .banner-container.split {
            display: flex;
            gap: 16px;
        }

        .split-item {
            flex: 1;
            height: 100%;
        }

        .split-item .banner-img {
            object-fit: cover;
        }

        /* ===== Animación Fade ===== */
        .fade-slide {
            opacity: 0;
            transition: opacity 1.2s ease-in-out;
        }

        .owl-item.active .fade-slide {
            opacity: 1;
        }

        /* ===== Navegación profesional ===== */
        .owl-nav button {
            background: rgba(255, 255, 255, 0.85);
            border-radius: 50%;
            width: 42px;
            height: 42px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.25);
            transition: 0.3s;
            font-size: 20px !important;
        }

        .owl-nav button:hover {
            background: white;
            transform: scale(1.08);
        }

        /* Posición de flechas */
        .owl-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            padding: 0 20px;
            transform: translateY(-50%);
        }

        /* ===== Indicadores (puntos) profesionales ===== */
        .owl-dots .owl-dot span {
            width: 10px;
            height: 10px;
            margin: 5px 6px;
            background: #d0d0d0;
            border-radius: 50%;
            transition: 0.3s;
        }

        .owl-dots .owl-dot.active span {
            background: #333;
            transform: scale(1.3);
        }

        .owl-dots {
            margin-top: 10px;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .banner-container {
                height: 42vh !important;
            }

            .banner-container.split {
                flex-direction: column;
                height: auto;
            }

            .split-item {
                height: 40vh !important;
            }
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
                            @auth
                                <a href="/m_membership" class="btn btn-inverse margin-top-40 btn-light">Comprar membresía</a>
                            @else
                                <a href="/login" class="btn btn-inverse margin-top-40 btn-light">Comprar membresía</a>
                            @endauth
                        </div>
                    </div>
                </div>

                <!-- Slide 3 -->
                <div class="owl-slide">
                    <div class="text-left col-md-8 pl-4">
                        <h4 class="texto-gris">Disfruta lo que tu membresía te ofrece</h4>
                        <h1 class="extra-huge-text text-white">Conoce todos los beneficios exclusivos</h1>
                        <div class="text-btn">
                            <a href="/howwork" class="btn btn-inverse margin-top-40 btn-light">Ver beneficios</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <br>
    @php
        $content = '';
        $content = DB::table('titleIndex')->first();
        if ($content != '') {
            $content = $content->content;
        }
    @endphp
    <div class="pt-4  bg-white" style="max-height: 30vh; overflow-y: auto; width: 100%;">
        {!! $content !!}
    </div>

    <!-- HOME MAIN  -->
    <section class="home-slide mt-[90px]" style="padding-top: 20px !important;">
        <div class="single-slide owl-carousel">
            @foreach (\App\Models\Carousel::where('active', true)->orderBy('order')->get() as $item)
                <div class="owl-slide fade-slide">

                    {{-- Layout FULL (1 imagen) --}}
                    @if ($item->layout_type == 'full')
                        <div class="banner-container one-image">
                            <a href="{{ $item->link_left }}" target="{{ $item->target }}">
                                <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->title }}"
                                    class="banner-img">
                            </a>
                        </div>
                    @endif

                    {{-- Layout SPLIT (2 imágenes) --}}
                    @if ($item->layout_type == 'split')
                        <div class="banner-container split">
                            <a href="{{ $item->link_left }}" target="{{ $item->target }}" class="split-item">
                                <img src="{{ Storage::url($item->image_left) }}" alt="{{ $item->title }}"
                                    class="banner-img">
                            </a>

                            <a href="{{ $item->link_right }}" target="{{ $item->target }}" class="split-item">
                                <img src="{{ Storage::url($item->image_right) }}" alt="{{ $item->title }}"
                                    class="banner-img">
                            </a>
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </section>

    <!-- Content -->
    <div id="content">
        <section class="padding-top-100 padding-bottom-100">
            <div class="container-full">
                <div class="acces-ser">
                    <div class="categories-carousel owl-carousel">
                        @foreach (\App\Models\Category::where('active', true)->orderBy('order')->get() as $item)
                            <div class="category-card">
                                <a href="{{ route('dashboard') }}">
                                    <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->name }}">
                                    <div class="category-title">
                                        <h5>{{ $item->name }}</h5>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-center margin-top-30"> <a href="/dashboard" class="btn btn-light margin-right-20">Ver las
                    categorias</a> </div>
        </section>
    </div>

    <!-- Popular Products -->
    <section class="light-gray-bg padding-top-100 padding-bottom-100 ">
        <div class="container ">

            <!-- Main Heading -->
            <div class="heading text-center">
                <h3>Productos Destacados</h3>
                <hr>
            </div>

            <!-- Popular Item Slide -->
            <div class="papular-block block-slide" style="margin-left: 50px;">

                @foreach (\App\Models\Product::orderBy('created_at', 'desc')->where('destacado', 1)->get() as $product)
                    <div class="item">
                        <!-- Item img -->
                        <div class="item-img">
                            @if ($product->clasificacion == 'muestra')
                                <span class="badge bg-warning position-absolute top-2 start-2 px-2 py-1"
                                    style="z-index: 20;font-size: 20px;">MUESTRA</span>
                            @endif

                            {{-- Badge Descuento --}}
                            @if ($product->descuento)
                                <span class="badge bg-success position-absolute top-2 end-2 px-2 py-1"
                                    style="z-index: 20; font-size: 20px;">{{ $product->descuento }}%
                                    DCTO</span>
                            @endif
                            <img class="img-1 product-image" src="{{ Storage::url($product->imagenuno_path) }}"
                                alt="{{ $product->name }}" style="width: 100%; max-width: 250px; max-height: 250px; object-fit: contain; display: block; margin: 0 auto;">
                            @if ($product->imagendos_path)
                                <img class="img-2 product-image" src="{{ Storage::url($product->imagendos_path) }}"
                                    alt="{{ $product->name }}" style="width: 100%; max-width: 250px; max-height: 250px; object-fit: contain; display: block; margin: 0 auto;">
                            @else
                                <img class="img-2 product-image" src="{{ Storage::url($product->imagenuno_path) }}"
                                    alt="{{ $product->name }}" style="width: 100%; max-width: 250px; max-height: 250px; object-fit: contain; display: block; margin: 0 auto;">
                            @endif

                            <!-- Overlay -->
                            <div class="overlay">
                                <div class="position-bottom">
                                    <div class="inn">
                                        <!-- Agregar al carrito -->
                                        <a data-toggle="tooltip" data-placement="top"
                                            href="{{ route('product_show', ['id' => $product->id]) }}">
                                            <i class="icon-basket"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item Name -->
                        <div class="item-name">
                            <a href="#">{{ $product->nombre }}</a>
                        </div>

                        <!-- Precio del Producto -->
                        <div class="product-pricing mt-3">

                            @if ($product->clasificacion == 'venta')
                                <div class="d-flex align-items-center mb-2">
                                    <i class="bi bi-tag-fill text-primary me-2" title="Precio normal"></i>
                                    <span class="text-muted">Precio normal:</span>
                                    <span class="fw-bold ms-2 text-dark">${{ number_format($product->valor, 2) }}</span>
                                </div>

                                @if ($product->valormembresia)
                                    <div class="d-flex align-items-center mb-2">
                                        <i class="bi bi-star-fill text-warning me-2" title="Precio con membresía"></i>
                                        <span class="text-muted">Con Membresía:</span>
                                        <span
                                            class="fw-bold ms-2 text-success">${{ number_format($product->valormembresia, 2) }}</span>
                                    </div>
                                @endif
                            @elseif ($product->clasificacion == 'muestra')
                                @if ($product->valor)
                                    <div class="mb-2 text-center">
                                        <i class="bi bi-box-seam text-info me-2" title="Precio base"></i>
                                        <span class="text-muted"><b>Precio:</b></span>
                                        <span
                                            class="fw-bold ms-2 text-dark">${{ number_format($product->valor, 2) }}</span>
                                    </div>
                                @endif

                                @if ($product->valormembresia)
                                    <div class="mb-2 text-center">
                                        <i class="bi bi-star text-warning me-2" title="Con membresía"></i>
                                        <span class="text-muted"><b>Con Membresía:</b></span>
                                        <span
                                            class="fw-bold ms-2 text-success">${{ number_format($product->valormembresia, 2) }}</span>
                                    </div>
                                @endif
                            @endif

                        </div>

                    </div>
                @endforeach
            </div>
            <div class="text-center margin-top-30"> <a href="/dashboard" class="btn btn-light margin-right-20">Ver todos
                    los
                    productos</a> </div>
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
@section('scripts')
    <script>
        $(document).ready(function() {
            $(".categories-carousel").owlCarousel({
                loop: true,
                margin: 15,
                nav: true, // flechas
                dots: false, // desactiva puntos
                center: true, // 🔹 mantiene centrado el carrusel
                autoplay: true,
                autoplayTimeout: 3000,
                autoplayHoverPause: true, // pausa si el usuario pasa el mouse
                responsive: {
                    0: {
                        items: 2
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    },
                    1400: {
                        items: 8
                    }
                }
            });
        });
    </script>
@endsection
