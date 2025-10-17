<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [

                'id',
                'user_id',
                'membershiptype_id',
                'begin_date',
                'end_date',
                
        ];

        public function user()
    {
        return $this->belongsTo(User::class);
    }
  
    
}
