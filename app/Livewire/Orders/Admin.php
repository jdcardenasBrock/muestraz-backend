<?php

namespace App\Livewire\Orders;

use Livewire\Component;
use App\Models\Order;

class Admin extends Component
{
    public $status = '';
    public $perPage = 15;


    public function render()
    {
        $q = Order::with('items');
        if ($this->status) $q->where('status', $this->status);


        $orders = $q->orderBy('created_at', 'desc')->paginate($this->perPage);


        return view('livewire.orders.admin', compact('orders'));
    }

    public function markAs($orderId, $status)
    {
        $order = Order::find($orderId);
        if (!$order) return session()->flash('error', 'Pedido no encontrado');


        $order->update(['status' => $status]);
        session()->flash('message', 'Estado actualizado');
    }
}
