<div class="ps-shoes--carousel">
    <div class="ps-shoe">
        @php
            $mediaFeature = $product->mediaFeature;
            $mediaDefault = asset('images/default_product_image.png');
            $routeProductDetail = route('client.product.show', ['product' => $product->slug])

        @endphp
        <div class="ps-shoe__thumbnail">
            <div class="ps-badge"><span>New</span></div>
            <div class="ps-badge ps-badge--sale ps-badge--2nd">
                @if(($percent = calculatePercentDiscount($product)) > 0)
                    <span>-{{$percent}}%</span>
                @endif
            </div>
            <a class="ps-shoe__favorite" href="#"><i class="ps-icon-heart"></i></a>
            <img src="{{$mediaFeature ? asset($mediaFeature->media) : $mediaDefault}}" alt="">
            <a class="ps-shoe__overlay" href="{{$routeProductDetail}}">
            </a>
        </div>
        <div class="ps-shoe__content">
            <div class="ps-shoe__variants">
                <div class="ps-shoe__variant normal">
                    @foreach($product->medias as $media)
                        <img src="{{$media->media ? asset($media->media) : $mediaDefault}}" alt="">
                    @endforeach
                </div>
                <select class="ps-rating ps-shoe__rating">
                    <option value="1">1</option>
                    <option value="1">2</option>
                    <option value="1">3</option>
                    <option value="1">4</option>
                    <option value="2">5</option>
                </select>
            </div>
            <div class="ps-shoe__detail"><a class="ps-shoe__name" href="{{$routeProductDetail}}">{{$product->name}}</a>
                <p class="ps-shoe__categories"><a href="#">{{optional($product->category)->name}}</a><span class="ps-shoe__price">
                            <del>{{formatMoney($product->price_marketing, 'đ')}}</del> {{formatMoney($product->price_sell, 'đ')}}</span>
            </div>
        </div>
    </div>
</div>
