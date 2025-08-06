<?php

namespace App\Livewire\Client;

use App\Models\Quiz;
use Livewire\Component;

class FormReminder extends Component
{
    public $quiz;
    public $shouldShow = false;

    public function mount()
    {
        if (auth()->check() && !auth()->user()->has_completed_form) {
            $this->quiz = Quiz::where('is_visible', true)->first(); // puedes ajustar la lógica si quieres uno específico
            $this->shouldShow = true;
        }
    }

    public function render()
    {
        return view('livewire.client.form-reminder');
    }
}
