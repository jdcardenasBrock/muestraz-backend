<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\City;
use App\Models\State;
use Livewire\WithPagination;

class CityManager extends Component
{
    use WithFileUploads;
use WithPagination;
    public $state_id, $state, $codigo_dane, $nombre, $costoenvio, $target = '_self';
    public $city;
    public $datos;
    public $search = '';
    public $cityId = null;
    public $states;

    public function mount()
    {
        $this->states = State::orderBy('nombre')->get();
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function save()
    {
        $this->validate([
            'state_id' => 'required|integer',
            'codigo_dane' => 'required|string|max:255',
            'nombre' => 'required|string|max:255',
            'costoenvio' => 'required|numeric|min:0.01',
            'target' => 'required|in:_self,_blank',
        ]);

        $city = City::updateOrCreate(
            ['id' => $this->cityId],
            [
                'state_id' => $this->state_id,
                'codigo_dane' => $this->codigo_dane,
                'nombre' => $this->nombre,
                'costoenvio' => $this->costoenvio,
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
        $this->state_id = $city->state_id;
        $this->codigo_dane = $city->codigo_dane;
        $this->nombre = $city->nombre;
        $this->costoenvio = $city->costoenvio;
    }

    public function delete($id)
    {
        City::destroy($id);
        $this->loadCity();
    }

    public function resetForm()
    {
        $this->reset(['state_id', 'state', 'codigo_dane', 'nombre', 'costoenvio', 'target',  'cityId']);
    }

    public function render()
    {
       $cities = City::with('state')
            ->when($this->search, function ($query) {
                $query->where('nombre', 'like', '%' . $this->search . '%')
                    ->orWhere('codigo_dane', 'like', '%' . $this->search . '%');
            })
            ->orderBy('nombre')
            ->paginate(15);

        return view('livewire.admin.city-manager', [
            'cities' => $cities
        ]);
    }
}
