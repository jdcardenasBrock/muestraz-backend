<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Membershiptype;

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
        $this->membership = Membershiptype::orderBy('type')->get();
        dd($this->membership);
       
    }

    public function render()
    {
        return view('livewire.admin.membership-manager');
    }
}