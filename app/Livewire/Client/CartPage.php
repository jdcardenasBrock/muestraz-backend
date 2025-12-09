<?php

namespace App\Livewire\Client;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class CartPage extends Component
{
    public $showModal = false;
    public $cart = [];
    public $grandTotal = 0;
    public $ahorroTotal = 0;
    public $totalNormal = 0;

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotals();
    }
    public function calculateTotals()
    {
        $this->grandTotal = 0;
        $this->ahorroTotal = 0;
        $this->totalNormal = 0;

        foreach ($this->cart as $item) {

            $precio = $item['precio'] ?? 0;
            $precioAplicado = $item['precio_aplicado'] ?? $precio;
            $cantidad = $item['cantidad'] ?? 1;

            // Totales base
            $totalNormal = $precio * $cantidad;
            $totalAplicado = $precioAplicado * $cantidad;

            // Ahorro por ítem
            $ahorro = ($precio - $precioAplicado) * $cantidad;

            $this->totalNormal += $totalNormal;
            $this->grandTotal += $totalAplicado;
            $this->ahorroTotal += $ahorro;
        }
    }


    public function updateCart($id, $quantity)
    {
        if (isset($this->cart[$id])) {
            $this->cart[$id]['cantidad'] = max(1, (int) $quantity);

            session()->put('cart', $this->cart);

            $this->calculateTotals();

            $this->dispatch('refreshCart', target: 'mini-cart');
        }
    }
    public function proceed()
    {

        $user = Auth::user();
        $data = $user->dataUser;

        // Validar si faltan campos obligatorios
        $missing = !$data
            || !$data->address
            || !$data->state_id
            || !$data->city_id
            || !$data->type_document
            || !$data->document_id
            || !$data->mobile_phone;

        if ($missing) {
            $this->showModal = true;
        } else {
            return redirect()->route('checkout');
        }
    }
    public function goToProfile()
    {
        $this->showModal = false;
        $id = Auth::user()->id;

        return redirect()->route('admin.m_user_detail_u.edit', [
            'ut' => Crypt::encrypt($id)
        ]);
    }


    public function removeFromCart($id)
    {
        if (isset($this->cart[$id])) {
            unset($this->cart[$id]);
            session()->put('cart', $this->cart);

            $this->calculateTotals();
            $this->dispatch('refreshCart', target: 'mini-cart');
        }
    }

    public function render()
    {
        return view('livewire.client.cart-page');
    }
}
