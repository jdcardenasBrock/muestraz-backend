<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show(Order $order)
    {
        // seguridad: que el dueño o admin pueda ver
        if ($order->user_id && $order->user_id !== Auth::id() && !Auth::user()->can('manage-orders')) {
            abort(403);
        }


        $order->load('items.product');
        return view('orders.show', compact('order'));
    }
}
