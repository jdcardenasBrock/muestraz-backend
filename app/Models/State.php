<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
   protected $fillable = [
        'id',
        'codigo_dane',
        'nombre',       
    ];

  /* public function cities()
    {
        return $this->hasMany(City::class);
    }
     */
}
