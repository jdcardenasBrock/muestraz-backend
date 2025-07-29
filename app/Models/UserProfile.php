<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = "data_users";

    protected $fillable = [
        'born_date', 'mobile_phone','city','department','type_document',
        'document_id','address', 'gender',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'id','user_id');
    }
}
