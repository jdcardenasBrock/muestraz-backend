<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Membershiptype;

class MembershiptypeManager extends Component
{
    use WithFileUploads;

    public $type, $value, $quantitysamples, $quantitymonths;
    public $membershiptype;
    public $membershiptypeId = null;

    public function mount()
    {
        $this->loadMembershiptype();
    }

    public function loadMembershiptype()
    {
        $this->membershiptype = Membershiptype::orderBy('type')->get();
    }

    public function save()
    {
        $this->validate([
            'type' => 'nullable|string|max:255',
            'value' => 'required',
            'quantitysamples' => 'required',
            'quantitymonths' => 'required',
        ]);

       
        $membershiptype = Membershiptype::updateOrCreate(
            ['id' => $this->membershiptypeId],
            [
                'type' => $this->type,
                'value' => $this->value,
                'quantitysamples' => $this->quantitysamples,
                'quantitymonths' => $this->quantitymonths,
            ]
        );

        $this->resetForm();
        $this->loadMembershiptype();
    }

    public function edit($id)
    {
        $membershiptype = Membershiptype::findOrFail($id);
        $this->membershiptypeId = $membershiptype->id;
        $this->type = $membershiptype->type;
        $this->value = $membershiptype->value;
        $this->quantitysamples = $membershiptype->quantitysamples;
        $this->quantitymonths = $membershiptype->quantitymonths;
    }

    public function delete($id)
    {
        Membershiptype::destroy($id);
        $this->loadMembershiptype();
    }

    public function resetForm()
    {
        $this->reset(['type', 'value', 'quantitysamples', 'quantitymonths']);
    }

    public function clear(){
        $this->reset(['type', 'value', 'quantitysamples', 'quantitymonths']);
    }

    public function render()
    {
        return view('livewire.admin.membershiptype-manager');
    }
}