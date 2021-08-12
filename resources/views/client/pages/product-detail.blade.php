@extends('client.app')
@section('content')
        <div class="test">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
                    </div>
                </div>
            </div>
        </div>

        @php
            $medias = $product->medias
        @endphp
        <div class="ps-product--detail pt-60">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-10 col-md-12 col-lg-offset-1">
                        <div class="ps-product__thumbnail">
                            <div class="ps-product__preview">
                                <div class="ps-product__variants">
                                    @foreach($medias as $media)
                                        <div class="item"><img src="{{asset($media->media)}}" alt=""></div>
                                    @endforeach
                                </div>
{{--                                <a class="popup-youtube ps-product__video" href="http://www.youtube.com/watch?v=0O2aH4XLbto"><img src="{{asset('')}}images/shoe-detail/1.jpg" alt=""><i class="fa fa-play"></i></a>--}}
                            </div>
                            <div class="ps-product__image">
                                @foreach($medias as $media)
                                    <div class="item"><img class="zoom" src="{{asset($media->media)}}" alt="" data-zoom-image="{{asset($media->media)}}"></div>
                                @endforeach
                            </div>
                        </div>
                        <div class="ps-product__thumbnail--mobile">
                            <div class="ps-product__main-img">
                                <img class="preview_image_mobile" src="{{asset($product->mediaFeature->media)}}" alt="">
                            </div>
                            <div class="ps-product__preview owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="20" data-owl-nav="true" data-owl-dots="false" data-owl-item="3" data-owl-item-xs="3" data-owl-item-sm="3" data-owl-item-md="3" data-owl-item-lg="3" data-owl-duration="1000" data-owl-mousedrag="on">
                                @foreach($medias as $media)
                                    <img class="image_mobile" src="{{asset($media->media)}}" alt="">
                                @endforeach
                            </div>
                        </div>
                        <div class="ps-product__info">
                            <div class="ps-product__rating">
                                <select class="ps-rating">
                                    <option value="1">1</option>
                                    <option value="1">2</option>
                                    <option value="1">3</option>
                                    <option value="1">4</option>
                                    <option value="2">5</option>
                                </select><a href="#">(Read all 8 reviews)</a>
                            </div>
                            <h1>{{$product->name}}</h1>
                            <p class="ps-product__category">
                                <a href="#"> {{optional($product->category)->name}}</a>
                            </p>

                            @foreach($product->sizes as $key => $size)
                                <h3 @if($key != 0) style="display: none" @endif class="ps-product__price ps-product__price_{{$size->id}}">{{formatMoneyComma(sizeProductByIdSize($product, $size->id)->price_sell, 'đ')}} <del>{{formatMoneyComma(sizeProductByIdSize($product, $size->id)->price_marketing, 'đ')}}</del></h3>
                            @endforeach
                            <div class="ps-product__block ps-product__quickview">
                                <h4>QUICK REVIEW</h4>
                                <p>{!! $product->description !!}</p>
                            </div>
                            <div class="ps-product__block ps-product__size">
                                <h4>CHOOSE SIZE<a href="#">Size chart</a></h4>
                                <select class="ps-select selectpicker size_product" name="size_product_selected">
                                    @foreach($product->sizes as $size)
                                        <option value="{{$size->id}}">{{$size->size}} g</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <input class="form-control" type="number" value="1">
                                </div>
                            </div>
                            <div class="ps-product__shopping"><a class="ps-btn mb-10" href="cart.html">Add to cart<i class="ps-icon-next"></i></a>
                                <div class="ps-product__actions"><a class="mr-10" href="whishlist.html"><i class="ps-icon-heart"></i></a><a href="compare.html"><i class="ps-icon-share"></i></a></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="ps-product__content mt-50">
                            <ul class="tab-list" role="tablist">
                                <li class="active"><a href="#tab_01" aria-controls="tab_01" role="tab" data-toggle="tab">Overview</a></li>
                                <li><a href="#tab_02" aria-controls="tab_02" role="tab" data-toggle="tab">Review</a></li>
                                <li><a href="#tab_03" aria-controls="tab_03" role="tab" data-toggle="tab">PRODUCT TAG</a></li>
                                <li><a href="#tab_04" aria-controls="tab_04" role="tab" data-toggle="tab">ADDITIONAL</a></li>
                            </ul>
                        </div>
                        <div class="tab-content mb-60">
                            <div class="tab-pane active" role="tabpanel" id="tab_01">
                                {!! $product->description !!}
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab_02">
                                <p class="mb-20">1 review for <strong>Shoes Air Jordan</strong></p>
                                <div class="ps-review">
                                    <div class="ps-review__thumbnail"><img src="{{asset('')}}images/user/1.jpg" alt=""></div>
                                    <div class="ps-review__content">
                                        <header>
                                            <select class="ps-rating">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="5">5</option>
                                            </select>
                                            <p>By<a href=""> Alena Studio</a> - November 25, 2017</p>
                                        </header>
                                        <p>Soufflé danish gummi bears tart. Pie wafer icing. Gummies jelly beans powder. Chocolate bar pudding macaroon candy canes chocolate apple pie chocolate cake. Sweet caramels sesame snaps halvah bear claw wafer. Sweet roll soufflé muffin topping muffin brownie. Tart bear claw cake tiramisu chocolate bar gummies dragée lemon drops brownie.</p>
                                    </div>
                                </div>
                                <form class="ps-product__review" action="_action" method="post">
                                    <h4>ADD YOUR REVIEW</h4>
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                            <div class="form-group">
                                                <label>Name:<span>*</span></label>
                                                <input class="form-control" type="text" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Email:<span>*</span></label>
                                                <input class="form-control" type="email" placeholder="">
                                            </div>
                                            <div class="form-group">
                                                <label>Your rating<span></span></label>
                                                <select class="ps-rating">
                                                    <option value="1">1</option>
                                                    <option value="1">2</option>
                                                    <option value="1">3</option>
                                                    <option value="1">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 ">
                                            <div class="form-group">
                                                <label>Your Review:</label>
                                                <textarea class="form-control" rows="6"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <button class="ps-btn ps-btn--sm">Submit<i class="ps-icon-next"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab_03">
                                <p>Add your tag <span> *</span></p>
                                <form class="ps-product__tags" action="_action" method="post">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="">
                                        <button class="ps-btn ps-btn--sm">Add Tags</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" role="tabpanel" id="tab_04">
                                <div class="form-group">
                                    <textarea class="form-control" rows="6" placeholder="Enter your addition here..."></textarea>
                                </div>
                                <div class="form-group">
                                    <button class="ps-btn" type="button">Submit</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


