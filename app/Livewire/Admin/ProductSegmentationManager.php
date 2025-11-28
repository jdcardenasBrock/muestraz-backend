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
    $maritalstatus,$children,$pet,$vehicletype,$gender,$product_id;
    public $id = NULL;
   

    public function mount($productid = null)
    {
        
        if ($productid) {
            $this->productid = $productid;
            $segmentation = Segmentation::where('product_id',$productid)->first();

            if ($segmentation) {
                $this->edit($productid); // reutiliza el método que ya tienes
            }
        }      
    }

    public function save()
    {

        try 
        {
         $segmentation = Segmentation::updateOrCreate(
            ['id' => $this->id],
            [
                    'product_id' => $this->productid,
                    'alluser'=> $this->alluser,
                    'agesymbol'=> ($this->agesymbol==='null') ? null : $this->agesymbol,
                    'age'=> ($this->age==='0') ? null : $this->age,  
                    'maritalstatus'=> ($this->maritalstatus==='null') ? null : $this->maritalstatus,
                    'children'=> $this->children,
                    'pet'=> $this->pet,
                    'vehicletype'=> ($this->vehicletype==='null') ? null : $this->vehicletype,
                    'gender'=> ($this->gender==='null') ? null : $this->gender,
            ]);
    
            session()->flash('success', 'Segmento guardado correctamente ✅');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al guardar el segmento: ' . $e->getMessage());
        }     
    }

    public function edit($productid)
    {
        $segmentation = Segmentation::where('product_id',$productid)->first();
        $this->id = $segmentation->id;
        $this->productid = $segmentation->product_id;
        $this->alluser = $segmentation->alluser;
        $this->age = $segmentation->age;
        $this->agesymbol = $segmentation->agesymbol;
        $this->maritalstatus = $segmentation->maritalstatus;
        $this->children = $segmentation->children;
        $this->pet = $segmentation->pet;
        $this->vehicletype = $segmentation->vehicletype;
        $this->gender = $segmentation->gender;
       
    }

    public function delete($productid)
    {
        Product::destroy($productid);
    }

    public function resetForm()
    {
        $this->reset([
                'id',
                'product_id',
                'alluser',
                'age',
                'maritalstatus',
                'children',
                'pet',
                'vehicletype',
                'gender',
             ]);
    }

    public function render()
    {
        return view('livewire.admin.productsegmentation-manager');
    }
}

