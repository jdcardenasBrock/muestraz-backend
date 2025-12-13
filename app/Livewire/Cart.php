<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $total = 0;
    public $subtotal = 0;
    public $membresiaActiva = false;

    #[\Livewire\Attributes\On('refreshCart')]
    public function refreshCart()
    {
       $this->loadCart();
    }

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = session()->get('cart', []);
        $this->membresiaActiva = Auth::check() && Auth::user()->membresia_activa;
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        $this->subtotal = collect($this->cart)->sum(function ($item) {
            return ($item['precio_aplicado'] ?? $item['precio']) * $item['cantidad'];
        });

        $this->total = $this->subtotal;
    }


    public function removeItem($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
        }
        $this->loadCart();
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
