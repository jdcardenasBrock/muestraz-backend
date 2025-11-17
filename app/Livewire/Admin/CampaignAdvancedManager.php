<?php

namespace App\Livewire\Admin;


use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\QuizAnswer;




class CampaignAdvancedManager extends Component
{
    use WithFileUploads;

    public  $quizquestion;

    public function mount()
    {
        $this->quizquestion = QuizAnswer::orderBy('user_id')->get();
        //dd($this->quizquestion);       
    }
     
    public function render()
    {
        return view('livewire.admin.campaign_advanced-manager');
    }
}
