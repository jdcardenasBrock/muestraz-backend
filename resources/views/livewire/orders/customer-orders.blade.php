<div class="container py-4">

    <h2 class="mb-4 fw-bold">📦 Mis pedidos</h2>

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

    @forelse ($orders as $order)

        <div class="card border-0 shadow-sm mb-4 rounded-3">
            <div class="card-body">

                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h5 class="fw-bold mb-1">Orden #{{ $order->payu_reference }}</h5>
                        <small class="text-muted">
                            🗓 Fecha de compra: {{ $order->created_at->format('d/m/Y H:i A') }}
                        </small>
                    </div>

                    <span class="badge bg-{{ $statusColors[$order->status] ?? 'secondary' }} px-3 py-2">
                        {{ ucfirst($order->status) }}
                    </span>
                </div>

                <hr>

                {{-- Resumen de ítems --}}
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

                {{-- Totales --}}
                <div class="d-flex justify-content-between">
                    <span class="fw-bold">Total pagado:</span>
                    <span class="fw-bold text-success"><strong> ${{ number_format($order->total, 2) }}</strong></span>
                </div>

                {{-- Opciones --}}
                <div class="mt-3 text-end">
                    <a href="{{ route('orders.show', $order->id) }}" class="btn btn-outline-primary btn-sm">
                        Ver detalles
                    </a>
                </div>

            </div>
        </div>

    @empty

        <div class="alert alert-info">
            No tienes pedidos todavía.
        </div>

    @endforelse
</div>
