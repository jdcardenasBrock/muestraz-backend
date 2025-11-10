<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayuTransaction extends Model
{
    use HasFactory;

    protected $table = 'payu_transactions';

    protected $fillable = [
        'order_id',
        'transaction_id',
        'state',
        'status_text',
        'value',
        'currency',
        'response_message',
        'payment_method',
        'raw_data',
    ];

    protected $casts = [
        'raw_data' => 'array',
        'value' => 'decimal:2',
    ];

    /**
     * Relación con la orden.
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * Traduce el estado de PayU a texto legible.
     */
    public static function mapStateToText($state)
    {
        return match ((int)$state) {
            4 => 'APPROVED',
            6 => 'DECLINED',
            7 => 'PENDING',
            104 => 'ERROR',
            default => 'UNKNOWN',
        };
    }
}
