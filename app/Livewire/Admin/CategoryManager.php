<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Category;

class CategoryManager extends Component
{
    use WithFileUploads;

    public $name, $order, $active;
    public $categories;
    public $categoryId = null;

    public function mount()
    {
        $this->loadCategory();
    }

    public function loadCategory()
    {
        $this->categories = Category::orderBy('order')->get();
    }

    public function save()
    {
        $this->validate([
            'name' => 'nullable|string|max:255',
            'order' => 'required|integer',
            'active' => 'required|boolean',
            
        ]);

        $category = Category::updateOrCreate(
            ['id' => $this->categoryId],
            [
                'name' => $this->title,
                'order' => $this->order,
                'active' => $this->active,
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
    }

    public function delete($id)
    {
        Category::destroy($id);
        $this->loadCategory();
    }

    public function resetForm()
    {
        $this->reset(['name', 'order', 'active', 'categoryId']);
    }

    public function render()
    {
        return view('livewire.admin.category-manager');
    }
}