<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Howitwork;
use Illuminate\Support\Facades\DB;

class HowitworkManager extends Component
{
    use WithFileUploads;

    public $content;
    public $id = null;
    public $howitwork;
     protected $listeners = [
        'setRichFromEditor' => 'updateContent'
    ];
    
    public function updateContent($content)
    {
        $this->content = $content;
        
    }

    public function mount()
    {
        $this->loadHowitwork();
    }

    public function loadHowitwork()
    {
        $this->howitwork = Howitwork::orderBy('id')->first();
        $this->content = $this->howitwork->content;
    }

    public function saveRich()
    {
        DB::table('howitworks')->updateOrInsert(
            ['id' => 1],
            [
                'content' => $this->content,
            ]
        );

        session()->flash('success', 'Texto extendido guardado correctamente.');
    }

        public function resetForm()
    {
        $this->reset(['content', 'id']);
        $this->dispatch('refreshTiny');
    }

    public function render()
    {
        return view('livewire.admin.howitwork-manager');
    }
}