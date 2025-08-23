<?php

namespace App\Livewire\Client;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function mount()
    {
        $this->categories = DB::table('categories')
            ->where('active', 1)
            ->orderBy('order')
            ->get();
    }
    public function render()
    {
        return view('livewire.client.categories');
    }
}
