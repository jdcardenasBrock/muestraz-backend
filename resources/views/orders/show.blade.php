@extends('layouts.layoutWeb')

@section('title', 'Detalle del Pedido')

@section('content')
<div class="container py-4">

    <!-- ENCABEZADO -->
    <div class="d-flex justify-content-between align-items-center m-4">
        <div>
            <h2 class="fw-bold mb-1">Detalle del Pedido</h2>
            <div class="text-muted">Referencia: <strong>{{ $order->payu_reference }}</strong></div>
            <div class="text-muted">Fecha: <strong>{{ $order->created_at->format('d/m/Y H:i') }}</strong></div>
        </div>
        <span class="badge rounded-pill 
            @if($order->status == 'paid') bg-success 
            @elseif($order->status == 'pending') bg-warning 
            @elseif($order->status == 'shipped') bg-primary 
            @else bg-secondary @endif
            fs-6 px-3 py-2">
            {{ ucfirst($order->status) }}
        </span>
    </div>

    <!-- TIMELINE DE ESTADOS -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Estado del Pedido</h5>
            <div class="d-flex align-items-center justify-content-between">
                <div class="timeline-step {{ in_array($order->status, ['paid','shipped','delivered']) ? 'completed' : '' }}">
                    <div class="circle"></div>
                    <span>Pagado</span>
                </div>
                <div class="timeline-line"></div>
                <div class="timeline-step {{ in_array($order->status, ['shipped','delivered']) ? 'completed' : '' }}">
                    <div class="circle"></div>
                    <span>Enviado</span>
                </div>
                <div class="timeline-line"></div>
                <div class="timeline-step {{ $order->status == 'delivered' ? 'completed' : '' }}">
                    <div class="circle"></div>
                    <span>Entregado</span>
                </div>
            </div>
        </div>
    </div>

    <!-- PRODUCTOS -->
    <div class="card mb-4 shadow-sm border-0">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Productos del Pedido</h5>
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>Producto</th>
                            <th>Clasificación</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-end">Precio</th>
                            <th class="text-end">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order->items as $item)
                            <tr>
                                <td class="d-flex align-items-center gap-2">
                                    <img class="product-image rounded" src="{{ Storage::url($item->product->imagenuno_path) }}"
                                         alt="{{ $item->product_name }}" style="width: 50px; height:50px; object-fit: cover;">
                                    <div class="fw-semibold">{{ $item->product_name }}</div>
                                </td>
                                <td>
                                    @if($item->product->clasificacion === 'muestra')
                                        <span>Muestra</span>
                                    @else
                                        <span>Producto de Venta</span>
                                    @endif
                                </td>
                                <td class="text-center">{{ $item->quantity }}</td>
                                <td class="text-end">${{ number_format($item->price, 0, ',', '.') }}</td>
                                <td class="text-end fw-bold">${{ number_format($item->price * $item->quantity, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- RESUMEN DE COSTOS -->
    <div class="card shadow-sm border-0 mb-4">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Resumen del Pedido</h5>
            <div class="d-flex justify-content-between mb-2"><span class="text-muted">Subtotal</span><strong>${{ number_format($order->subtotal, 0, ',', '.') }}</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="text-muted">IVA</span><strong>${{ number_format($order->iva, 0, ',', '.') }}</strong></div>
            <div class="d-flex justify-content-between mb-2"><span class="text-muted">Envío</span><strong>${{ number_format($order->shipping_cost, 0, ',', '.') }}</strong></div>
            <hr>
            <div class="d-flex justify-content-between fs-5"><span class="fw-bold">Total pagado</span><span class="fw-bold text-success">${{ number_format($order->total, 0, ',', '.') }}</span></div>
        </div>
    </div>

    <!-- INFORMACION ADICIONAL -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h5 class="fw-bold mb-3">Información del Cliente</h5>
            <p class="mb-1"><strong>Nombre:</strong> {{ $order->customer_name }}</p>
            <p class="mb-1"><strong>Email:</strong> {{ $order->customer_email }}</p>
            <p class="mb-1"><strong>Teléfono:</strong> {{ $order->customer_phone }}</p>
            <hr>
            <h6 class="fw-bold">Dirección de envío</h6>
            <p class="mb-0">{{ $order->shipping_address }}</p>
        </div>
    </div>

</div>

<style>
/* Timeline */
.timeline-step { text-align:center; width:33%; position:relative; }
.timeline-step .circle { width:20px; height:20px; border-radius:50%; border:3px solid #d1d5db; margin:0 auto 5px; background:#fff; }
.timeline-step.completed .circle { border-color:#198754; background:#198754; }
.timeline-line { flex-grow:1; height:3px; background:#d1d5db; }
/* Espaciado general */
.container { max-width: 1000px; }
/* Imagenes de productos */
.product-image { border-radius:10%; }
/* Hover table */
.table-hover tbody tr:hover { background-color: #f8f9fa; }
/* Badges de estado */
.badge { font-size:0.9rem; }
</style>
@endsection
