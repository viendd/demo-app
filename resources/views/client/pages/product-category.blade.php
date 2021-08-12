@extends('client.app')
@section('content')
    @php
        $routeName = \Route::currentRouteName();
        $slugCategorySelected = str_replace("category/", "", request()->path());
        $queryCategories = ($routeName == 'client.product.productsByCategory')  ? $slugCategorySelected : request()->query('categories');
        $queryPrice = request()->query('prices');
        $queryBrands = request()->query('brands');
        $querySizes = request()->query('sizes')
    @endphp

    <div class="ps-products-wrap pt-80 pb-80">
        <div class="ps-products" data-mh="product-listing">
            <div class="ps-product-action">
                @include('client.components.sort_by', ['productCategory' => $productsCategory])
                @include('client.components.pagination', ['totalPage' => $productsCategory->lastPage(), 'currentPage' => $productsCategory->currentPage(), 'route' => route('client.product.filterProduct')])
            </div>
            <div class="ps-product__columns">
                @foreach($productsCategory as $product)
                    <div class="ps-product__column">
                            @include('client.components.product', ['product' => $product])
                    </div>
                @endforeach
            </div>
            <div class="ps-product-action">
                @include('client.components.sort_by', ['productCategory' => $productsCategory])
                @include('client.components.pagination', ['totalPage' => $productsCategory->lastPage(), 'currentPage' => $productsCategory->currentPage(), 'route' => route('client.product.filterProduct')])
            </div>
        </div>
        <div class="ps-sidebar" data-mh="product-listing">
            @include('client.components.area_categories_in_product_category', ['categories'=> $categories])
            @include('client.components.area_filter_price')
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Sky Brand</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li class="current"><a href="product-listing.html">Nike(521)</a></li>
                        <li><a href="product-listing.html">Adidas(76)</a></li>
                        <li><a href="product-listing.html">Baseball(69)</a></li>
                        <li><a href="product-listing.html">Gucci(36)</a></li>
                        <li><a href="product-listing.html">Dior(108)</a></li>
                        <li><a href="product-listing.html">B&G(108)</a></li>
                        <li><a href="product-listing.html">Louis Vuiton(47)</a></li>
                    </ul>
                </div>
            </aside>
            <aside class="ps-widget--sidebar ps-widget--category">
                <div class="ps-widget__header">
                    <h3>Width</h3>
                </div>
                <div class="ps-widget__content">
                    <ul class="ps-list--checked">
                        <li class="current"><a href="product-listing.html">Narrow</a></li>
                        <li><a href="product-listing.html">Regular</a></li>
                        <li><a href="product-listing.html">Wide</a></li>
                        <li><a href="product-listing.html">Extra Wide</a></li>
                    </ul>
                </div>
            </aside>
            <div class="ps-sticky desktop">
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Size</h3>
                    </div>
                    <div class="ps-widget__content">
                        <table class="table ps-table--size">
                            <tbody>
                            <tr>
                                <td class="active">3</td>
                                <td>5.5</td>
                                <td>8</td>
                                <td>10.5</td>
                                <td>13</td>
                            </tr>
                            <tr>
                                <td>3.5</td>
                                <td>6</td>
                                <td>8.5</td>
                                <td>11</td>
                                <td>13.5</td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>6.5</td>
                                <td>9</td>
                                <td>11.5</td>
                                <td>14</td>
                            </tr>
                            <tr>
                                <td>4.5</td>
                                <td>7</td>
                                <td>9.5</td>
                                <td>12</td>
                                <td>14.5</td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>7.5</td>
                                <td>10</td>
                                <td>12.5</td>
                                <td>15</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </aside>
                <aside class="ps-widget--sidebar">
                    <div class="ps-widget__header">
                        <h3>Color</h3>
                    </div>
                    <div class="ps-widget__content">
                        <ul class="ps-list--color">
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <div class="ps-subscribe">
        <div class="ps-container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12 ">
                    <h3><i class="fa fa-envelope"></i>Sign up to Newsletter</h3>
                </div>
                <div class="col-lg-5 col-md-7 col-sm-12 col-xs-12 ">
                    <form class="ps-subscribe__form" action="do_action" method="post">
                        <input class="form-control" type="text" placeholder="">
                        <button>Sign up now</button>
                    </form>
                </div>
                <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12 ">
                    <p>...and receive  <span>$20</span>  coupon for first shopping.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="ps-footer bg--cover" data-background="images/background/parallax.jpg">
        <div class="ps-footer__content">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--info">
                            <header><a class="ps-logo" href="index.html"><img src="{{asset('')}}images/logo-white.png" alt=""></a>
                                <h3 class="ps-widget__title">Address Office 1</h3>
                            </header>
                            <footer>
                                <p><strong>460 West 34th Street, 15th floor, New York</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--info second">
                            <header>
                                <h3 class="ps-widget__title">Address Office 2</h3>
                            </header>
                            <footer>
                                <p><strong>PO Box 16122 Collins  Victoria 3000 Australia</strong></p>
                                <p>Email: <a href='mailto:support@store.com'>support@store.com</a></p>
                                <p>Phone: +323 32434 5334</p>
                                <p>Fax: ++323 32434 5333</p>
                            </footer>
                        </aside>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Find Our store</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--link">
                                    <li><a href="#">Coupon Code</a></li>
                                    <li><a href="#">SignUp For Email</a></li>
                                    <li><a href="#">Site Feedback</a></li>
                                    <li><a href="#">Careers</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Get Help</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--line">
                                    <li><a href="#">Order Status</a></li>
                                    <li><a href="#">Shipping and Delivery</a></li>
                                    <li><a href="#">Returns</a></li>
                                    <li><a href="#">Payment Options</a></li>
                                    <li><a href="#">Contact Us</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-4 col-xs-12 ">
                        <aside class="ps-widget--footer ps-widget--link">
                            <header>
                                <h3 class="ps-widget__title">Products</h3>
                            </header>
                            <footer>
                                <ul class="ps-list--line">
                                    <li><a href="#">Shoes</a></li>
                                    <li><a href="#">Clothing</a></li>
                                    <li><a href="#">Accessries</a></li>
                                    <li><a href="#">Football Boots</a></li>
                                </ul>
                            </footer>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
        <div class="ps-footer__copyright">
            <div class="ps-container">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <p>&copy; <a href="#">SKYTHEMES</a>, Inc. All rights Resevered. Design by <a href="#"> Alena Studio</a></p>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                        <ul class="ps-social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('js')
    <script>
        $(document).ready(function (){
            $('.image_mobile').click(function (){
                $('.preview_image_mobile').attr('src', $(this).attr('src'))
            })


            $('.category').click(function (){
                let arrayCategorySelected = {!! json_encode($queryCategories ? explode(',', $queryCategories) : []) !!};

                let slug = $(this).data("slug");
                let index = arrayCategorySelected.indexOf(slug)
                if ( index !== -1){
                    arrayCategorySelected.splice(index, 1);
                    $(this).parent().attr('class', '')
                }else{
                    arrayCategorySelected.push(slug)
                    $(this).parent().attr('class', 'current')
                }
                let categories = 'categories=' + arrayCategorySelected.join()
                let prices = 'prices=' + '{{$queryPrice}}'
                let brands = 'brands=' + '{{$queryBrands}}'
                let sizes = 'sizes=' + '{{$querySizes}}'

                window.location = '{{route('client.product.filterProduct')}}' + JS.generateQueryStringFilterProduct(categories, prices, brands, sizes)
            })

            $('#filter_price_range').click(function (){
                let categories = 'categories=' + '{{$queryCategories}}'
                let price_min = $('.ac-slider__min').attr('data-price-min')
                let price_max = $('.ac-slider__max').attr('data-price-max')
                let prices = 'prices=' + price_min  + ',' + price_max
                let brands = 'brands=' + '{{$queryBrands}}'
                let sizes = 'sizes=' + '{{$querySizes}}'
                window.location = '{{route('client.product.filterProduct')}}' + JS.generateQueryStringFilterProduct(categories, prices, brands, sizes)
            })
        })
    </script>
@endsection
