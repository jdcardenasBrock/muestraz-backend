<?php

namespace App\Livewire\Admin;


use App\Models\Product;
use App\Models\Segmentation;
use Livewire\Component;
use Livewire\WithFileUploads;
use GuzzleHttp\Handler\Proxy;

class ProductSegmentationManager extends Component
{
    use WithFileUploads;

    public $productid, $segmentation, $alluser,$age, $agesymbol, 
    $maritalstatus,$children,$pet,$vehiculetype,$gender;
   

    public function mount($productid = null)
    {
        
        //siguiente paso crear codigo para validar cuando el registro es nuevo....

        
        $segmentation = Segmentation::where('product_id',$productid)->first();
        $this->alluser = $segmentation->alluser;
        $this->age = $segmentation->age;
        $this->agesymbol = $segmentation->agesymbol;
        $this->maritalstatus = $segmentation->maritalstatus;
        $this->children = $segmentation->children;
        $this->pet = $segmentation->pet;
        $this->vehiculetype = $segmentation->vehiculetype;
        $this->gender = $segmentation->gender;
    }

    public function render()
    {
        return view('livewire.admin.productsegmentation-manager');
    }
}

