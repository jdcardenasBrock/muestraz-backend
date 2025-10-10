<div>
    <h3 class="mb-3">Mis pedidos</h3>


    @if ($orders->count())
        <div class="list-group">
            @foreach ($orders as $order)
                <div class="list-group-item">
                    <div class="d-flex justify-content-between">
                        <div>
                            <strong>Ref:</strong> {{ $order->reference }} <br>
                            <small>{{ $order->created_at->format('Y-m-d H:i') }}</small>
                        </div>
                        <div class="text-end">
                            <span class="badge bg-secondary">{{ ucfirst($order->status) }}</span>
                            <div>
                                <a href="{{ route('orders.show', $order) }}" class="btn btn-sm btn-link">Ver</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>


        <div class="mt-3">{{ $orders->links() }}</div>
    @else
        <div class="alert alert-info">Aún no tienes pedidos.</div>
    @endif
</div>
