<?php

namespace App\Livewire\Client;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;

class ProductModal extends Component
{
    public $product;
    public $isOpen = false;

    #[On('ModalProductsMuestraz')] 
    public function openModal($productId)
    {
        $this->product = Product::findOrFail($productId);
        $this->isOpen = true;
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
}
