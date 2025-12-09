<?php

namespace App\Exports;

use App\Models\Order;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class OrdersExport implements FromCollection, WithHeadings, WithMapping
{
    public function __construct(
        public $search,
        public $status,
        public $dateFrom,
        public $dateTo
    ) {}

    /**
     * Selección de datos (filtros)
     */
    public function collection()
    {
        return Order::query()
            ->when($this->search, function ($q) {
                $q->where(function ($query) {
                    $query->where('customer_name', 'like', "%{$this->search}%")
                          ->orWhere('customer_email', 'like', "%{$this->search}%")
                          ->orWhere('payu_reference', 'like', "%{$this->search}%")
                          ->orWhere('id', $this->search);
                });
            })
            ->when($this->status, fn($q) => $q->where('status', $this->status))
            ->when($this->dateFrom, fn($q) => $q->whereDate('created_at', '>=', $this->dateFrom))
            ->when($this->dateTo, fn($q) => $q->whereDate('created_at', '<=', $this->dateTo))
            ->latest()
            ->get();
    }

    /**
     * Mapeo personalizado de columnas
     */
    public function map($order): array
    {
        return [
            $order->id,
            $order->customer_name,
            $order->customer_email,
            $order->customer_phone,
            $order->shipping_address,
            $order->shipping_city,
            $order->shipping_state,
            $order->shipping_postal_code,
            number_format($order->subtotal, 2),
            number_format($order->iva, 2),
            number_format($order->shipping_cost, 2),
            number_format($order->discount, 2),
            number_format($order->total, 2),
            $order->payu_reference,
            $order->payment_method ?? 'N/A',
            $order->transaction_id ?? 'N/A',
            ucfirst($order->status),
            $order->payment_status_detail ?? 'N/A',
            $order->paid_at,
            $order->cancelled_at,
            $order->type,
            $order->membership_id,
            $order->notes,
            $order->created_at->format('Y-m-d H:i'),
        ];
    }

    /**
     * Encabezados del archivo Excel (bonitos y ordenados)
     */
    public function headings(): array
    {
        return [
            'ID',
            'Cliente',
            'Email',
            'Teléfono',
            'Dirección',
            'Ciudad',
            'Departamento',
            'Código Postal',
            'Subtotal',
            'IVA',
            'Costo Envío',
            'Descuento',
            'Total',
            'Referencia PayU',
            'Método de Pago',
            'Transacción',
            'Estado',
            'Detalle Pago',
            'Pagado en',
            'Cancelado en',
            'Tipo',
            'Membership ID',
            'Notas',
            'Fecha de Creación',
        ];
    }
}
