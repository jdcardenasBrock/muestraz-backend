<?php

namespace App\Livewire\Admin;

use Livewire\Component;
//use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\UserProfile;
use App\Models\Users;
use App\Models\MembershipType;

class CampaignManager extends Component
{
    
    use WithPagination;
    
    public $childrenfilter,
           $petfilter,
           $maritalstatusfilter,
           $genderfilter,
           $vehicletypefilter,
           $membershiptypefilter;

    public $user;
    public $membershipstype;


    public function mount ()
    {
        //$this->user = Users::all();
        $this->membershipstype = MembershipType::all();
    }

     public function updatingSearch()
    {
        $this->resetPage();
    }
         
    public function render()
    {     
      
        $userinfos = UserProfile::query()
            ->when ($this->childrenfilter, function ($query)  {
                $query->where('children', $this->childrenfilter);
            })
            ->when ($this->petfilter, function ($query)  {
                $query->where('pet', $this->petfilter);
            })
            ->when ($this->maritalstatusfilter, function ($query)  {
                $query->where('maritalstatus', $this->maritalstatusfilter);
            })
            ->when ($this->genderfilter, function ($query)  {
                $query->where('gender', $this->genderfilter);
            })
            ->when ($this->vehicletypefilter, function ($query)  {
                $query->where('vehicletype', $this->vehicletypefilter);
            })
    
            ->with('user')
            ->paginate(10);
                
       

        return view('livewire.admin.campaign-manager', ['userinfos' => $userinfos]);
    }
}
