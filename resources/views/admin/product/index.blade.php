@extends('app')
@section('title')
    Product
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Danh sách sản phẩm</h5>
                        <div class="add_category">
                            <a href="{{route('admin.product.create')}}" class="btn btn-primary">Thêm mới</a>
                        </div>
                    </div>

                    <div class="card-body ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Mã sản phẩm</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                                @forelse($products as $product)
                                    <tr>
                                        <td>
                                            {{$product->id}}
                                        </td>

                                        <td>
                                            {{$product->name}}
                                        </td>

                                        <td>
                                            {{$product->code}}
                                        </td>
                                        <td>
                                            @php
                                                $targetImage = ($mediaFeature = $product->mediaFeature) ? url($mediaFeature->media) : asset('images/default_product_image.png')
                                            @endphp
                                            <a target="_blank" href="{{$targetImage}}">
                                                <img src="{{$targetImage}}" alt="Image feature" class="image_feature" style="width: 250px; height: 250px">
                                            </a>
                                        </td>
                                        <td>
                                            {{optional($product->category)->name}}
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-border">Sửa</a>
                                            <a data-id="{{$product->id}}" class="btn btn-danger" onclick="showConfirm(this, '{{route('admin.product.delete', ['id' => $product->id])}}', 'POST')">Xóa</a>
                                        </td>
                                    </tr>
                                @empty
                                    <p>No products</p>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @include('components.paginate', ['totalPage' => $products->lastPage(), 'currentPage' => $products->currentPage(), 'route' => route('admin.product.index')])
                </div>
            </div>
        </div>
    </div>
@endsection
