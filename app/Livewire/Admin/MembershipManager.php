<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MembershipType;

class Membership extends Component
{
    use WithFileUploads;

    public $type, $value, $quantitysamples, $quantitymonths;
    public $membership;
  
    public function mount()
    {
        $this->loadMembership();
    }

    public function loadMembership()
    {
        $this->membership = MembershipType::orderBy('type')->get();
       
    }

    public function render()
    {
        return view('livewire.admin.membership-manager');
    }
}