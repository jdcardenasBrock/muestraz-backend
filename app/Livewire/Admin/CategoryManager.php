<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;

class CategoryManager extends Component
{
    use WithFileUploads;

    public $name, $order, $active=true, $target = '_self';
    public $image;
    public $category;
    public $categoryId = null;

    public function mount()
    {
        $this->loadCategory();
    }

    public function loadCategory()
    {
        $this->category = Category::orderBy('order')->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'active' => 'required|boolean',
            'target' => 'required|in:_self,_blank',
            'image' => $this->categoryId ? 'nullable|image|max:2048' : 'required|image|max:2048',
            
        ]);

        $path = $this->image ? $this->image->store('categories', 'public') : null;

        $category = Category::updateOrCreate(
            ['id' => $this->categoryId],
            [
                'name' => $this->name,
                'order' => $this->order,
                'active' => $this->active,
                'target' => $this->target,
                'image_path' => $path ?? Category::find($this->categoryId)?->image_path,
            ]
        );

        $this->resetForm();
        $this->loadCategory();
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $this->categoryId = $category->id;
        $this->name = $category->name;
        $this->order = $category->order;
        $this->active = $category->active;
        $this->target = $category->target;
    }

    public function delete($id)
    {
        Category::destroy($id);
        $this->loadCategory();
    }

    public function resetForm()
    {
        $this->reset(['name', 'order', 'active', 'target', 'image', 'categoryId']);
    }

    public function clear(){
        $this->reset(['name', 'order', 'active', 'target', 'image', 'categoryId']);
    }

    public function render()
    {
        return view('livewire.admin.category-manager');
    }
}