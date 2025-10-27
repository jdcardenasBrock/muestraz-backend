<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SegmentationAdvanced extends Model
{
    //protected $table ="products";

     protected $fillable = [

                'id',
                'product_id',
                'question_id',
                'option_id',  
        ];
   
        public function question()
        {
                return $this->belongsTo(QuizQuestion::class);
        }
    
        public function option()
        {
                return $this->belongsTo(QuizOption::class);
        }
}
