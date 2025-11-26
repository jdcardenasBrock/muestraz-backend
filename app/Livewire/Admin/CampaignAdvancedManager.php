<?php

namespace App\Livewire\Admin;


use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizOption;





class CampaignAdvancedManager extends Component
{
    use WithFileUploads;

    public  $quizquestion;
    public  $question;
    public  $quizoptions;

    public function mount()
    {
        $this->quizquestion = QuizAnswer::orderBy('user_id')->get();
        $this ->question = QuizQuestion::all();  
        $this->quizoptions = QuizOption::all(); 
    }
     
    public function render()
    {
        return view('livewire.admin.campaign_advanced-manager');
    }
}
