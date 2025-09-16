<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    protected $fillable = [
        'title',
        'description',
        'image_path',
        'link',
        'order',
        'active',
        'target',
        'layout_type',
        'image_left',
        'image_right'
    ];
}
