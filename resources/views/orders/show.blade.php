@extends('layouts.layoutWeb')
@section('title')
    Pedidos
@endsection
@section('content')
    <div class="container">
        <h3>Pedido {{ $order->reference }}</h3>
        <p>Estado: <strong>{{ ucfirst($order->status) }}</strong></p>
        <p>Creado: {{ $order->created_at->format('Y-m-d H:i') }}</p>


        <h5>Items</h5>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ number_format($item->price, 2) }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ number_format($item->total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        <div class="mt-3">
            <p>Subtotal: {{ number_format($order->subtotal, 2) }}</p>
            <p>Iva: {{ number_format($order->iva, 2) }}</p>
            <p>Envio: {{ number_format($order->shipping, 2) }}</p>
            <h4>Total: {{ number_format($order->total, 2) }}</h4>
        </div>
    </div>
@endsection
