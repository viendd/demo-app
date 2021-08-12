<div class="grid-item {{optional($product->category)->slug}}">
    <div class="grid-item__content-wrapper">
        <div class="ps-shoe mb-30">
            <div class="ps-shoe__thumbnail">
                <div class="ps-badge"><span>New</span></div>
                @php
                    $mediaFeature = $product->mediaFeature;
                    $routeProductDetail = route('client.product.show', ['product' => $product->slug])
                @endphp
                <div class="ps-badge ps-badge--sale ps-badge--2nd">
                    @if(($percent = calculatePercentDiscount($product)) > 0)
                    <span>-{{$percent}}%</span>
                    @endif
                </div>
                <a class="ps-shoe__favorite" href="{{$routeProductDetail}}"><i class="ps-icon-heart"></i></a><img src="{{ $mediaFeature ? asset($mediaFeature->media) : '' }}" alt=""><a class="ps-shoe__overlay" href="{{$routeProductDetail}}"></a>
            </div>
            <div class="ps-shoe__content">
                <div class="ps-shoe__variants">
                    <div class="ps-shoe__variant normal">
                        @foreach($product->medias as $media)
                            <img src="{{asset($media->media)}}" alt="product detail">
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
                <div class="ps-shoe__detail">
                    <div class="name_and_brand">
                        <a class="ps-shoe__name" href="{{$routeProductDetail}}">{{$product->name}}</a>
                        <span class="brand">{{$product->brand->name}}</span>
                    </div>
                    <p class="ps-shoe__categories"><a href="#">{{optional($product->category)->name}}</a>
                        <span class="ps-shoe__price">
                            <del>{{formatMoneyComma(sizeProductFirst($product)->price_marketing, 'đ')}}</del> {{formatMoneyComma(sizeProductFirst($product)->price_sell, 'đ')}}
                        </span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .brand{
        float: right;
    }
    .ps-shoe .ps-shoe__price{
        right: 0 !important;
    }
</style>
