<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = "data_users";

    protected $fillable = [
        'born_date', 'mobile_phone','state_id','city_id','type_document',
        'document_id','address', 'gender','maritalstatus','children','pet','vehicletype'
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }
}
