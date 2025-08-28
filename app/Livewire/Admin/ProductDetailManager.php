<?php

namespace App\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product;
use App\Models\ProductDetail;


class ProductDetailManager extends Component
{
    use WithFileUploads;

    public $productId, $category, $nombre, $category_id, $estado, $cantidadinventario, $imagenuno_path, $target = '_self';
    public $product;
    

    public function mount($product)
    {
       
       $this->$product = Product:: find($product->id)->get(); 
       $this->category = Category::orderBy('name')->get();
             
    }

     /*public function save()
    {
        $this->resetForm();
    }*/
 
   public function delete($id)
    {
        Product::destroy($id);
    }

    public function resetForm()
    {
        $this->reset(['name', 'category_id','estado', 'imagenuno_path', 'target',  'productId']);
    }

    public function render()
    {
        return view('livewire.admin.productdetail-manager');
    }
}
