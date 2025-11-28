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
    public $userMembership;
     public $alertMessage;
    public $alertType; // success, warning, danger, info

    #[On('ModalProductsMuestraz')]
    public function openModal($productId)
    {
        $this->product = Product::findOrFail($productId);
        $this->userMembership = auth()->user()?->membership?->membershipType ?? null;
        $this->isOpen = true;
        $this->quantity = 1;
        $this->alertType=null;
        $this->alertMessage=null;
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

        // Validación para muestras
        if ($this->product->clasificacion === 'muestra') {
             if(!auth()->user()->hasActiveMembership()){
                $this->alert('Para obtener Muestras debes adquirir una membresia', 'warning');
                return;
            }

            // Solo una por producto
            if (isset($cart[$this->product->id])) {
                $this->alert('Solo puedes agregar 1 muestra de este producto.', 'warning');
                return;
            }

            // Limite de muestras según membresía
            $totalSamples = collect($cart)->where('clasificacion', 'muestra')->count();
            $membershipLimit = $this->userMembership->quantitysamples ?? 0;

            if ($totalSamples >= $membershipLimit) {
                $this->alert("Has alcanzado el límite de {$membershipLimit} muestras de tu membresía.", 'warning');
                return;
            }

            $cart[$this->product->id] = [
                'product_id'  => $this->product->id,
                'nombre'        => $this->product->nombre,
                'precio'        => $this->product->valor ?? 0,
                'valormembresia'=> $this->product->valormembresia ?? 0,
                'cantidad'      => 1,
                'imagen'        => $this->product->imagenuno_path ? Storage::url($this->product->imagenuno_path) : null,
                'clasificacion' => 'muestra',
            ];
        } else { // Productos de venta
            $cart[$this->product->id] = [
                'product_id'  => $this->product->id,
                'nombre'        => $this->product->nombre,
                'precio'        => $this->product->valor ?? 0,
                'valormembresia'=> $this->product->valormembresia ?? 0,
                'cantidad'      => $this->quantity,
                'imagen'        => $this->product->imagenuno_path ? Storage::url($this->product->imagenuno_path) : null,
                'clasificacion' => 'venta',
            ];
        }

        session()->put('cart', $cart);

        // Actualizar carrito y notificación
        $this->dispatch('refreshCart'); // Para componentes de carrito si los tienes
        $this->alert('Producto agregado al carrito.', 'success');
    }

    public function alert($message, $type = 'info')
    {
        $this->alertMessage = $message;
        $this->alertType = $type;

        // La alerta desaparecerá después de 3 segundos
        $this->dispatch('hide-alert', ['timeout' => 3000]);
    }

    public function clear(){
         $this->alertMessage = null;
        $this->alertType = null;
    }

}
