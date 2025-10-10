<div>
    <div class="d-flex mb-3 gap-2">
        <select wire:model="status" class="form-select" style="max-width:220px;">
            <option value="">Todos los estados</option>
            <option value="pending">Pendiente</option>
            <option value="approved">Aprobado</option>
            <option value="failed">Fallido</option>
            <option value="cancelled">Cancelado</option>
        </select>
    </div>


    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif


    <table class="table table-sm">
        <thead>
            <tr>
                <th>Ref</th>
                <th>Usuario</th>
                <th>Items</th>
                <th>Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->reference }}</td>
                    <td>{{ optional($order->user)->email }}</td>
                    <td>{{ $order->items->count() }}</td>
                    <td>{{ number_format($order->total, 2) }}</td>
                    <td>{{ ucfirst($order->status) }}</td>
                    <td>
                        <button wire:click="markAs({{ $order->id }}, 'approved')"
                            class="btn btn-sm btn-success">Aprobar</button>
                        <button wire:click="markAs({{ $order->id }}, 'cancelled')"
                            class="btn btn-sm btn-danger">Cancelar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <div>{{ $orders->links() }}</div>
</div>
