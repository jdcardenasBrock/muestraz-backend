<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\UserProfile;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

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
    public $shipping_zone_id;

    public $payment_method = null;
    public $accept_terms = false;

    protected $rules = [
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'required|email|max:255',
        'customer_phone' => 'required|string|max:20',
        'customer_address' => 'required|string|max:255',
        'shipping_zone_id' => 'required|exists:shipping_zones,id',
        'accept_terms' => 'accepted',
    ];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
        $user = Auth::user()->load('profile.city');
        // $userData = UserProfile::where('user_id', auth()->id())->first();
        if ($user && $user->profile) {
            $profile = $user->profile;

            $this->customer_name = $profile->full_name ?? '';
            $this->customer_email = $profile->email ?? '';
            $this->customer_phone = $profile->phone ?? '';
            $this->customer_address = $profile->address ?? '';
            $this->shipping_zone_id = $profile->shipping_zone_id ?? null;
            // 💸 Costo de envío basado en la ciudad
            $this->shippingCost = $profile->city->costoenvio ?? 0;
        } else {
            $this->shippingCost = 0;
        }
        $this->calculateTotals();
    }

    // // Se ejecuta cada vez que se actualiza cualquier propiedad
    // public function updated($propertyName)
    // {
    //     if ($propertyName === 'shipping_zone_id') {
    //         $this->updateShippingCost();
    //     }

    //     $this->calculateTotals();
    // }



    // Calcula totales en tiempo real
    public function calculateTotals()
    {
        $this->subtotal = collect($this->cart)->sum(fn($item) => $item['precio'] * $item['cantidad']);
        $this->iva = $this->subtotal * 0.19; // ejemplo 19%
        $this->grandTotal = $this->subtotal + $this->iva + $this->shippingCost;
    }

    // Actualiza la cantidad de un producto en el carrito
    public function updateQuantity($productId, $quantity)
    {
        if (isset($this->cart[$productId])) {
            $this->cart[$productId]['cantidad'] = max(1, (int)$quantity);
            $this->calculateTotals();
        }
    }

    public function removeItem($productId)
    {
        unset($this->cart[$productId]);
        $this->calculateTotals();
    }

    public function checkout()
    {
        $this->validate();

        // Crear la orden
        $order = Order::create([
            'user_id' => Auth::id(),
            'subtotal' => $this->subtotal,
            'tax' => $this->iva,
            'shipping' => $this->shippingCost,
            'total' => $this->grandTotal,
            'meta' => [
                'payment_method' => $this->payment_method,
                'customer_name' => $this->customer_name,
                'customer_email' => $this->customer_email,
                'customer_phone' => $this->customer_phone,
                'customer_address' => $this->customer_address,
            ],
        ]);

        // Agregar items
        foreach ($this->cart as $item) {
            $order->items()->create([
                'product_id' => $item['id'],
                'name' => $item['nombre'],
                'quantity' => $item['cantidad'],
                'price' => $item['precio'],
                'tax' => $item['iva'] ?? 0,
                'total' => $item['total'],
            ]);
        }

        // Limpiar carrito
        session()->forget('cart');
        $this->cart = [];
        $this->grandTotal = $this->subtotal = $this->iva = 0;
        $this->accept_terms = false;
        if ($this->payment_method === 'payu') {
            return redirect()->route('payu.checkout', $order);
        }

        session()->flash('success', 'Pedido realizado correctamente.');
    }

    public function render()
    {
        return view('livewire.checkout', [
            'zones' => [], // tu listado de zonas
        ]);
    }
}
