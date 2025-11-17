<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Carousel;
use Illuminate\Support\Facades\DB;

class CarouselManager extends Component
{
    use WithFileUploads;

    public $title, $description, $link, $order = 0, $active = true, $target = '_self';
    public $image;
    public $carousels;
    public $carouselSelected;
    public $carouselId = null;
    public $content;
    public $layout_type = "full", $image_left, $image_right;
    protected $listeners = [
        'setRichFromEditor' => 'updateContent'
    ];


    public function updateContent($content)
    {
        $this->content = $content;
    }


    public function mount()
    {
        $this->loadCarousels();
        $this->content = "";
    }

    public function saveRich()
    {
        DB::table('titleIndex')->updateOrInsert(
            ['id' => 1],
            [
                'content' => $this->content,
            ]
        );

        session()->flash('success', 'Texto extendido guardado correctamente.');
    }

    public function loadCarousels()
    {
        $this->carousels = Carousel::orderBy('order')->get();
    }
    public function save()
    {
        $rules = [
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'order' => 'required|integer',
            'active' => 'required|boolean',
            'layout_type' => 'required|in:full,split',
        ];

        if ($this->layout_type === 'full') {
            $rules['image'] = $this->carouselId ? 'nullable|image|max:2048' : 'required|image|max:2048';
        } else {
            $rules['image_left'] = $this->carouselId ? 'nullable|image|max:2048' : 'required|image|max:2048';
            $rules['image_right'] = $this->carouselId ? 'nullable|image|max:2048' : 'required|image|max:2048';
        }

        $this->validate($rules);

        $path = null;
        $pathLeft = null;
        $pathRight = null;

        if ($this->layout_type === 'full' && $this->image) {
            $path = $this->image->store('carousels', 'public');
        }

        if ($this->layout_type === 'split') {
            if ($this->image_left) {
                $pathLeft = $this->image_left->store('carousels', 'public');
            }
            if ($this->image_right) {
                $pathRight = $this->image_right->store('carousels', 'public');
            }
        }

        $carousel = Carousel::updateOrCreate(
            ['id' => $this->carouselId],
            [
                'title' => $this->title,
                'description' => $this->description,
                'link' => $this->link,
                'order' => $this->order,
                'active' => $this->active,
                'target' => $this->target,
                'layout_type' => $this->layout_type,
                'image_path' => $path ?? Carousel::find($this->carouselId)?->image_path,
                'image_left' => $pathLeft ?? Carousel::find($this->carouselId)?->image_left,
                'image_right' => $pathRight ?? Carousel::find($this->carouselId)?->image_right,
            ]
        );

        $this->resetForm();
        $this->loadCarousels();
    }

    public function edit($id)
    {
        $this->carouselSelected = Carousel::findOrFail($id);
        $this->carouselId = $this->carouselSelected->id;
        $this->title = $this->carouselSelected->title;
        $this->description = $this->carouselSelected->description;
        $this->link = $this->carouselSelected->link;
        $this->order = $this->carouselSelected->order;
        $this->active = $this->carouselSelected->active;
        $this->target = $this->carouselSelected->target;
        $this->layout_type = $this->carouselSelected->layout_type;
        $this->dispatch('refreshTiny');
    }

    public function delete($id)
    {
        Carousel::destroy($id);
        $this->loadCarousels();
        $this->dispatch('refreshTiny');
    }

    public function resetForm()
    {
        $this->reset([
            'title',
            'description',
            'link',
            'order',
            'active',
            'layout_type',
            'target',
            'image',
            'carouselId',
            'image_left',
            'image_right',
            'carouselSelected'
        ]);
        $this->dispatch('refreshTiny');
    }

    public function render()
    {
        return view('livewire.admin.carousel-manager');
    }
}
