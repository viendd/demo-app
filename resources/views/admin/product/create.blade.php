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
                        <form method="POST" id="storeProduct" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">{{__('label.name')}}</label>
                                    <input oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" type="text" required name="name" value="{{getOldErrorInput('name')}}" class="form-control {{inValidInput('name', $errors) ? 'border-error' : ''}}" id="name" placeholder="Nhập tên tại đây">
                                </div>
                                <input type="hidden" name="slug">
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">{{__('category.parent_id')}}</label>
                                    <select required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" class="js-example-basic-multiple form-control" name="category_id">
                                        <option value="">-- Chọn danh mục --</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}" {{getOldErrorInput('category_id') == $category->id ? 'selected' : ''}}><b>{{$category->name}}</b></option>
                                            @foreach($category->children as $children)
                                                <option value="{{$children->id}}" {{getOldErrorInput('category_id') == $children->id ? 'selected' : ''}}>-- {{$children->name}}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <input required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" type="hidden" name="code" value="{{getOldErrorInput('code', $codeGenerate)}}">
                                    <label for="inputEmail4">{{__('product.code')}}</label>
                                    <input type="text" disabled name="code" value="{{getOldErrorInput('code', $codeGenerate)}}" class="form-control {{inValidInput('code', $errors) ? 'border-error' : ''}}" id="code" placeholder="Nhập code tại đây">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Thương hiệu</label>
                                    <select required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" class="js-example-basic-multiple form-control" name="brand_id">
                                        <option value="">-- Chọn thương hiệu --</option>
                                        @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="area-specific-weight">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">Khối lượng</label>
                                        <input required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" type="text" name="specific_weight[]" placeholder="Nhập khối lượng tại đây (g)" class="specific_weight form-control {{inValidInput('specific_weight', $errors) ? 'border-error' : ''}}">
                                    </div>
                                    <div class="form-group col-md-6">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">{{__('product.price_marketing')}}</label>
                                        <input required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" type="text" value="{{getOldErrorInput('price_marketing') != 0 ? formatMoneyComma(getOldErrorInput('price_marketing'), '') : null }}" class="price_marketing form-control {{inValidInput('price_marketing', $errors) ? 'border-error' : ''}}" placeholder="Nhập giá marketing tại đây">
                                        <input type="hidden" name="price_marketing[]" class="price_marketing_hidden">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputEmail4">{{__('product.price_sell')}}</label>
                                        <input required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" type="text" value="{{getOldErrorInput('price_sell') != 0 ? formatMoneyComma(getOldErrorInput('price_sell'), '') : null }}" class="price_sell form-control {{inValidInput('price_sell', $errors) ? 'border-error' : ''}}" placeholder="Nhập giá bán tại đây">
                                        <input type="hidden" name="price_sell[]" class="price_sell_hidden">
                                    </div>
                                </div>
                            </div>

                            <div class="area-plus-specific-weight">

                            </div>

                            <div class="add-specific-weight" style="text-align: center">
                                <button class="btn btn-danger btn-plus-specific-weight">Thêm khối lượng</button>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputAddress">{{__('category.status')}}</label>
                                    <select name="active" id="status" class="form-control">
                                        <option value="{{\App\Models\Category::ACTIVE}}">Active</option>
                                        <option value="{{\App\Models\Category::INACTIVE}}">Inactive</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">{{__('product.image_feature')}}</label>
                                    <div class="uploadImage uploadImageFeature">
                                        <div class="divPreviewImage divPreviewImageFeature">
                                            <img class="imagePreview" onclick="uploadImage(this)" src="{{asset('images/plus_image.png')}}" alt="">
                                            <button type="button" class="btnDelete" style="display: none"> <img class="image-delete" src="{{ asset('images/icon_close_img.png')}}" /></button>
                                        </div>
                                        <input type="file" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Ảnh đại diện không thể để trống')" class="inputUploadImage" name="image_feature" accept=".jpg,.png,.jpeg" id="image_feature">
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-md-12">
                                    <label for="inputAddress">{{__('product.image_detail')}}</label>

                                    <div class="containImage">
                                        @for($i = 1; $i<= 9; $i++)
                                            <div class="uploadImage" id="{{$i}}">
                                                <div class="divPreviewImage">
                                                    <img class="imagePreview" onclick="uploadImage(this)" src="{{asset('images/plus_image.png')}}" alt="">
                                                    <button type="button" class="btnDelete" style="display: none"> <img class="image-delete" src="{{ asset('images/icon_close_img.png')}}" /></button>
                                                </div>
                                                <input type="file" style="opacity: 0" @if($i == 1) required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Ảnh chi tiết không thể để trống')" @endif class="inputUploadImage" name="image[]" accept=".jpg,.png,.jpeg" id="image_{{$i}}">
                                            </div>
                                        @endfor
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="inputAddress">{{__('product.description')}}</label>
                                    <div class="description">
                                        <textarea required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" name="description" id="editor1" rows="15" cols="80" class="form-control">
                                            {{old('description') ?? ''}}
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" id="btnSubmitStoreProduct" class="btn btn-primary">{{__('category.add')}}</button>
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
            $(document).on('change click keyup input paste','.price_sell',function (event) {
                JS.formatNumber($(this).val(), $(this))
                $(this).next().val($(this).val().replaceAll(",", ""))
            });


            $(document).on('change click keyup input paste','.price_marketing',function (event) {
                JS.formatNumber($(this).val(), $(this))
                $(this).next().val($(this).val().replaceAll(",", ""))
            });


            $('input.inputUploadImage').change(function (e){
                $(this).prev().find('img.imagePreview').attr('src', URL.createObjectURL(e.target.files[0]));
                $(this).prev().find('.btnDelete').show()
            })

            $(document).on('click','.btnDelete',function (e){
                $(this).prev().attr('src', '{{asset('images/plus_image.png')}}')
                $(this).parent().next().val('');
                $(this).hide()
            })

            $('.btn-plus-specific-weight').click(function (e){
                e.preventDefault()
                $('.area-plus-specific-weight').append(`{!! view('components.specific_weight')->render() !!}`)
            })

            $(document).on('click','.close-specific-weight',function (e){
                e.preventDefault()
                $(this).parents('.plus-specific-weight').remove();
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
        width: 10%;
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
    .error {
        color: red !important;
    }


    .uploadImage.uploadImageFeature .imagePreview {
        height: 150px;
        width: 150px;
    }

    .area-specific-weight, .plus-specific-weight {
        border: 1px dotted gray;
        padding: 30px;
        border-radius: 25px;
    }

    button.close {
        font-size: 35px;
    }
    .divPreviewImageFeature{
        width: 150px;
    }
</style>
