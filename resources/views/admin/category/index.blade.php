@extends('app')

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
                        @php
                            $success = session('message_success');
                        @endphp
                        @if($success)
                            <div class="alert alert-success alert-dismissible fade show">
                                {{$success}}
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                        @endif
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
                                    <a data-id="{{$category->id}}" class="btn btn-danger" onclick="showConfirm(this)">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @include('components.paginate', ['totalPage' => $categories->lastPage(), 'currentPage' => $categories->currentPage()])
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                            <i class="fa fa-history"></i> Updated 3 minutes ago
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function showConfirm(item){
        JS.modalConfirmDelete($(item).attr("data-id"), '/admin/category/delete/'+$(item).attr("data-id"), 'POST');
    }
</script>
