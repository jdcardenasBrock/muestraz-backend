<?php

namespace App\Livewire\Admin;

use Livewire\Component;
//use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\UserProfile;
use App\Models\Users;
use App\Models\Membershipstype;
use App\Models\MembershipType;

class CampaignManager extends Component
{
    
    use WithPagination;
    //use WithFileUploads;

    //public  $maritalstatusfilter='',
     
    public $children;
    public $user;
    public $membershipstype;


    public function mount ()
    {
        //$this->user = Users::all();
        $this->membershipstype = MembershipType::all();
    }

         
    public function render()
    {     
      
        $userinfos = UserProfile::query()
        ->when ($this->children, function ($query) {
            $query->where('children', $this->children);
        })
        ->paginate(10);     
        /*$userinfos = UserProfile::orderby('id')->get();*/
       

        return view('livewire.admin.campaign-manager', compact('userinfos'));
    }
}
