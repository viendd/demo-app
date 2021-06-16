@extends('app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm mới danh mục</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('category.update', ['id' => $category->id])}}">
                            @csrf
                            <input type="hidden" name="id" value="{{$category->id}}">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">{{__('category.name')}}</label>
                                    <input type="text" name="name" class="form-control {{$errors->has('name') ? 'border-error' : ''}}" id="inputEmail4" placeholder="Sữa bột" value="{{$errors->has('name') ? old('name') : $category->name}}">
                                    @if($errors->has('name'))
                                        <div class="feedback-error">
                                            {{$errors->first('name')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">{{__('category.parent_id')}}</label>
                                    <select class="js-example-basic-multiple form-control" name="parent_id">
                                        <option value="0">-- {{__('category.parent_id')}} --</option>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}" {{$category->parent_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">{{__('category.status')}}</label>
                                    <select name="active" id="status" class="form-control">
                                        <option value="{{\App\Models\Category::ACTIVE}}" {{$category->active == \App\Models\Category::ACTIVE ? 'selected' : ''}}>Active</option>
                                        <option value="{{\App\Models\Category::INACTIVE}}" {{ $category->active == \App\Models\Category::INACTIVE ? 'selected' : ''}}>Inactive</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">{{__('category.add')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('css')
    <style>
        .feedback-error{
            color: red;
        }
        .border-error{
            border: 1px solid red;
        }
        .select2-container .select2-selection--single{
            height: 38px !important;
        }
    </style>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>
@endsection
