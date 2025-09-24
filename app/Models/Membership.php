<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $fillable = [

                'id',
                'user_id',
                'membershiptype',
                'begin_date',
                'end_date',
                
        ];
  
    
}
