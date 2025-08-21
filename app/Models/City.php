<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
   protected $fillable = [
        'state_id',
        'state',
        'codigo_dane',
        'nombre',       
    ];
     
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