{{--        list product same Category--}}

        @if($productsSameCategory->count())
            <div class="ps-section ps-section--top-sales ps-owl-root pt-40 pb-80">
                <div class="ps-container">
                    <div class="ps-section__header mb-50">
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 ">
                                <h3 class="ps-section__title" data-mask="Related item">- YOU MIGHT ALSO LIKE</h3>
                            </div>
                            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                                <div class="ps-owl-actions"><a class="ps-prev" href="#"><i class="ps-icon-arrow-right"></i>Prev</a><a class="ps-next" href="#">Next<i class="ps-icon-arrow-left"></i></a></div>
                            </div>
                        </div>
                    </div>
                    <div class="ps-section__content">
                        <div class="ps-owl--colection owl-slider" data-owl-auto="true" data-owl-loop="true" data-owl-speed="5000" data-owl-gap="30" data-owl-nav="false" data-owl-dots="false" data-owl-item="4" data-owl-item-xs="1" data-owl-item-sm="2" data-owl-item-md="3" data-owl-item-lg="4" data-owl-duration="1000" data-owl-mousedrag="on">
                            @foreach($productsSameCategory as $product)
                                @include('client.components.product_same_category')
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endif
@endsection


@section('js')
    <script>
        $(document).ready(function (){
            $('.image_mobile').click(function (){
                $('.preview_image_mobile').attr('src', $(this).attr('src'))
            })
            $('.size_product').change(function (){
                $('.ps-product__price').hide()
                $('.ps-product__price_' + $(this).val()).css("display", "block")
            })
        })
    </script>
@endsection
