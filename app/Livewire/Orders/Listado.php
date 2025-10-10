<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Listado extends Component
{
    public $perPage = 10;
    public function render()
    {
        $orders = Order::with('items')
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->paginate($this->perPage);
        return view('livewire.orders.listado', compact('orders'));
    }
}
