@if($productsCategory->count())
    <div class="ps-product__filter">
        <label>
            @php
                $querySort = request()->query('sort');
            @endphp
            <select class="ps-select selectpicker" onchange="redirectUrl('sort', this.value)">
                <option value="">Shortby</option>
                <option value="name-asc" {{$querySort == 'name-asc' ? 'selected' : ''}}>Tên xuôi</option>
                <option value="name-desc" {{$querySort == 'name-desc' ? 'selected' : ''}}>Tên ngược</option>
                <option value="price-asc" {{$querySort == 'price-asc' ? 'selected' : ''}}>Giá từ thấp đến cao</option>
                <option value="price-desc" {{$querySort == 'price-desc' ? 'selected' : ''}}>Giá từ cao xuống thấp</option>
            </select>
        </label>
    </div>
@endif
