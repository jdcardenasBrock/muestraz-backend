<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller; // If extending the base Controller class
use App\Models\Membership;
use App\Models\MembershipType;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
class MembershipController extends Controller
{
   public function index()
    {
        $membership = MembershipType::all();
        return view('m_membership', compact('membership'));
    }
    public function pay(Request $request)
    {
        // Buscar membresía (puede ser Membership o MembershipType)
        $membership = MembershipType::findOrFail($request->membership_id);


        // Validar usuario autenticado
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para continuar.');
        }

        // Crear la orden
        $order = Order::create([
            'user_id' => Auth::id(),
            'customer_name' => Auth::user()->name,
            'customer_email' => Auth::user()->email,
            'customer_phone' => 3100000000,
            'shipping_address' => 'null',
            'subtotal' => 0,
            'iva' => 0,
            'shipping_cost' => 0,
            'total' => $membership->value,
            'status' => 'pending',
            'payu_reference' => 'ORD-' . strtoupper(uniqid()),

            // Campos de membresía
            'type'              => 'membership',
            'membership_id'     => $membership->id,
            'membership_months' => $membership->quantitymonths ?? 1,
        ]);

        // Redirigir al checkout de PayU
        return redirect()->route('payu.redirect', ['order' => $order->id]);
    }
    
}
