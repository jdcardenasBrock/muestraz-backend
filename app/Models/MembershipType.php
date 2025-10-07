<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class membershiptype extends Model
{
    protected $fillable = [

                'id',
                'type',
                'value',
                'quantitysamples',
                'quantitymonths',
                
        ];
  
    
}
