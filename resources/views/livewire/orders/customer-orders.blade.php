<div>
    <div class="container" style="max-width: 100%; padding:0 !important">
        <div class="rounded-pill shadow-sm mx-auto position-relative overflow-hidden"
            style="background: linear-gradient(135deg, #1b1d20f2, #1e1e1e);
                padding: 25px 65px;
                color: white;
                text-align: center;
                font-weight: bold;
                font-size: 1.6rem;">

            <!-- Ícono gigante de fondo -->

            📦 Mis pedidos 
        </div>
    </div>

    <!-- CONTENEDOR SOBREPUESTO -->
    <div class="container" style="max-width: 100%; margin-top: 40px; position: relative; z-index: 10;">

        @forelse ($orders as $order)
            <div class="mx-auto" style="max-width: 760px;"> <!-- ACHICA EL CARD -->
                <div class="card mb-4 rounded-4 shadow-sm"
                    style="
                    border: 1px solid #d4d4d4;
                    background: #f9f9f9;
                    padding: 5px 2px;
                 ">
                    <div class="card-body px-4 py-3"> <!-- PADDING FINO Y ELEGANTE -->


                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h5 class="fw-bold mb-1">Orden #{{ $order->id }}</h5>
                                <small class="text-muted" style="font-size: 14px">
                                    <b>🗓 Fecha de compra: {{ $order->created_at->format('d/m/Y H:i A') }}</b>
                                </small>
                            </div>
                            @php
                                $statusColors = [
                                    'pending' => 'warning',
                                    'paid' => 'primary',
                                    'processing' => 'info',
                                    'shipped' => 'secondary',
                                    'delivered' => 'success',
                                    'cancelled' => 'danger',
                                    'refunded' => 'dark',
                                ];
                            @endphp
                            <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }} px-3 py-2">
                                {{ ucfirst($order->status) }}
                            </span>
                        </div>

                        <hr>
                        @if ($order->type == 'membership')
                            <div class="mb-3 d-flex align-items-start" style="gap: 15px;">
                                @php
                                    $member = App\Models\MembershipType::find($order->membership_id);
                                @endphp

                                <!-- Imagen -->
                                <div style="width: 80px; flex-shrink: 0;">
                                    <img src="{{ Storage::url($member->image_path) }}"
                                        alt="Membresía {{ $member->type }}" class="img-fluid rounded shadow-sm">
                                </div>

                                <!-- Información de la membresía -->
                                <div class="flex-grow-1">

                                    <h6 class="fw-bold mb-1 "><u>{{ $member->type }} </u></h6>

                                    <div class="">
                                        <div><b>Cantidad de muestras: {{ $member->quantitysamples }}</div></b>
                                        <div><b>Meses de suscripción: {{ $member->quantitymonths }}</div></b>
                                        <div><b>Numero de Referencia: {{ $order->payu_reference }}</div></b>
                                    </div>

                                </div>
                            </div>
                        @else
                            <div class="mb-3">
                                @foreach ($order->items as $item)
                                    <div class="d-flex justify-content-between border-bottom py-2">
                                        <div>
                                            <span class="fw-semibold">{{ $item->product_name }}</span><br>
                                            <small class="text-muted">Cantidad: {{ $item->quantity }}</small>
                                        </div>

                                        <strong>${{ number_format($item->price, 2) }}</strong>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                        {{-- Resumen de ítems --}}

                        {{-- Totales --}}
                        <div class="d-flex justify-content-end">
                            <span class="fw-bold pr-2"><b>Total pagado:</b></span>
                            <span class="fw-bold text-success"><strong>
                                    ${{ number_format($order->total, 2) }}</strong></span>
                        </div>

                        {{-- Opciones --}}
                        @if ($order->type != 'membership')
                            <div class="mt-3 text-end">
                                <a href="{{ route('orders.show', $order->id) }}"
                                    class="btn btn-outline-primary btn-sm">
                                    Ver detalles
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <style>
                .no-orders-container {
                    text-align: center;
                    padding: 40px 20px;
                }

                .no-orders-image {
                    width: 100%;
                    max-width: 500px;
                    height: auto;
                    margin: 0 auto;
                    display: block;
                }

                .no-orders-text h3 {
                    font-size: 26px;
                    margin-top: 20px;
                    font-weight: 600;
                    color: #222;
                }

                .no-orders-text p {
                    font-size: 16px;
                    color: #555;
                    margin-top: 10px;
                }

                .no-orders-link {
                    font-weight: 600;
                    color: #007bff;
                    text-decoration: none;
                }

                .no-orders-link:hover {
                    text-decoration: underline;
                }
            </style>
            <div class="no-orders-container">
                <img src="{{ asset('web/img/sin-pedidos.png') }}" class="no-orders-image">
                <div class="no-orders-text">
                    <p>
                        Explora nuestro catálogo y descubre productos increíbles.
                        <a href="{{ route('dashboard') }}" class="no-orders-link">Haz tu primera compra aquí</a>.
                    </p>
                </div>
            </div>

        @endforelse
    </div>
</div>
