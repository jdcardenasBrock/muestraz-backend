<div>
    <div class="acces-ser">
        <!-- Heading -->
        <div class="row">
            <div class="row g-4 justify-content-center">
                @foreach ($categories as $category)
                    <div class="col-sm-4 col-md-3">
                        <a href="{{ route('dashboard') }}">
                            <div class="category-card text-center">
                                <img src="{{ Storage::url($category->image_path) }}" alt="{{ $category->name }}"
                                    class="img-fluid">
                                <div class="category-title">
                                    <h5>{{ $category->name }}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
