<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\UserProfile;


class CampaignManager extends Component
{
    use WithFileUploads;

    public  $userinfo,
            $maritalstatusfilter,
            $childrenfilter;

    public function mount()
    {
        //$this->userinfo = UserProfile::orderBy('id')->get();     
       
    }
     
    public function render()
    {     
        $this->userinfo = UserProfile::query()
        ->when($this->maritalstatusfilter, function ($q) {
            $q->where('maritalstatus', $this->maritalstatusfilter);
        })
        ->when($this->childrenfilter, function ($q) {
            $q->where('children', $this->childrenfilter);
        })->with('user')->get();


        return view('livewire.admin.campaign-manager');
    }
}
