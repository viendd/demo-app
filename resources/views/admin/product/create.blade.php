@extends('app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Thêm mới sản phẩm</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">{{__('label.name')}}</label>
                                    <input type="text" name="name" value="{{getOldErrorInput('name')}}" class="form-control {{inValidInput('name', $errors) ? 'border-error' : ''}}" id="name" placeholder="Nhập tên tại đây">
                                    {!! renderTemplateError('name', $errors) !!}
                                </div>
                                <input type="hidden" name="slug">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">{{__('category.parent_id')}}</label>
                                    <select class="js-example-basic-multiple form-control" name="category_id">
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{getOldErrorInput('category_id') == $category->id ? 'selected' : ''}}><b>{{$category->name}}</b></option>
                                            @foreach($category->children as $children)
                                                <option value="{{$children->id}}" {{getOldErrorInput('category_id') == $children->id ? 'selected' : ''}}>-- {{$children->name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>

                                    {!! renderTemplateError('category_id', $errors) !!}
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input type="hidden" name="code" value="{{getOldErrorInput('code', $codeGenerate)}}">
                                    <label for="inputEmail4">{{__('product.code')}}</label>
                                    <input type="text" disabled name="code" value="{{getOldErrorInput('code', $codeGenerate)}}" class="form-control {{inValidInput('code', $errors) ? 'border-error' : ''}}" id="name" placeholder="Nhập code tại đây">
                                    {!! renderTemplateError('code', $errors) !!}
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">{{__('product.price_marketing')}}</label>
                                    <input type="text" id="price_marketing" value="{{getOldErrorInput('price_marketing') != 0 ? formatMoneyComma(getOldErrorInput('price_marketing'), '') : null }}" class="form-control {{inValidInput('price_marketing', $errors) ? 'border-error' : ''}}" placeholder="Nhập giá marketing tại đây">
                                    <input type="hidden" name="price_marketing" id="price_marketing_hidden">
                                    {!! renderTemplateError('price_marketing', $errors) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">{{__('product.price_sell')}}</label>
                                    <input type="text" id="price_sell" value="{{getOldErrorInput('price_sell') != 0 ? formatMoneyComma(getOldErrorInput('price_sell'), '') : null }}" class="form-control {{inValidInput('price_sell', $errors) ? 'border-error' : ''}}" placeholder="Nhập giá bán tại đây">
                                    <input type="hidden" name="price_sell" id="price_sell_hidden">
                                    {!! renderTemplateError('price_sell', $errors) !!}
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">{{__('category.status')}}</label>
                                    <select name="active" id="status" class="form-control">
                                        <option value="{{\App\Models\Category::ACTIVE}}">Active</option>
                                        <option value="{{\App\Models\Category::INACTIVE}}">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">{{__('product.image_feature')}}</label>
                                    <div class="uploadImage uploadImageFeature">
                                        <div class="divPreviewImage">
                                            <img class="imagePreview" accept="image/*" onclick="uploadImage(this)" src="{{asset('images/plus_image.png')}}" alt="">
                                            <button type="button" class="btnDelete" style="display: none"> <img class="image-delete" src="{{ asset('images/icon_close_img.png')}}" /></button>
                                        </div>
                                        <input type="file" class="inputUploadImage" hidden name="image_feature" accept="image/*" id="image_feature">
                                        {!! renderTemplateError('image_feature', $errors) !!}

                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">{{__('product.image_detail')}}</label>

                                    <div class="containImage">
                                        @for($i = 1; $i<= 9; $i++)
                                            <div class="uploadImage" id="{{$i}}">
                                                <div class="divPreviewImage">
                                                    <img class="imagePreview" accept="image/*" onclick="uploadImage(this)" src="{{asset('images/plus_image.png')}}" alt="">
                                                    <button type="button" class="btnDelete" style="display: none"> <img class="image-delete" src="{{ asset('images/icon_close_img.png')}}" /></button>
                                                </div>
                                                <input type="file" class="inputUploadImage" hidden name="image[]" accept="image/*" id="image_{{$i}}">
                                            </div>
                                        @endfor
                                    </div>
                                    {!! renderTemplateError('image', $errors) !!}
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">{{__('product.description')}}</label>
                                    <div class="description">
                                        <textarea name="description" id="editor1" rows="15" cols="80" class="form-control">
                                            {{old('description') ?? ''}}
                                        </textarea>
                                    </div>
                                    {!! renderTemplateError('description', $errors) !!}

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

@section('js')
    <script>
        $(document).ready(function (){
            $('#price_sell_hidden').val($('#price_sell').val().replaceAll(",", ""))

            $('#price_sell').on('change click keyup input paste',(function (event) {
                JS.formatNumber($(this).val(), '#price_sell')
                $('#price_sell_hidden').val($(this).val().replaceAll(",", ""))
            }));

            $('#price_marketing_hidden').val($('#price_marketing').val().replaceAll(",", ""))

            $('#price_marketing').on('change click keyup input paste',(function (event) {
                JS.formatNumber($(this).val(), '#price_marketing')
                $('#price_marketing_hidden').val($(this).val().replaceAll(",", ""))
            }));


            $('input.inputUploadImage').change(function (e){
                $(this).prev().find('img.imagePreview').attr('src', URL.createObjectURL(e.target.files[0]));
                $(this).prev().find('.btnDelete').show()
            })

            $(document).on('click','.btnDelete',function (e){
                $(this).prev().attr('src', '{{asset('images/plus_image.png')}}')
                $(this).parent().next().val('');
                $(this).hide()
            })
        })

        function uploadImage(item){
            $(item).parent().next().click();
        }
    </script>
@endsection

<style>
    .containImage {
        display: flex;
        justify-content: space-between;
        height: 100px;
    }

    .uploadImage {
        margin-right: 20px;
        cursor: pointer;
    }

    .divPreviewImage img.imagePreview {
        width: 100px;
        height: 100px;
    }
    button.btnDelete {
        position: absolute;
        right: 0;
        z-index: 1000;
        top : 0px
    }


    .divPreviewImage {
        position: relative;
    }

    img.image-delete {
        width: 15px;
        height: 15px;
    }

    button.btnDelete {
        width: 28px;
        height: 24px;
        border: none;
        border-radius: 3px;
    }


    .uploadImage.uploadImageFeature .imagePreview {
        height: 150px;
        width: 150px;
    }
</style>
