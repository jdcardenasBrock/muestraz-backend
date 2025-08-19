<?php

namespace App\Livewire\Client;

use App\Models\Quiz;
use App\Models\QuizAnswer;
use App\Models\User;
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

    public function toggleOption($questionIndex, $optionId)
    {
        if (!isset($this->answers[$questionIndex])) {
            $this->answers[$questionIndex] = [];
        }

        if (in_array($optionId, $this->answers[$questionIndex])) {
            // Si ya está seleccionada, quitarla
            $this->answers[$questionIndex] = array_diff($this->answers[$questionIndex], [$optionId]);
        } else {
            // Si no está seleccionada, agregarla
            $this->answers[$questionIndex][] = $optionId;
        }
    }


    public function save()
    {
        $userId = auth()->id();

        foreach ($this->questions as $index => $question) {
            $answer = $this->answers[$index] ?? null;

            if ($question->type === 'multiple' && is_array($answer)) {
                foreach ($answer as $optionId) {
                    QuizAnswer::create([
                        'question_id' => $question->id,
                        'option_id' => $optionId,
                        'user_id' => $userId,
                    ]);
                }
            } else {
                QuizAnswer::create([
                    'question_id' => $question->id,
                    'answer_text' => $answer,
                    'user_id' => $userId,
                ]);
            }
        }
        auth()->user()->update(['has_completed_form' => true]);
        session()->flash('success', 'Tus respuestas han sido registradas.');
        $this->dispatch('close-quiz-modal');
    }

    public function render()
    {
        return view('livewire.client.quiz-viewer');
    }
}
