<?php

namespace App\Livewire\Admin;

use App\Models\ProductSegmentation;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithFileUploads;
use GuzzleHttp\Handler\Proxy;

class ProductSegmentationManager extends Component
{
    use WithFileUploads;

    public $productid;
    public $imageUno;
    public $imageDos;
    public $imageTres;

    public function mount($productid = null)
    {
       //dd($productid);
    }

    public function render()
    {
        //dd($productid);
        return view('livewire.admin.productsegmentation-manager');
    }
}

