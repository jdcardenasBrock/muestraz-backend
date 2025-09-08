<?php

namespace App\Livewire\Client;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $selectedCategory = null;
    public $products = [];

    protected $listeners = ['filterByCategory'];

    public function mount()
    {
        $this->products = Product::orderBy('created_at', 'desc')->get();
    }

    public function filterByCategory($categoryId = null)
    {
        $this->selectedCategory = $categoryId;

        $this->products = Product::when($categoryId, function ($q) use ($categoryId) {
            $q->where('category_id', $categoryId);
        })->orderBy('created_at', 'desc')->get();
    }

    public function render()
    {
        return view('livewire.client.products');
    }
}
