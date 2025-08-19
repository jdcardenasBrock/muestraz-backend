<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
   protected $fillable = [
        'codigo_dane',
        'nombre',       
    ];

   public function cities()
    {
        return $this->hasMany(City::class);
    }
     
}
