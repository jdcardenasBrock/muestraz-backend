<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuizAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'question_id',
        'option_id',
        'answer_text',
        'user_id',
    ];

    public function question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }

    public function option()
    {
        return $this->belongsTo(QuizOption::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
