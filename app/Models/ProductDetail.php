<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    //protected $table ="products";

     protected $fillable = [

                'nombre',
                'correo',
                'estado',
                'tipo',
                'category_id',
                'clasificacion',
                'cupon',
                'encusta',
                'fecharedencion', 
                'textodestacado',
                'descripcionlarga',
                'fechalimitepublicacion',
                'destacado',
                'ordendestacado',
                'imagenuno_path',
                'imagendos_path',
                'imagentres_path',
                'target',
                'valor',
                'valormembresia',
                'descuento',
                'cobroenvio',
                'iva',
                'cantidadinventario',
                'linkmuestrasagotadas',
                'condiciones',
                'solomembresia',
                'registrados',
                'id',
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
