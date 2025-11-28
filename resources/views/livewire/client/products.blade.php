<div>
    <style>
        .responsive-text {
            display: -webkit-box;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        /* En celular: mostrar 3 líneas */
        @media (max-width: 768px) {
            .responsive-text {
                -webkit-line-clamp: 3;
            }
        }

        /* En tableta: mostrar 6 líneas */
        @media (min-width: 769px) and (max-width: 1024px) {
            .responsive-text {
                -webkit-line-clamp: 6;
            }
        }

        /* En laptop o escritorio: mostrar todo */
        @media (min-width: 1025px) {
            .responsive-text {
                -webkit-line-clamp: unset;
            }
        }

        .item {
            border-radius: 16px;
            /* redondeo general */
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
            position: relative;
        }

        .item:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.12);
        }

        .img-ser .thumb img {
            border-radius: 12px;
            max-height: 380px;
            /* más pequeña */
            object-fit: cover;
            /* evita que se deforme */
            width: 100%;
            transition: transform 0.3s ease;
        }

        .img-ser .thumb:hover img {
            transform: scale(1.05);
        }

        .item-card {
            padding: 12px;
            text-align: center;
            background-color: #f5f5f5;
        }

        .item-card .i-tittle {
            font-size: 1rem;
            font-weight: 600;
            color: #333333;
            display: block;
            margin-bottom: 6px;
            text-align: start;
        }

        .item-card .price {
            color: #444444;
            font-weight: 700;
            font-size: 0.9rem;
            text-align: start;
        }

        .detail_card {
            display: inline-block;
            margin: 8px;
            padding: 6px 12px;
            border-radius: 20px;
            background: #FFCC33;
            color: #000000;
            font-size: 0.90rem;
            transition: background 0.2s ease;
            float: right;
            bottom: 0;
        }


        .locked {
            background: #e0e0e0;
            color: #444444;
            border: none;
            border-radius: 5px;
            padding: 8px 12px;
            cursor: not-allowed;
            font-weight: bold;
            margin-top: 8px;
        }

        .badges {
            background: #4A4A4A;
            color: white;
            font-size: 13px;
            padding: 6px 8px;
            position: absolute;
            top: 8px;
            left: 20px;
            border-radius: 3px;
            z-index: 2;
        }

        .badge-muestra {
            position: absolute !important;
            bottom: 0;
            left: 0;
            width: 70px !important;
            z-index: 5 !important;
            background: transparent !important;
            pointer-events: none !important;
        }
    </style>
    <div id="products" class="arrival-block col-item-4 list-group">
        <div class="row">
            @livewire('client.product-modal')
            @foreach ($products as $product)
                @if ($product->estado == '1' && $product->cantidadinventario >= 0)
                    <!-- Para filtar solo los activos y con cantidad mayor a 0 -->

                    <div class="item">
                        @if ($product->clasificacion == 'muestra')
                            <img src="{{ asset('web/images/muestra.png') }}" alt="Muestra" class="badge-muestra">
                        @endif

                        <div class="img-ser">
                            <div class="thumb">

                                @if ($product->descuento)
                                    <span class="badges bg-success ms-1">{{ $product->descuento }}% DCTO</span>
                                @endif
                                <img class="img-1" src="{{ Storage::url($product->imagenuno_path) }}"
                                    alt="{{ $product->name }}">

                                @if ($product->imagendos_path)
                                    <img class="img-2" src="{{ Storage::url($product->imagendos_path) }}"
                                        alt="{{ $product->name }}">
                                @else
                                    <img class="img-2" src="{{ Storage::url($product->imagenuno_path) }}"
                                        alt="{{ $product->name }}">
                                @endif


                                <div class="overlay">
                                    <div class="position-center-center">
                                        <!-- Clic aquí para abrir el modal -->
                                        <a href="javascript:void(0);" wire:click="testEmit({{ $product->id }})">
                                            <i class="icon-eye"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="item-card">
                                <div class="item-info">
                                    @php
                                        $spanVlrNormal = '';
                                        $dctoProducto = 0;
                                    @endphp
                                    <a href="{{ route('product_show', ['id' => $product->id]) }}"
                                        class="i-tittle font-semibold block mb-1"
                                        style="font-size:15px !important; text-align:center">
                                        {{ $product->nombre }}
                                    </a>
                                    @php
                                        $valorProducto = (float) $product->valor;
                                    @endphp
                                    @if ($valorProducto > 0)
                                        @if ($product->valormembresia)
                                            @php
                                                $spanVlrNormal = 'font-size: 13px !important;';
                                            @endphp
                                        @endif
                                        <small class="price text-dark font-semibold mt-1" style="{{ $spanVlrNormal }}">
                                            Precio Normal: ${{ number_format($valorProducto, 2) }}
                                        </small>
                                    @endif
                                    {{-- Precio con membresía si aplica --}}
                                    @if ($product->valormembresia)
                                        <small class="price text-dark font-semibold mt-1"
                                            style="color: #558b18 !important; font-size:14px !important;">
                                            {{-- <img src="{{ asset('web/images/membresia.png') }}" alt="Muestra"
                                                    class="img" style="width: 30px;margin-right: 5px;"> --}}
                                            Con Membresia: ${{ number_format($product->valormembresia, 2) }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                            @if ($product->solomembresia)
                                <button class="locked">🔒 Hazte miembro para acceder</button>
                            @else
                                <a class="detail_card" href="{{ route('product_show', ['id' => $product->id]) }}">Ver Producto ➡️</a>
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
