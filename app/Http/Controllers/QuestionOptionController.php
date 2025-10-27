<?php

namespace App\Http\Controllers;

use App\Models\QuizOption;

class QuestionOptionController extends Controller
{
    public function getData()
    {
        $data = QuizOption::all();
        return response()->json($data);
    }

} 