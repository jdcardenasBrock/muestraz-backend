<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\MembershipType;

class MembershiptypeManager extends Component
{
    use WithFileUploads;

    public $type, $value, $quantitysamples, $quantitymonths, $target = '_self';
    public $image;
    public $membershiptype, $memberType = "";
    public $membershiptypeId = null;

    public function mount()
    {
        $this->loadMembershiptype();
    }

    public function loadMembershiptype()
    {
        $this->membershiptype = MembershipType::orderBy('type')->get();
    }

    public function save()
    {
        $rules = [
            'memberType' => 'required|in:free,paid',
            'quantitysamples' => 'required|integer|min:1',
            'quantitymonths' => 'required|integer|min:1',
            'image' => $this->membershiptypeId
                ? 'nullable|image|max:2048'
                : 'required|image|max:2048',
        ];

        // Si la membresía es de pago, exigir el valor
        if ($this->memberType === 'paid') {
            $rules['value'] = 'required|numeric|min:1';
        } else {
            // Si es gratis, poner el valor en 0 por consistencia
            $this->value = 0;
        }

        $this->validate($rules);


        $path = $this->image ? $this->image->store('memberships', 'public') : null;

        $membershiptype = MembershipType::updateOrCreate(
            ['id' => $this->membershiptypeId],
            [
                'type' => $this->type,
                'value' => $this->value,
                'quantitysamples' => $this->quantitysamples,
                'quantitymonths' => $this->quantitymonths,
                'target' => $this->target,
                'memberType' => $this->memberType,
                'image_path' => $path ?? MembershipType::find($this->membershiptypeId)?->image_path,
            ]
        );

        $this->resetForm();
        $this->loadMembershiptype();
    }

    public function edit($id)
    {
        $membershiptype = MembershipType::findOrFail($id);
        $this->membershiptypeId = $membershiptype->id;
        $this->type = $membershiptype->type;
        $this->value = $membershiptype->value;
        $this->quantitysamples = $membershiptype->quantitysamples;
        $this->quantitymonths = $membershiptype->quantitymonths;
        $this->memberType = $membershiptype->memberType;
        $this->target = $membershiptype->target;
    }

    public function delete($id)
    {
        MembershipType::destroy($id);
        $this->loadMembershiptype();
    }

    public function resetForm()
    {
        $this->reset(['type', 'value', 'quantitysamples', 'target', 'image', 'quantitymonths', 'memberType']);
    }

    public function clear()
    {
        $this->reset(['type', 'value', 'quantitysamples', 'target', 'image', 'quantitymonths', 'memberType']);
    }

    public function render()
    {
        return view('livewire.admin.membershiptype-manager');
    }
}
