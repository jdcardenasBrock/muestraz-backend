<?php

namespace App\Livewire\Admin;

use App\Models\Segmentation;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;
use App\Models\UserProfile;


class CampaignManager extends Component
{
    use WithFileUploads;

    public  $userinfo;

    public function mount()
    {
        $this->userinfo = UserProfile::orderBy('id')->get();
       
    }
     
    public function render()
    {
        return view('livewire.admin.campaign-manager');
    }
}
