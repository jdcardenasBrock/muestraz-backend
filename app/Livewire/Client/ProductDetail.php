<?php

namespace App\Livewire\Client;

use Livewire\Component;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductDetail extends Component
{
    public $productId;
    public $product;
   public $quantity = 1;

    public function increment()
    {
        $this->quantity++;
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
    }


    public function mount($id)
    {
        $this->productId = $id;
        $this->product = Product::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.client.product-detail'); // 👈 Aquí indicas el layout
    }


    public function addToCart()
    {
        if (!$this->product) return;

        $cart = session()->get('cart', []);

        if (isset($cart[$this->product->id])) {
            $cart[$this->product->id]['cantidad'] += $this->quantity;
        } else {
            $cart[$this->product->id] = [
                'nombre'   => $this->product->nombre,
                'precio'   => $this->product->valor,
                'cantidad' => $this->quantity,
                'imagen'   => $this->product->imagenuno_path ? Storage::url($this->product->imagenuno_path) : null,
            ];
        }

        session()->put('cart', $cart);

        $this->dispatch('refreshCart')->to('cart'); // Livewire v3
        
    }
}
