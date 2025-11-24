<?php

namespace App\Livewire\Orders;

use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CustomerOrders extends Component
{
     public $orders;

    public function mount()
    {
        $this->orders = Order::with(['items.product'])
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->get();
    }

    public function render()
    {
        return view('livewire.orders.customer-orders');
    }
}
