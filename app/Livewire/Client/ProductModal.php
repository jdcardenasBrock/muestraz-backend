<?php

namespace App\Livewire\Client;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductModal extends Component
{
    public $product;
    public $isOpen = false;
    public $quantity = 1;

    #[On('ModalProductsMuestraz')]
    public function openModal($productId)
    {
        $this->product = Product::findOrFail($productId);
        $this->isOpen = true;
        $this->quantity = 1;
    }

    // Método para cerrar el modal
    public function closeModal()
    {
        $this->isOpen = false;  // Cerrar el modal
    }
    public function render()
    {
        return view('livewire.client.product-modal');
    }

    public function increment()
    {
        if ($this->quantity < 100) {
            $this->quantity++;
        }
    }

    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
        }
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
        session()->flash('message', 'Producto agregado al carrito ✅');

        $this->closeModal();
    }
}
