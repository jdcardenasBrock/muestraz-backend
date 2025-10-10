<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentLog extends Model
{
    use HasFactory;


    protected $fillable = ['order_id', 'provider', 'request_data', 'response_data', 'status'];


    protected $casts = [
        'request_data' => 'array',
        'response_data' => 'array',
    ];


    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
