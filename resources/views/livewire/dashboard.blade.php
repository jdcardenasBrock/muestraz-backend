<div>
    <div class="container-fluid py-4">

        <!-- KPI cards -->
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="card shadow-sm rounded-4 p-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="text-muted small">Pedidos totales</div>
                            <div class="fs-4 fw-bold">{{ number_format($totalOrders) }}</div>
                        </div>
                        <div class="text-end">
                            <div class="text-muted small">Ingresos</div>
                            <div class="fs-5 fw-semibold text-success">${{ number_format($totalRevenue, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                    <div id="mini-1" data-colors='["--bs-primary"]' class="mt-3"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm rounded-4 p-3">
                    <div class="text-muted small">Productos</div>
                    <div class="fs-4 fw-bold">{{ $totalProducts }}</div>
                    <div class="text-muted small mt-2">Stock bajos: <strong
                            class="text-danger">{{ $lowStockCount }}</strong></div>
                    <div id="mini-2" data-colors='["--bs-success"]' class="mt-3"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm rounded-4 p-3">
                    <div class="text-muted small">Ítems vendidos</div>
                    <div class="fs-4 fw-bold">{{ $soldItemsCount }}</div>
                    <div class="text-muted small mt-2">Últimos {{ $lastMonths }} meses</div>
                    <div id="mini-3" data-colors='["--bs-info"]' class="mt-3"></div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card shadow-sm rounded-4 p-3">
                    <div class="text-muted small">Clientes Top</div>
                    <div class="fs-4 fw-bold">{{ count($topCustomers) }}</div>
                    <div class="text-muted small mt-2">Compradores frecuentes</div>
                    <div id="mini-4" data-colors='["--bs-warning"]' class="mt-3"></div>
                </div>
            </div>
        </div>

        <!-- Charts + lists -->
        <div class="row g-4">
            <!-- Left: big sales chart -->
            <div class="col-lg-8">
                <div class="card rounded-4 shadow-sm p-3">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Ventas - últimos {{ $lastMonths }} meses</h5>
                        <div class="text-muted small">Resumen</div>
                    </div>

                    <div id="overview" data-colors='["--bs-primary"]' data-series='{{ $overviewSeriesJson }}'
                        data-labels='{{ $overviewLabelsJson }}' style="height:340px;"></div>
                </div>

                <div class="card rounded-4 shadow-sm p-3 mt-3">
                    <h6 class="mb-3">Categorías (por unidades vendidas)</h6>
                    <div id="saleing-categories"
                        data-colors='["--bs-success","--bs-info","--bs-warning","--bs-secondary"]'
                        data-series='{{ json_encode(array_column($salesByCategory, 'value')) }}'
                        data-labels='{{ json_encode(array_column($salesByCategory, 'label')) }}' style="height:320px;">
                    </div>
                </div>

            </div>

            <!-- Right: top products + customers -->
            <div class="col-lg-4">
                <div class="card rounded-4 shadow-sm p-3 mb-3">
                    <h6 class="mb-3">Top productos</h6>
                    <div class="list-group">
                        @foreach ($topProducts as $p)
                            <div class="list-group-item d-flex align-items-center border-0 px-0 py-2">
                                <img src="{{ $p['imagenuno_path'] }}" alt=""
                                    style="width:64px;height:64px;object-fit:cover;border-radius:8px;margin-right:12px;">
                                <div class="flex-grow-1">
                                    <div class="fw-bold">{{ $p['nombre'] }}</div>
                                    <small class="text-muted">Vendidos: {{ $p['sold'] }} • Stock:
                                        {{ $p['cantidadinventario'] }}</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-semibold">{{ $p['sold'] }}</div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="card rounded-4 shadow-sm p-3">
                    <h6 class="mb-3">Top clientes</h6>
                    <ul class="list-unstyled mb-0">
                        @foreach ($topCustomers as $c)
                            <li class="d-flex align-items-center mb-2">
                                <div class="flex-grow-1">
                                    <div class="fw-semibold">{{ $c['name'] }}</div>
                                    <small class="text-muted">{{ $c['email'] }}</small>
                                </div>
                                <div class="text-end">
                                    <div class="fw-semibold">${{ number_format($c['spent'], 0, ',', '.') }}</div>
                                    <small class="text-muted d-block">{{ $c['orders'] }} pedidos</small>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

        <!-- Recent orders table -->
        <div class="card rounded-4 shadow-sm mt-4">
            <div class="card-header bg-white">
                <h6 class="mb-0">Últimas órdenes</h6>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>Total</th>
                                <th>Estado</th>
                                <th>Fecha</th>
                                <th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $recent = \App\Models\Order::latest()->limit(8)->get();
                            @endphp
                            @foreach ($recent as $r)
                                <tr>
                                    <td>#{{ $r->id }}</td>
                                    <td>{{ $r->customer_name }}</td>
                                    <td>${{ number_format($r->total, 0, ',', '.') }}</td>
                                    <td>
                                        <span
                                            style="display:inline-flex;align-items:center;gap:8px;padding:6px 12px;border-radius:10px;background:#f3f4f6;border:1px solid #e4e6eb;font-weight:600;font-size:.85rem;">
                                            {{ ucfirst($r->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $r->created_at->format('Y-m-d') }}</td>
                                    <td class="text-end">
                                        <button wire:click="$emit('openOrderDetail', {{ $r->id }})"
                                            class="btn btn-sm btn-outline-primary">Ver</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Agregamos pequeños scripts para pasar datos a tus charts existentes. -->
    <script>
        document.addEventListener('livewire:load', function() {
            // Pegar aquí el javascript que ya tienes, pero reemplazar la serie estática por data attributes
            // Mini charts: rellenamos con datos generados por Livewire
            try {
                // mini charts: orders_last_11_days
                const mini1Data = @json($miniSparklines['orders_last_11_days'] ?? []);
                if (document.querySelector('#mini-1')) {
                    // usamos tu configuración (ajusta según tu script)
                    var barchartColors = getChartColorsArray("mini-1");
                    var sparklineoptions1 = {
                        series: [{
                            data: mini1Data
                        }],
                        chart: {
                            type: 'area',
                            width: 110,
                            height: 35,
                            sparkline: {
                                enabled: true
                            }
                        },
                        fill: {
                            type: 'gradient',
                            gradient: {
                                shadeIntensity: 1,
                                inverseColors: false,
                                opacityFrom: 0.45,
                                opacityTo: 0.05,
                                stops: [20, 100, 100, 100]
                            }
                        },
                        stroke: {
                            curve: 'smooth',
                            width: 2
                        },
                        colors: barchartColors,
                        tooltip: {
                            fixed: {
                                enabled: false
                            },
                            x: {
                                show: false
                            },
                            marker: {
                                show: false
                            }
                        }
                    };
                    new ApexCharts(document.querySelector("#mini-1"), sparklineoptions1).render();
                }

                // mini-2, mini-3, mini-4 use same or different arrays if you want
                // Overview (big chart)
                if (document.querySelector('#overview')) {
                    var ovSeries = JSON.parse(document.querySelector('#overview').getAttribute('data-series'));
                    var ovLabels = JSON.parse(document.querySelector('#overview').getAttribute('data-labels'));
                    var barchartColors = getChartColorsArray("overview");
                    var options = {
                        series: [{
                            data: ovSeries
                        }],
                        chart: {
                            toolbar: {
                                show: false
                            },
                            height: 340,
                            type: 'bar'
                        },
                        plotOptions: {
                            bar: {
                                columnWidth: '70%',
                                borderRadius: 6
                            }
                        },
                        xaxis: {
                            categories: ovLabels
                        },
                        colors: barchartColors,
                        dataLabels: {
                            enabled: false
                        },
                        legend: {
                            show: false
                        }
                    };
                    new ApexCharts(document.querySelector("#overview"), options).render();
                }

                // saleing-categories donut
                if (document.querySelector('#saleing-categories')) {
                    var el = document.querySelector('#saleing-categories');
                    var series = JSON.parse(el.getAttribute('data-series') || '[]');
                    var labels = JSON.parse(el.getAttribute('data-labels') || '[]');
                    var colors = getChartColorsArray("saleing-categories");
                    var options = {
                        chart: {
                            type: 'donut',
                            height: 320
                        },
                        series: series,
                        labels: labels,
                        colors: colors,
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: '72%'
                                }
                            }
                        },
                        dataLabels: {
                            enabled: true
                        }
                    };
                    new ApexCharts(el, options).render();
                }

            } catch (e) {
                console.error('Dashboard charts error', e);
            }

            // escuchar refresco si lo emites
            Livewire.on('dashboard-refreshed', () => {
                // opcional: recargar la página o re-renderizar gráficos (implementar)
                window.location.reload();
            });

        });
    </script>

</div>
