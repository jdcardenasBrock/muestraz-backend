<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Carousel;

class CarouselManager extends Component
{
    use WithFileUploads;

    public $title, $description, $link, $order = 0, $active = true, $target = '_self';
    public $image;
    public $carousels;
    public $carouselId = null;

    public function mount()
    {
        $this->loadCarousels();
    }

    public function loadCarousels()
    {
        $this->carousels = Carousel::orderBy('order')->get();
    }

    public function save()
    {
        $this->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'link' => 'nullable|url',
            'order' => 'required|integer',
            'active' => 'required|boolean',
            'target' => 'required|in:_self,_blank',
            'image' => $this->carouselId ? 'nullable|image|max:2048' : 'required|image|max:2048',
        ]);

        $path = $this->image ? $this->image->store('carousels', 'public') : null;

        $carousel = Carousel::updateOrCreate(
            ['id' => $this->carouselId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'link' => $this->link,
                'order' => $this->order,
                'active' => $this->active,
                'target' => $this->target,
                'image_path' => $path ?? Carousel::find($this->carouselId)?->image_path,
            ]
        );

        $this->resetForm();
        $this->loadCarousels();
    }

    public function edit($id)
    {
        $carousel = Carousel::findOrFail($id);
        $this->carouselId = $carousel->id;
        $this->title = $carousel->title;
        $this->description = $carousel->description;
        $this->link = $carousel->link;
        $this->order = $carousel->order;
        $this->active = $carousel->active;
        $this->target = $carousel->target;
    }

    public function delete($id)
    {
        Carousel::destroy($id);
        $this->loadCarousels();
    }

    public function resetForm()
    {
        $this->reset(['title', 'description', 'link', 'order', 'active', 'target', 'image', 'carouselId']);
    }

    public function render()
    {
        return view('livewire.admin.carousel-manager');
    }
}