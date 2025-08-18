<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\State;

class StateManager extends Component
{
    use WithFileUploads;

    public $codigo_dane, $nombre, $target = '_self';
    /*public $image;*/
    public $state;
    public $stateId = null;

    public function mount()
    {
        $this->loadState();
    }

    public function loadState()
    {
        $this->state = State::orderBy('nombre')->get();
    }

    public function save()
    {
        $this->validate([
            'codigo_dane' => 'nullable|string|max:255',
            'nombre' => 'nullable|string|max:255',
            'target' => 'required|in:_self,_blank',            
        ]);

        /*$path = $this->image ? $this->image->store('states', 'public') : null;*/

        $state = State::updateOrCreate(
            ['id' => $this->stateId],
            [
                'codigo_dane' => $this->codigo_dane,
                'nombre' => $this->nombre,
                'target' => $this->target,
            ]
        );

        $this->resetForm();
        $this->loadCategory();
    }

    public function edit($id)
    {
        $state = State::findOrFail($id);
        $this->stateId = $state->id;
        $this->codigo_dane = $state->codigo_dane;
        $this->nombre = $state->nombre;
    }

    public function delete($id)
    {
        State::destroy($id);
        $this->loadCategory();
    }

    public function resetForm()
    {
        $this->reset(['codigo_dane', 'nombre', 'target',  'stateId']);
    }

    public function render()
    {
        return view('livewire.admin.state-manager');
    }
}