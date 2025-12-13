<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Order;
use App\Models\OrderStatusLog;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\OrdersExport;

class OrdersManager extends Component
{
    use WithPagination;

    public $selectedOrder;
    public $newStatus;
    public $comment;

    // Filtros
    public $search = '';
    public $statusFilter = '';
    public $dateFrom = '';
    public $dateTo = '';

    public $viewDetail = false;

    public function showDetails($orderId)
    {
        $this->selectedOrder = Order::with('items.product')->find($orderId);
        $this->viewDetail = true;
    }
    public function closeDetails()
    {
        $this->viewDetail = false;
    }

    public function updating($field)
    {
        if (in_array($field, ['search', 'statusFilter', 'dateFrom', 'dateTo'])) {
            $this->resetPage();
        }
    }

    public function selectOrder($orderId)
    {
        $this->selectedOrder = Order::with('items')->find($orderId);
        $this->newStatus = $this->selectedOrder->status;
    }



    public function updateStatus()
    {
        $order = $this->selectedOrder;

        OrderStatusLog::create([
            'order_id'   => $order->id,
            'old_status' => $order->status,
            'new_status' => $this->newStatus,
            'comment'    => $this->comment,
            'admin_id'   => auth()->id(),
        ]);

        $order->update([
            'status' => $this->newStatus
        ]);

        $this->dispatch('status-updated');

        $this->reset(['comment']);
    }

    public function exportExcel()
    {
        return Excel::download(new OrdersExport(
            $this->search,
            $this->statusFilter,
            $this->dateFrom,
            $this->dateTo
        ), 'pedidos.xlsx');
    }

    public function render()
    {
        $orders = Order::query()
            ->when($this->search, function ($q) {
                $q->where('customer_name', 'like', "%{$this->search}%")
                    ->orWhere('customer_email', 'like', "%{$this->search}%")
                    ->orWhere('payu_reference', 'like', "%{$this->search}%");
            })
            ->when(
                $this->statusFilter,
                fn($q) =>
                $q->where('status', $this->statusFilter)
            )
            ->when(
                $this->dateFrom,
                fn($q) =>
                $q->whereDate('created_at', '>=', $this->dateFrom)
            )
            ->when(
                $this->dateTo,
                fn($q) =>
                $q->whereDate('created_at', '<=', $this->dateTo)
            )
            ->latest()
            ->paginate(10);

        return view('livewire.admin.orders-manager', compact('orders'));
    }


    // arriba en la clase, propiedades públicas
    public array $statusColors = [
        'pending'    => ['text' => '#7A5C00', 'bg' => '#FFF4D4', 'icon' => '⏳'],
        'paid'       => ['text' => '#145A2D', 'bg' => '#DFF3E6', 'icon' => '✅'],
        'processing' => ['text' => '#0B4F73', 'bg' => '#E6F4FB', 'icon' => '🔧'],
        'shipped'    => ['text' => '#4A235A', 'bg' => '#F3EAF8', 'icon' => '🚚'],
        'delivered'  => ['text' => '#0F7A66', 'bg' => '#E8F9F4', 'icon' => '📦'],
        'cancelled'  => ['text' => '#7A1F1F', 'bg' => '#FDECEC', 'icon' => '✖️'],
        'refunded'   => ['text' => '#5B6770', 'bg' => '#F3F5F6', 'icon' => '↩️'],
        'default'    => ['text' => '#2D2D2D', 'bg' => '#F0F0F0', 'icon' => 'ℹ️'],
    ];

    /**
     * Devuelve el style inline para el badge (gradiente suave + color del texto).
     * Usamos gradiente sutil para aspecto premium.
     */
    public function badgeStyle(string $status): string
    {
        $s = $status ?: 'default';
        $colors = $this->statusColors[$s] ?? $this->statusColors['default'];

        // gradiente ligero: top semi-transparent white + bottom color
        $bg = $colors['bg'];
        $text = $colors['text'];

        // crea un ligero overlay blanco para darle brillo
        $gradient = "linear-gradient(180deg, rgba(255,255,255,0.65), {$bg})";

        // border más oscuro sutil
        $borderColor = $this->darkenHex($bg, 12);

        // retorno del style (escaped)
        return "background: {$gradient}; color: {$text}; border: 1px solid {$borderColor}; padding: 6px 12px; border-radius: 12px; font-weight: 600; font-size: .85rem; display:inline-flex; align-items:center; gap:8px; box-shadow: 0 4px 10px rgba(16,24,40,0.06); text-transform:uppercase;";
    }

    /**
     * Helper simple para oscurecer un color hex en porcentaje.
     */
    private function darkenHex(string $hex, int $percent = 10): string
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = $hex[0] . $hex[0] . $hex[1] . $hex[1] . $hex[2] . $hex[2];
        }

        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));

        $r = max(0, min(255, (int)($r * (100 - $percent) / 100)));
        $g = max(0, min(255, (int)($g * (100 - $percent) / 100)));
        $b = max(0, min(255, (int)($b * (100 - $percent) / 100)));

        return sprintf('#%02x%02x%02x', $r, $g, $b);
    }

    /**
     * Para mostrar el icono desde el mapa (si lo quieres separado en la vista)
     */
    public function badgeIcon(string $status): string
    {
        return $this->statusColors[$status]['icon'] ?? $this->statusColors['default']['icon'];
    }

    public function statusLabel(string $status): string
{
    return match ($status) {
        'pending'    => 'Pendiente',
        'paid'       => 'Pagado',
        'processing' => 'Procesando',
        'shipped'    => 'Enviado',
        'delivered'  => 'Entregado',
        'cancelled'  => 'Cancelado',
        'refunded'   => 'Reembolsado',
        default      => ucfirst($status),
    };
}

}
