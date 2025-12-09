<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DataUser extends Model
{
    protected $table = 'data_users';

    protected $fillable = [
        'mobile_phone',
        'address',
        'state_id',
        'city_id',
        'gender',
        'born_date',
        'type_document',
        'document_id',
        'user_id',
        'marital_status',
        'pet',
        'children',
        'vehicletype',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
