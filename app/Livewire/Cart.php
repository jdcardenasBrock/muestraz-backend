<?php

namespace App\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $total = 0;

    protected $listeners = ['refreshCart' => 'loadCart'];

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cart = session()->get('cart', []);
        $this->total = collect($this->cart)->sum(function ($item) {
            return $item['precio'] * $item['cantidad'];
        });
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
