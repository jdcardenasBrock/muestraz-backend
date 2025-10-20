<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{

    //use HasFactory; 

    //protected $table ="products";

    protected $fillable = [
        'nombre',
        'correo',
        'estado',
        'tipo',
        'category_id',
        'clasificacion',
        'cupon',
        'encuesta',
        'fecharedencion',
        'textodestacado',
        'descripcionlarga',
        'fechalimitepublicacion',
        'destacado',
        'controlarinventario',
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
        'cantidadminima',
        'linkmuestrasagotadas',
        'condiciones',
        'solomembresia',
        'registrados',
        'id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    /*
     public function details()
    {
        return $this->belongsTo(Product::class);
    }*/

    public function relatedProduct()
    {
        return $this->belongsTo(Product::class, 'related_product_id');
    }

    // Redenciones
    public function redemptions()
    {
        return $this->hasMany(ProductRedemption::class);
    }

    
}
