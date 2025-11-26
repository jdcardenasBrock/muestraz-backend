<?php

namespace App\Livewire\Admin;


use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\QuizAnswer;
use App\Models\QuizQuestion;
use App\Models\QuizOption;
use Livewire\WithPagination;


class CampaignAdvancedManager extends Component
{
    use WithFileUploads;

    use WithPagination;

    public  $quizquestion;
    public  $question;
    public  $quizoptions;
    public  $option_id;
    public  $question_id;

    public function mount()
    {
        $this->quizquestion = QuizAnswer::orderBy('user_id')->get();
        $this ->question = QuizQuestion::all();  
        $this->quizoptions = QuizOption::all(); 
    }

       public function updatingSearch()
    {
        $this->resetPage();
    }
     
    public function render()
    {
        $useranswers = QuizAnswer::query()
                ->when($this->question_id, function ($query) {
                $query->where('question_id', $this->question_id);
            })
            ->when($this->option_id, function ($query) {
                $query->where('option_id', $this->option_id);
            })
            
            ->with('question', 'option', 'user')
            ->paginate(10);
            
        return view('livewire.admin.campaign_advanced-manager', ['useranswers' => $useranswers]);
    }
}
