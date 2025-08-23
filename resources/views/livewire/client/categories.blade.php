<div>

    <div class="cate-list">
        <ul class="categories-list">
            @foreach ($categories as $category)
                <li>
                    <a href="#">
                        <div class="cart-img mb-2">
                            <img class="media-object img-responsive" src="{{ asset('storage/' . $category->image_path) }}"
                                alt="{{ $category->name }}">
                        </div>
                        <h5><b>{{ $category->name }}</b></h5>
                    </a>
                </li>
            @endforeach
        </ul>
    </div>

</div>
