<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\UserProfile;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Checkout extends Component
{
    public $cart = [];
    public $subtotal = 0;
    public $iva = 0;
    public $shippingCost = 0;
    public $grandTotal = 0;

    public bool $use_profile_data = true;
    public ?string $customer_name = null;
    public ?string $customer_email = null;
    public ?string $customer_phone = null;
    public ?string $customer_address = null;

    public ?string $payment_method = null;
    public bool $accept_terms = false;

    protected $rules = [
        'customer_name' => 'required|string|max:255',
        'customer_email' => 'required|email|max:255',
        'customer_phone' => 'required|string|max:20',
        'customer_address' => 'required|string|max:255',
        'accept_terms' => 'accepted',
    ];

    public function mount()
    {
        if (Auth::check()) {
            $this->cart = session()->get('cart', []);
            $user = Auth::user()->load('profile.city');
            if ($user && $user->profile) {
                $profile = $user->profile;
                $this->customer_name = $user->name ?? '';
                $this->customer_email = $user->email ?? '';
                $this->customer_phone = $profile->mobile_phone ?? '';
                $this->customer_address = $profile->address ?? '';
                // 💸 Costo de envío basado en la ciudad
                $this->shippingCost = $profile->city->costoenvio ?? 0;
            } else {
                $this->shippingCost = 0;
            }
            $this->calculateTotals();
        } else {
            return redirect()->to('/');
        }
    }

    // // Se ejecuta cada vez que se actualiza cualquier propiedad
    // public function updated($propertyName)
    // {
    //     if ($propertyName === 'costumer_id') {
    //         $this->updateShippingCost();
    //     }

    //     $this->calculateTotals();
    // }


    public function updatedUseProfileData($value): void
    {

        if ($value && Auth::check()) {
            $user = Auth::user();
            $profile = $user->profile;
            $this->customer_name = $user->name ?? '';
            $this->customer_email = $user->email ?? '';
            $this->customer_phone = $profile->mobile_phone ?? '';
            $this->customer_address = $profile->address ?? '';
        } else {
            $this->reset(['customer_name', 'customer_email', 'customer_phone', 'customer_address']);
        }
    }

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
    public function resetCart()
    {
        // Si usas carrito en sesión
        session()->forget('cart');

        // Si usas una propiedad Livewire
        $this->cart = [];

        // Si usas cálculo dinámico
        $this->subtotal = 0;
        $this->iva = 0;
        $this->shippingCost = 0;
        $this->grandTotal = 0;
    }

    public function removeItem($productId)
    {
        unset($this->cart[$productId]);
        $this->calculateTotals();
    }

    public function mostrando(){
        dd($this->cart);
    }
    public function checkout()
    {
        $this->validate();

        $order = Order::create([
            'user_id' => Auth::id(),
            'customer_name' => $this->customer_name,
            'customer_email' => $this->customer_email,
            'customer_phone' => $this->customer_phone,
            'shipping_address' => $this->customer_address,
            'subtotal' => $this->subtotal,
            'iva' => $this->iva,
            'shipping_cost' => $this->shippingCost,
            'total' => $this->grandTotal,
            'status' => 'pending',
            'payu_reference' => 'ORD-' . strtoupper(uniqid()),
        ]);


        // Agregar items
        foreach ($this->cart as $item) {
            $iva = $item['iva'] ?? ($item['precio'] * $item['cantidad'] * 0.19); // Calcula IVA si no existe
            $total = ($item['precio'] * $item['cantidad']) + $iva;
            $order->items()->create([
                'product_id' => $item['product_id'] ?? null,
                'product_name' => $item['nombre'],
                'quantity' => $item['cantidad'],
                'price' => $item['precio'],
                'iva' => $iva,
                'total' => $total,
            ]);
        }

        if ($this->grandTotal == 0) {
            $order->update([
                'status' => 'paid',
                'payment_method' => 'free',
                'payu_reference' => 'FREE-' . uniqid(),
            ]);
            $this->resetCart();

            // Notificación al cliente (opcional)
            session()->flash('success', 'Tu pedido ha sido confirmado exitosamente.');

            // Redirigir a página de confirmación
            return redirect()->route('orders.show', $order->id);
        }
        return redirect()->route('payu.redirect', $order);
    }

    public function render()
    {
        return view('livewire.checkout', [
            'zones' => [], // tu listado de zonas
        ]);
    }
}
