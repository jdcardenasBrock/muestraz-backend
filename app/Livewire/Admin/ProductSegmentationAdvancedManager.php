<?php

namespace App\Livewire\Admin;


use App\Models\Product;
use App\Models\SegmentationAdvanced;
use App\Models\QuizQuestion;
use App\Models\QuizOption;
use Livewire\Component;
use Livewire\WithFileUploads;
use GuzzleHttp\Handler\Proxy;

class ProductSegmentationAdvancedManager extends Component
{
    use WithFileUploads;

    public $ProductSegmentationAdvanced, $segmentation, $question_id, $option_id, $question, 
    $option, $productid,$product_id;
    public $id = NULL;
   

    public function mount()
    {
       $this->loadSegmentationAdvanced($productid = null);
    }

    public function loadSegmentationAdvanced()
    {

        $this->ProductSegmentationAdvanced = SegmentationAdvanced::where('product_id', $this->productid)->get();
        $this->question = QuizQuestion::orderBy('question')->get();
        $this->option = QuizOption::orderBy('option_text')->get();
    }

    public function save()
    {

        $this->validate([
            'productid' => 'required|integer',
            'question_id' => 'required|integer',
            'option_id' => 'required|integer',
        ]);
        
        $segmentation = SegmentationAdvanced::updateOrCreate(
            ['id' => $this->id],
            [
                'product_id' => $this->productid,
                'question_id' => $this->question_id,    
                'option_id' => $this->option_id,
            ]);  
        
        $this->resetForm();
        $this->loadSegmentationAdvanced();
    }


    public function edit($id)
    {
        $segmentation = SegmentationAdvanced::where('id',$id)->first();
            $this->id = $segmentation->id;
            $this->product_id = $segmentation->product_id;
            $this->question_id = $segmentation->question_id;
            $this->option_id = $segmentation->option_id;
       
    }

    public function delete($id)
    {
        SegmentationAdvanced::destroy($id);
        $this->loadSegmentationAdvanced();
    }

    public function resetForm()
    {
        $this->reset(['id', 'product_id', 'question_id', 'option_id']);
    }

    public function render()
    {
        return view('livewire.admin.productsegmentationadvanced-manager');
    }
}

