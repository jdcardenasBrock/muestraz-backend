<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatusLog extends Model
{
    protected $fillable = [
        'order_id',
        'old_status',
        'new_status',
        'comment',
        'admin_id'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
