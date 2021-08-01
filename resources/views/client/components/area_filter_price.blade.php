<aside class="ps-widget--sidebar ps-widget--filter">
    <div class="ps-widget__header">
        <h3>Category</h3>
    </div>
    @php
        $queryPrice = request()->query('prices');
        $arrayQueryPrice = explode(',', $queryPrice)
    @endphp
    <div class="ps-widget__content">
        <div class="ac-slider" data-default-min="{{$queryPrice ? $arrayQueryPrice[0] : 100000}}" data-default-max="{{$queryPrice ? $arrayQueryPrice[1] : 20000000}}" data-max="20000000" data-step="50" data-unit="đ"></div>
        <p class="ac-slider__meta">
            Price:<span class="ac-slider__value ac-slider__min"></span>-<span class="ac-slider__value ac-slider__max"></span>
        </p>
        <a class="ac-slider__filter ps-btn" id="filter_price_range">Filter</a>
    </div>
</aside>
