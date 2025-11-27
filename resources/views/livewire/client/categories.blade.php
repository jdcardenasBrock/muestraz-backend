<div>
    <div class="acces-ser">
        <div class="categories-carousel owl-carousel">

            <!-- Todas las categorías -->
            <div class="category-card">
                <a href="#." 
                   wire:click="selectCategory(null)" 
                   class="{{ $selectedCategory === null ? 'active' : '' }}">
                    <img src="{{asset('web/images/all.png')}}"  alt="Todas">
                    <div class="category-title">
                        <h5>Todas</h5>
                    </div>
                </a>
            </div>

            @foreach ($categories as $item)
                <div class="category-card">
                    <a href="#." 
                       wire:click="selectCategory({{ $item->id }})"
                       class="{{ $selectedCategory === $item->id ? 'active' : '' }}">
                        <img src="{{ Storage::url($item->image_path) }}" alt="{{ $item->name }}">
                        <div class="category-title">
                            <h5>{{ $item->name }}</h5>
                        </div>
                    </a>
                </div>
            @endforeach


        </div>
    </div>
</div>
