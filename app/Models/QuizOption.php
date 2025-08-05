<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'option_text',
        'is_correct',
    ];

   public function question()
{
    return $this->belongsTo(QuizQuestion::class, 'id');
}

}
