<?php

namespace App\Livewire\Admin;

use App\Models\Quiz;
use Livewire\Component;

class QuizManager extends Component
{


    public $quizzes;
    public $quizId = null;
    public $title = '';
    public $description = '';
    public $is_visible = true;
    public $order = 0;

    protected $rules = [
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'is_visible' => 'boolean',
        'order' => 'integer|min:0',
    ];

    public function mount()
    {
        $this->loadQuizzes();
    }

    public function loadQuizzes()
    {
        $this->quizzes = Quiz::orderBy('order')->get();
    }

    public function save()
    {
        $this->validate();

        Quiz::updateOrCreate(
            ['id' => $this->quizId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'is_visible' => $this->is_visible,
                'order' => $this->order,
            ]
        );

        $this->resetForm();
        $this->loadQuizzes();
        session()->flash('message', 'Encuesta guardada exitosamente.');
    }

    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        $this->quizId = $quiz->id;
        $this->title = $quiz->title;
        $this->description = $quiz->description;
        $this->is_visible = $quiz->is_visible;
        $this->order = $quiz->order;
    }

    public function delete($id)
    {
        Quiz::findOrFail($id)->delete();
        $this->loadQuizzes();
    }

    public function toggleVisibility($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->is_visible = !$quiz->is_visible;
        $quiz->save();
        $this->loadQuizzes();
    }

    public function resetForm()
    {
        $this->reset(['quizId', 'title', 'description', 'is_visible', 'order']);
    }

    public function render()
    {
        return view('livewire.admin.quiz-manager');
    }
}
