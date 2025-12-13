<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;

class Dashboard extends Component
{

    public int $lastMonths = 12; // para series mensuales
    public $from;
    public $to;

    public array $overviewSeries = []; // ventas mensuales
    public array $overviewLabels = []; // meses
    public array $miniSparklines = []; // datos minis
    public array $topProducts = [];
    public array $topCustomers = [];
    public array $salesByCategory = [];
    public int $totalOrders = 0;
    public float $totalRevenue = 0;
    public int $totalProducts = 0;
    public int $soldItemsCount = 0;
    public int $lowStockCount = 0;

    public function mount()
    {
        $this->to = Carbon::now()->endOfDay();
        $this->from = Carbon::now()->subMonths($this->lastMonths - 1)->startOfMonth();
        $this->loadData();
    }

    public function loadData()
    {
        // Totales
        $this->totalOrders = Order::count();
        $this->totalRevenue = (float) Order::sum('total');
        $this->totalProducts = Product::count();
        $this->soldItemsCount = (int) OrderItem::sum('quantity');

        // Low stock (ajusta threshold)
        $threshold = 5;
        $this->lowStockCount = Product::where('cantidadminima', '<=', $threshold)->count();

        // Ventas mensuales (últimos N meses)
        $period = collect();
        for ($i = $this->lastMonths - 1; $i >= 0; $i--) {
            $date = Carbon::now()->subMonths($i);
            $period->push($date->format('Y-m'));
        }
        $this->overviewLabels = $period->map(fn($m) => Carbon::createFromFormat('Y-m', $m)->format('M'))->toArray();

        $monthly = Order::selectRaw("DATE_FORMAT(created_at, '%Y-%m') as ym, SUM(total) as sum")
            ->whereBetween('created_at', [$this->from, $this->to])
            ->groupBy('ym')
            ->orderBy('ym')
            ->pluck('sum', 'ym')
            ->toArray();

        $this->overviewSeries = array_map(function($m) use ($monthly) {
            return isset($monthly[$m]) ? (float)$monthly[$m] : 0;
        }, $period->toArray());

        // Mini-sparklines: ejemplo: últimos 11 días de ventas diarias (puedes cambiar)
        $this->miniSparklines['orders_last_11_days'] = $this->getDailySeries(11);

        // Top productos por cantidad vendida (limit 6)
        $this->topProducts = Product::select('products.id','products.nombre','products.imagenuno_path','products.cantidadinventario')
            ->join('order_items','order_items.product_id','products.id')
            ->selectRaw('products.id, products.nombre, products.imagenuno_path, products.cantidadinventario, SUM(order_items.quantity) as total_sold')
            ->groupBy('products.id','products.nombre','products.imagenuno_path','products.cantidadinventario')
            ->orderByDesc('total_sold')
            ->limit(6)
            ->get()
            ->map(fn($p) => [
                'id' => $p->id,
                'nombre' => $p->name,
                'imagenuno_path' =>  Storage::url($p->imagenuno_path) ,
                'cantidadinventario' => $p->stock,
                'sold' => (int)$p->total_sold,
            ])->toArray();


        // Top customers por gasto total (limit 6)
        $this->topCustomers = Order::selectRaw('user_id, customer_name, customer_email, SUM(total) as total_spent, COUNT(*) as orders_count')
            ->whereNotNull('user_id')
            ->groupBy('user_id','customer_name','customer_email')
            ->orderByDesc('total_spent')
            ->limit(6)
            ->get()
            ->map(fn($r) => [
                'user_id' => $r->user_id,
                'name' => $r->customer_name,
                'email' => $r->customer_email,
                'spent' => (float)$r->total_spent,
                'orders' => (int)$r->orders_count,
            ])->toArray();

        // Sales by category (asumiendo product has category relation 'category' with 'name')
        // fallback: group by product categories via join
        $this->salesByCategory = OrderItem::selectRaw("products.category_id, categories.name as category_name, SUM(order_items.quantity) as qty")
            ->join('products', 'order_items.product_id', 'products.id')
            ->leftJoin('categories', 'products.category_id', 'categories.id')
            ->groupBy('products.category_id','categories.name')
            ->orderByDesc('qty')
            ->limit(6)
            ->get()
            ->map(fn($r) => [
                'label' => $r->category_name ?? 'Sin categoría',
                'value' => (int)$r->qty,
            ])->toArray();
    }

    protected function getDailySeries(int $days = 11): array
    {
        $series = [];
        for ($i = $days - 1; $i >= 0; $i--) {
            $d = Carbon::now()->subDays($i)->format('Y-m-d');
            $count = Order::whereDate('created_at', $d)->sum('total'); // total ventas diarias
            $series[] = (float)$count;
        }
        return $series;
    }

    // si quieres refrescar dashboard desde UI
    public function refreshDashboard()
    {
        $this->loadData();
        $this->dispatch('dashboard-refreshed');
    }

    public function render()
    {
        return view('livewire.dashboard', [
            // Pasamos datos como JSON para JS
            'overviewSeriesJson' => json_encode($this->overviewSeries),
            'overviewLabelsJson' => json_encode($this->overviewLabels),
            'miniSparklinesJson' => json_encode($this->miniSparklines),
            'topProducts' => $this->topProducts,
            'topCustomers' => $this->topCustomers,
            'salesByCategory' => $this->salesByCategory,
            'totalOrders' => $this->totalOrders,
            'totalRevenue' => $this->totalRevenue,
            'totalProducts' => $this->totalProducts,
            'soldItemsCount' => $this->soldItemsCount,
            'lowStockCount' => $this->lowStockCount,
        ]);
    }
}
