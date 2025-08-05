<?php

namespace App\Livewire\Admin;

use App\Models\Quiz;
use App\Models\QuizQuestion;
use Livewire\Component;

class QuizQuestionManager extends Component
{
    public $quiz;
    public $questions;

    public $question_id;
    public $question = '';
    public $type = 'text';
    public $is_required = false;
    public $order = 0;

    public $optionInputs = []; // Para múltiples opciones

    protected $rules = [
        'question' => 'required|string|max:255',
        'type' => 'required|in:text,number,multiple,popular',
        'is_required' => 'boolean',
        'order' => 'integer|min:0',
        'optionInputs.*' => 'nullable|string|max:255',
    ];

    public function mount(Quiz $quiz)
    {
        $this->quiz = $quiz;
        $this->loadQuestions();
    }

    public function loadQuestions()
    {
        $this->questions = $this->quiz->questions()->with('options')->orderBy('order')->get();
    }

    public function save()
    {
        $this->validate();

        $questionModel = QuizQuestion::updateOrCreate(
            ['id' => $this->question_id],
            [
                'quiz_id' => $this->quiz->id,
                'question' => $this->question,
                'type' => $this->type,
                'is_required' => $this->is_required,
                'order' => $this->order,
            ]
        );

        // Opciones
        if (in_array($this->type, ['multiple', 'popular'])) {
            $questionModel->options()->delete(); // limpiar opciones anteriores
            foreach ($this->optionInputs as $optionText) {
                if (trim($optionText) !== '') {
                    $questionModel->options()->create(['option_text' => $optionText]);
                }
            }
        }

        $this->resetForm();
        $this->loadQuestions();
        session()->flash('message', 'Pregunta guardada.');
    }

    public function edit($id)
    {
        $q = QuizQuestion::with('options')->findOrFail($id);
        $this->question_id = $q->id;
        $this->question = $q->question;
        $this->type = $q->type;
        $this->is_required = $q->is_required;
        $this->order = $q->order;
        $this->optionInputs = $q->options->pluck('option_text')->toArray();
    }

    public function delete($id)
    {
        QuizQuestion::findOrFail($id)->delete();
        $this->loadQuestions();
    }

    public function addOptionInput()
    {
        $this->optionInputs[] = '';
    }

    public function removeOptionInput($index)
    {
        unset($this->optionInputs[$index]);
        $this->optionInputs = array_values($this->optionInputs);
    }

    public function resetForm()
    {
        $this->reset(['question_id', 'question', 'type', 'is_required', 'order', 'optionInputs']);
    }

    public function render()
    {
        return view('livewire.admin.quiz-question-manager');
    }
}

