<?php

namespace App\Livewire\Client;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use Livewire\Component;

class QuizViewer extends Component
{
    public Quiz $quiz;
    public $currentQuestionIndex = 0;
    public $questions = [];
    public $answers = [];

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz;
        $this->questions = $quiz->questions()->with('options')->orderBy('order')->get();
    }

    public function next()
    {
        if ($this->currentQuestionIndex < count($this->questions) - 1) {
            $this->currentQuestionIndex++;
        }
    }

    public function previous()
    {
        if ($this->currentQuestionIndex > 0) {
            $this->currentQuestionIndex--;
        }
    }

    public function save()
    {
        $userId = auth()->id();

        foreach ($this->questions as $index => $question) {
            $answer = $this->answers[$index] ?? null;

            if ($question->type === 'multiple') {
                QuizAnswer::create([
                    'question_id' => $question->id,
                    'option_id' => $answer,
                    'user_id' => $userId,
                ]);
            } else {
                QuizAnswer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answer,
                    'user_id' => $userId,
                ]);
            }
        }

        session()->flash('success', 'Tus respuestas han sido registradas.');
        $this->dispatchBrowserEvent('close-quiz-modal');
    }

    public function render()
    {
        return view('livewire.client.quiz-viewer');
    }
}
