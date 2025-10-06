<?php

namespace App\Livewire;

use Livewire\Component;

class Checkout extends Component
{

        public $cart = [];
    public $subtotal = 0;
    public $iva = 0;
    public $shippingCost = 0;
    public $grandTotal = 0;

    public $customer_name;
    public $customer_email;
    public $customer_phone;
    public $customer_address;
    public $shipping_zone_id; // selecciona la ubicación

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotals();
    }

    public function updatedShippingZoneId($value)
    {
        $zone = ShippingZone::find($value);
        $this->shippingCost = $zone ? $zone->price : 0;
        $this->calculateTotals();
    }

    public function calculateTotals()
    {
        // Subtotal
        $this->subtotal = collect($this->cart)->sum(fn($item) => $item['precio'] * $item['cantidad']);

        // IVA (ejemplo 19%)
        $this->iva = $this->subtotal * 0.19;

        // Total
        $this->grandTotal = $this->subtotal + $this->iva + $this->shippingCost;
    }

    public function render()
    {
        return view('livewire.checkout', [
            'zones' => [], // para un <select>
        ]);
    }
}
