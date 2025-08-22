<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;


class ProductManager extends Component
{
    use WithFileUploads;

    public $nombre, $category, $category_id, $estado, $cantidadinventario, $imagenuno_path, $target = '_self';
    public $product;
    //public $category;
    public $cityId = null;

    public function mount()
    {
        $this->loadProduct();
    }

        public function loadProduct()
    {
        $this->product = Product::orderBy('nombre')->get();
        $this->category = Category::orderBy('name')->get();
    }

    public function save()
    {
        $this->resetForm();
        $this->loadCity();
    }

   public function delete($id)
    {
        Product::destroy($id);
        $this->loadProduct();
    }

    public function resetForm()
    {
        $this->reset(['name', 'category_id','estado', 'imagenuno_path', 'target',  'productId']);
    }

    public function render()
    {
        return view('livewire.admin.product-manager');
    }
}
