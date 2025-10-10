<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $fillable = ['user_id', 'reference', 'status', 'subtotal', 'iva', 'shipping', 'total', 'payu_reference', 'meta'];


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
}
