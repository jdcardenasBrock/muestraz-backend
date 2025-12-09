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
    public function mount(){
        $this->normalizeCartSession();
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


      protected function normalizeCartSession()
    {
        $cart = session()->get('cart', []);
        $changed = false;

        foreach ($cart as $id => $item) {
            $precioNormal = $item['precio'] ?? ($item['valor'] ?? 0);
            $precioMembresia = $item['valormembresia'] ?? $precioNormal;

            // Si alguna clave no existe, la añadimos
            if (!isset($item['precio_aplicado'])) {
                // Decide aplicar membresía según el usuario actual
                $hasMembership = auth()->user()?->hasActiveMembership() ?? false;
                $item['precio_aplicado'] = $hasMembership ? $precioMembresia : $precioNormal;
                $changed = true;
            }

            if (!isset($item['ahorro_unitario'])) {
                $item['ahorro_unitario'] = max(0, $precioNormal - ($item['precio_aplicado'] ?? $precioMembresia));
                $changed = true;
            }

            // normalizar cantidad e imagen por seguridad
            $item['cantidad'] = $item['cantidad'] ?? 1;
            $item['imagen'] = $item['imagen'] ?? null;

            $cart[$id] = $item;
        }

        if ($changed) {
            session()->put('cart', $cart);
        }
    }

    public function addToCart()
    {
        if (!$this->product) return;

        $cart = session()->get('cart', []);
        $user = auth()->user();
        $hasMembership = $user?->hasActiveMembership();

        // Precio según membresía
        $precioNormal = $this->product->valor ?? 0;
        $precioMembresia = $this->product->valormembresia ?? $precioNormal;
        $precioAplicado = $hasMembership ? $precioMembresia : $precioNormal;
        $ahorro = max(0, $precioNormal - $precioAplicado);

        /*** ----- VALIDACIÓN PARA MUESTRAS ----- ***/
        if ($this->product->clasificacion === 'muestra') {

            if (!$hasMembership) {
                $this->alert('Para obtener muestras debes tener una membresía activa.', 'warning');
                return;
            }

            if (isset($cart[$this->product->id])) {
                $this->alert('Solo puedes agregar 1 muestra de este producto.', 'warning');
                return;
            }

            $totalSamples = collect($cart)->where('clasificacion', 'muestra')->count();
            $membershipLimit = $this->userMembership->quantitysamples ?? 0;

            if ($totalSamples >= $membershipLimit) {
                $this->alert("Has alcanzado el límite de {$membershipLimit} muestras de tu membresía.", 'warning');
                return;
            }

            $cantidad = 1;
        } else {
            $cantidad = $this->quantity;
        }

        /*** ------ GUARDAR EN EL CARRITO ------ ***/
        $cart[$this->product->id] = [
            'product_id'       => $this->product->id,
            'nombre'           => $this->product->nombre,
            'precio'           => $precioNormal,
            'valormembresia'   => $precioMembresia,
            'precio_aplicado'  => $precioAplicado,
            'ahorro_unitario'  => $ahorro,
            'cantidad'         => $cantidad,
            'imagen'           => $this->product->imagenuno_path ? Storage::url($this->product->imagenuno_path) : null,
            'clasificacion'    => $this->product->clasificacion,
        ];

        session()->put('cart', $cart);

        $this->dispatch('refreshCart');
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
