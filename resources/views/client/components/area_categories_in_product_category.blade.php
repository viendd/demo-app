<aside class="ps-widget--sidebar ps-widget--category">
    <div class="ps-widget__header">
        <h3>Category</h3>
    </div>
    <div class="ps-widget__content">
        <ul class="ps-list--checked">
            @foreach($categories as $category)
                <li class="{{in_array($category->slug, explode(',',$queryCategories)) ? 'current' : ''}}">
                    <a class="category" data-slug="{{$category->slug}}">
                        {{$category->name}} ( {{$category->products_count}} )
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
</aside>
