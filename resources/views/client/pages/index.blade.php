@extends('client.app')
@section('content')

    @include('client.layouts.banner')
    @include('client.components.area_product_feature', ['products' => $products])
    @include('client.layouts.section_offer')
    @include('client.components.area_product_sale')
    @include('client.layouts.home-testimonial')

    @include('client.layouts.home_blog')
    @include('client.layouts.subscribe')
    @include('client.layouts.footer')

@endsection
