<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Segmentation extends Model
{
    //protected $table ="products";

     protected $fillable = [

                'id',
                'product_id',
                'alluser',
                'age',
                'maritalstatus',
                'children',
                'pet',
                'vehiculetype',
                'gender', 
        ];
    /*public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function details()
    {
        return $this->belongsTo(Product::class);
    }*/

    
}
