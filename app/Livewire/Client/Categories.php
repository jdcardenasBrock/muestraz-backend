<?php

namespace App\Livewire\Client;

use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Categories extends Component
{
  public $categories;
    public $selectedCategory = null;

    public function mount()
    {
        $this->categories = Category::where('active', 1)->orderBy('order')->get();
    }

    public function selectCategory($categoryId = null)
    {
        $this->selectedCategory = $categoryId;
        $this->dispatch('filterByCategory', $categoryId);
    }

    public function render()
    {
        return view('livewire.client.categories');
    }
}
