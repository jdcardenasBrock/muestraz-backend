<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\City;

class CityManager extends Component
{
    use WithFileUploads;

    public $state_Id, $codigo_dane, $nombre, $target = '_self';
    public $city;
    public $cityId = null;

    public function mount()
    {
        $this->loadCity();
    }

    public function loadCity()
    {
        $this->city = City::orderBy('nombre')->get();
    }

    public function save()
    {
        $this->validate([
            'state_id' => 'required|integer',
            'codigo_dane' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'target' => 'required|in:_self,_blank',            
        ]);

        $city = City::updateOrCreate(
            ['id' => $this->cityId],
            [
                'state_id' => $this->state_id,
                'codigo_dane' => $this->codigo_dane,
                'nombre' => $this->nombre,
                'target' => $this->target,
            ]
        );

        $this->resetForm();
        $this->loadCity();
    }

    public function edit($id)
    {
        $city = City::findOrFail($id);
        $this->cityId = $city->id;
        $this->codigo_dane = $city->codigo_dane;
        $this->nombre = $city->nombre;
    }

    public function delete($id)
    {
        City::destroy($id);
        $this->loadCity();
    }

    public function resetForm()
    {
        $this->reset(['state_id','codigo_dane', 'nombre', 'target',  'cityId']);
    }

    public function render()
    {
        return view('livewire.admin.city-manager');
    }
}