<div class="ps-section--features-product ps-section masonry-root pt-100 pb-100">
    <div class="ps-container">
        <div class="ps-section__header mb-50">
            <h3 class="ps-section__title" data-mask="features">- Features Products</h3>
            <ul class="ps-masonry__filter">
                <li class="current"><a href="#" data-filter="*">All <sup>{{$categories->pluck('products_count')->sum()}}</sup></a></li>

                @foreach($categories as $category)
                    <li><a href="#" data-filter=".{{$category->slug}}">{{$category->name}} <sup>{{$category->products_count}}</sup></a></li>
                @endforeach
            </ul>
        </div>
        <div class="ps-section__content pb-50">
            <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
                <div class="ps-masonry">
                    @foreach($products as $product)
                        @include('client.components.product', ['product' => $product])
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
