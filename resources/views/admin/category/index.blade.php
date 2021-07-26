@extends('app')
@section('title')
    Category
@endsection
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header ">
                        <h5 class="card-title">Danh sách category</h5>
                        <div class="add_category">
                            <a href="{{route('category.create')}}" class="btn btn-primary">Thêm mới</a>
                        </div>
                    </div>

                    <div class="card-body ">
                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Danh mục cha</th>
                                <th scope="col">Hành động</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $key => $category)
                            <tr>
                                <th scope="row">{{++$key}}</th>
                                <td>{{$category->name}}</td>
                                <td>{{$category->slug}}</td>
                                <td>{{$category->parent ? $category->parent->name : 'Danh mục cha'}}</td>
                                <td>
                                    <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-border">Sửa</a>
                                    <a data-id="{{$category->id}}" class="btn btn-danger" onclick="showConfirm(this, '{{route('category.delete', ['id' => $category->id])}}', 'POST')">Xóa</a>
                                </td>
                            </tr>
                                @foreach($category->children as $children)
                                    <tr>
                                        <th scope="row"></th>
                                        <td>{{$children->name}}</td>
                                        <td>{{$children->slug}}</td>
                                        <td>{{$children->parent ? $children->parent->name : 'Danh mục cha'}}</td>
                                        <td>
                                            <a href="{{route('category.edit', ['id' => $children->id])}}" class="btn btn-border">Sửa</a>
                                            <a data-id="{{$children->id}}" class="btn btn-danger" onclick="showConfirm(this, '{{route('category.delete', ['id' => $children->id])}}', 'POST')">Xóa</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
{{--                    @include('components.paginate', ['totalPage' => $categories->lastPage(), 'currentPage' => $categories->currentPage(), 'route' => route('category.index')])--}}
                </div>
            </div>
        </div>
    </div>
@endsection

