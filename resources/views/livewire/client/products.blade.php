<div>
    <style>
        .item {
            border-radius: 16px;
            /* redondeo general */
            overflow: hidden;
            background: #fff;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
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
            margin-top: 8px;
            padding: 6px 12px;
            border-radius: 20px;
            background: #FFCC33;
            color: #000000;
            font-size: 1.00rem;
            transition: background 0.2s ease;
        }

        .badge {
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
    </style>
    <div id="products" class="arrival-block col-item-4 list-group">
        <div class="row">
            @livewire('client.product-modal')
            @foreach ($products as $product)
                <div class="item">
                    @if ($product->solomembresia)
                        <div class="badge">🔒 SOLO CON MEMBRESÍA</div>
                    @endif
                    <div class="img-ser">
                        <div class="thumb">
                            <img class="img-1" src="{{ Storage::url($product->imagenuno_path) }}"
                                alt="{{ $product->name }}">

                            @if ($product->imagendos_path)
                                <img class="img-2" src="{{ Storage::url($product->imagendos_path) }}"
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
                                <a href="#." class="i-tittle">{{ $product->nombre }}</a>
                                <small class="price">COP $
                                    {{ number_format($product->valor, 2) }}</small>
                            </div>
                            @if ($product->solomembresia)
                                <button class="locked">🔒 Hazte miembro para acceder</button>
                            @else
                                <a class="detail_card" href="#">Descubre más</a>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>
