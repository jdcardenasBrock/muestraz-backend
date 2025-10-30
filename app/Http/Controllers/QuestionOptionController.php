<?php

namespace App\Http\Controllers;

use App\Models\QuizOption;

class QuestionOptionController extends Controller
{
    public function getData($quiz_question_id)
    {
        $data = QuizOption::where('quiz_question_id', $quiz_question_id)->get();
        return response()->json($data);
    }

} 