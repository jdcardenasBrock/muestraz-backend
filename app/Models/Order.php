<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'shipping_address',
        'shipping_city',
        'shipping_state',
        'shipping_postal_code',
        'subtotal',
        'iva',
        'shipping_cost',
        'discount',
        'total',
        'payu_reference',
        'payment_method',
        'transaction_id',
        'status',
        'payment_status_detail',
        'paid_at',
        'cancelled_at',
        'notes',
    ];


    protected $casts = [
        'meta' => 'array',
    ];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }


    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class);
    }

    public function payuTransactions()
    {
        return $this->hasMany(PayuTransaction::class);
    }
}
