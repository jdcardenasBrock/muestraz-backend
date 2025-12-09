<div>
    <div class="container-fluid py-4">
        @if (!$viewDetail)
            <!-- FILTROS -->
            <div class="card shadow-sm rounded-4 mb-4 border-0  ">
                <div class="card-body py-3">

                    <div class="row g-3">

                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Buscar</label>
                            <input type="text" wire:model.live="search" class="form-control form-control-sm shadow-sm"
                                placeholder="Cliente, email, referencia...">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Estado</label>
                            <select wire:model.live="statusFilter" class="form-select form-select-sm shadow-sm">
                                <option value="">Todos</option>
                                <option value="pending">Pendiente</option>
                                <option value="paid">Pagado</option>
                                <option value="processing">En proceso</option>
                                <option value="shipped">Enviado</option>
                                <option value="delivered">Entregado</option>
                                <option value="cancelled">Cancelado</option>
                                <option value="refunded">Reembolsado</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Desde</label>
                            <input type="date" wire:model.live="dateFrom"
                                class="form-control form-control-sm shadow-sm">
                        </div>

                        <div class="col-md-2">
                            <label class="form-label fw-semibold">Hasta</label>
                            <input type="date" wire:model.live="dateTo"
                                class="form-control form-control-sm shadow-sm">
                        </div>

                        <div class="col-md-3 d-flex align-items-end">
                            <button wire:click="exportExcel" class="btn btn-success btn-sm w-100 shadow-sm fw-semibold">
                                📤 Exportar Excel
                            </button>
                        </div>

                    </div>

                </div>
            </div>

            <div class="row g-4">

                <!-- LISTADO DE PEDIDOS -->
                <div class="col-lg-8">
                    <div class="card shadow-sm rounded-4 border-0 h-100">

                        <div class="card-header bg-secondary text-white rounded-top-4 py-3">
                            <h5 class="mb-0 fw-semibold text-white">Listado de Pedidos</h5>
                        </div>

                        <div class="card-body p-0">

                            <table class="table table-hover mb-0 align-middle">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Cliente</th>
                                        <th>Total</th>
                                        <th>Estado</th>
                                        <th class="text-end">Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @forelse ($orders as $order)
                                        <tr>
                                            <td class="fw-bold">#{{ $order->id }}</td>

                                            <td>
                                                <div class="fw-semibold">{{ $order->customer_name }}</div>
                                                <small class="text-muted">{{ $order->customer_email }}</small>
                                                <br>
                                                <span class="badge bg-warning text-uppercase px-3">

                                                    @if ($order->type == 'membership')
                                                        Membresia
                                                    @elseif($order->type == 'product')
                                                        Producto
                                                    @endif
                                                </span>
                                            </td>

                                            <td class="fw-semibold">${{ number_format($order->total, 0) }}</td>

                                            <td>
                                                <span style="{{ $this->badgeStyle($order->status) }}">
                                                    <span style="font-size: .95rem; line-height:1;">
                                                        {{ $this->badgeIcon($order->status) }}
                                                    </span>

                                                    <span style="letter-spacing:.02em; margin-left:2px;">
                                                        {{ $this->statusLabel($order->status) }}
                                                    </span>
                                                </span>
                                            </td>
                                            <td class="text-end">
                                                <button class="btn btn-info btn-sm shadow-sm px-3"
                                                    wire:click="selectOrder({{ $order->id }})">
                                                    Gestionar
                                                </button>
                                                <button class="btn btn-sm btn-outline-secondary px-3 mt-2"
                                                    wire:click="showDetails({{ $order->id }})">
                                                    Ver info
                                                </button>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-4 text-muted">
                                                No se encontraron pedidos
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="px-3 py-3">
                                {{ $orders->links() }}
                            </div>

                        </div>
                    </div>
                </div>

                <!-- PANEL DETALLE -->
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-4 border-0 h-100">

                        @if ($selectedOrder)
                            <div class="card-header bg-dark text-white rounded-top-4 py-3">
                                <h5 class="mb-0 fw-semibold text-white">Detalles del Pedido #{{ $selectedOrder->id }}
                                </h5>
                            </div>

                            <div class="card-body">

                                <h6 class="fw-bold mb-2">Cambiar Estado</h6>

                                <select wire:model.live="newStatus" class="form-select form-select-sm mb-3 shadow-sm">
                                    <option value="pending">Pendiente</option>
                                    <option value="paid">Pagado</option>
                                    <option value="processing">En proceso</option>
                                    <option value="shipped">Enviado</option>
                                    <option value="delivered">Entregado</option>
                                    <option value="cancelled">Cancelado</option>
                                    <option value="refunded">Reembolsado</option>
                                </select>

                                <h6 class="fw-bold mb-2">Comentario interno</h6>

                                <textarea wire:model.live="comment" class="form-control form-control-sm shadow-sm mb-3" rows="3"
                                    placeholder="Notas internas…"></textarea>

                                <button class="btn btn-success w-100 fw-semibold shadow-sm py-2"
                                    wire:click="updateStatus">
                                    Actualizar Estado
                                </button>

                            </div>
                        @else
                            <div class="card-body text-center py-5 text-muted">
                                Selecciona un pedido para verlo aquí.
                            </div>
                        @endif

                    </div>
                </div>

            </div>
        @endif
        <!-- PANEL DE DETALLE COMPLETO DE LA ORDEN -->
        @if ($viewDetail && $selectedOrder)
            <div class="col-12 mt-4">
                <div class="card border-0 shadow-lg rounded-4">
                    <div class="card-header bg-dark text-white rounded-top-4 d-flex justify-content-between">
                        <h5 class="mb-0 text-white">Detalle del Pedido #{{ $selectedOrder->id }}</h5>
                        <button class="btn btn-sm btn-light" wire:click="closeDetails">Volver al Listado</button>
                    </div>

                    <div class="card-body">

                        <!-- INFORMACIÓN DEL CLIENTE -->
                        <h5 class="fw-bold mb-3">👤 Información del Cliente</h5>
                        <div class="row">
                            <div class="col-md-4"><strong>Nombre:</strong><br>{{ $selectedOrder->customer_name }}</div>
                            <div class="col-md-4"><strong>Email:</strong><br>{{ $selectedOrder->customer_email }}</div>
                            <div class="col-md-4"><strong>Teléfono:</strong><br>{{ $selectedOrder->customer_phone }}
                            </div>
                        </div>

                        <hr>

                        <!-- DIRECCIÓN DE ENVÍO -->
                        <h5 class="fw-bold mb-3">📦 Dirección de Envío</h5>
                        <p class="mb-1"><strong>Dirección:</strong> {{ $selectedOrder->shipping_address }}</p>
                        <p class="mb-1"><strong>Ciudad:</strong> {{ $selectedOrder->shipping_city }}</p>
                        <p class="mb-1"><strong>Departamento:</strong> {{ $selectedOrder->shipping_state }}</p>
                        <p class="mb-3"><strong>Código Postal:</strong> {{ $selectedOrder->shipping_postal_code }}
                        </p>

                        <hr>

                        <!-- INFORMACIÓN DEL PAGO -->
                        <h5 class="fw-bold mb-3">💳 Información de Pago</h5>

                        <div class="row">
                            <div class="col-md-4"><strong>Método:</strong><br>{{ $selectedOrder->payment_method }}
                            </div>
                            <div class="col-md-4"><strong>Referencia
                                    PayU:</strong><br>{{ $selectedOrder->payu_reference }}</div>
                            <div class="col-md-4"><strong>ID
                                    Transacción:</strong><br>{{ $selectedOrder->transaction_id }}</div>
                        </div>

                        <div class="row mt-3">
                            <div class="col-md-4"><strong>Estado:</strong><br>{{ ucfirst($selectedOrder->status) }}
                            </div>
                            <div class="col-md-4"><strong>Pagado en:</strong><br>{{ $selectedOrder->paid_at }}</div>
                            <div class="col-md-4"><strong>Cancelado en:</strong><br>{{ $selectedOrder->cancelled_at }}
                            </div>
                        </div>

                        @if ($selectedOrder->payment_status_detail)
                            <p class="mt-3"><strong>Detalle:</strong> {{ $selectedOrder->payment_status_detail }}
                            </p>
                        @endif

                        <hr>

                        <!-- ITEMS DE LA ORDEN -->
                        <h5 class="fw-bold mb-3">🛒 Productos Comprados</h5>

                        <div class="table-responsive">
                            <table class="table table-sm table-bordered align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cant.</th>
                                        <th>Precio</th>
                                        <th>IVA</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($selectedOrder->items as $item)
                                        <tr>
                                            <td>
                                                <strong>{{ $item->product_name }}</strong>
                                                @if ($item->meta)
                                                    <br><small
                                                        class="text-muted">{{ json_encode($item->meta) }}</small>
                                                @endif
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>${{ number_format($item->price, 0) }}</td>
                                            <td>${{ number_format($item->iva, 0) }}</td>
                                            <td><strong>${{ number_format($item->total, 0) }}</strong></td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <hr>

                        <!-- TOTALES -->
                        <h5 class="fw-bold mb-3">📊 Totales</h5>
                        <div class="row">
                            <div class="col-md-3">
                                <strong>Subtotal:</strong><br>${{ number_format($selectedOrder->subtotal, 0) }}
                            </div>
                            <div class="col-md-3">
                                <strong>IVA:</strong><br>${{ number_format($selectedOrder->iva, 0) }}
                            </div>
                            <div class="col-md-3">
                                <strong>Envío:</strong><br>${{ number_format($selectedOrder->shipping_cost, 0) }}
                            </div>
                            <div class="col-md-3">
                                <strong>Descuento:</strong><br>${{ number_format($selectedOrder->discount, 0) }}
                            </div>
                        </div>

                        <div class="mt-3">
                            <h4 class="fw-bold text-success">
                                Total: ${{ number_format($selectedOrder->total, 0) }}
                            </h4>
                        </div>

                        @if ($selectedOrder->notes)
                            <hr>
                            <h5 class="fw-bold">📝 Notas</h5>
                            <p>{{ $selectedOrder->notes }}</p>
                        @endif

                    </div>
                    <div class="d-flex justify-content-end mb-2">
                        <button class="btn btn-sm btn-light" wire:click="closeDetails">
                            Volver al Listado
                        </button>
                    </div>

                </div>
            </div>
        @endif

    </div>

</div>
