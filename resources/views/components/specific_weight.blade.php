<div class="plus-specific-weight" style="margin-top: 30px">
    <div class="delete-specific-weight">
        <button type="button" class="close close-specific-weight" aria-label="Close">
            <span>&times;</span>
        </button>
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="inputEmail4">Khối lượng</label>
            <input type="text" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" name="specific_weight[]" class="form-control {{inValidInput('specific_weight', $errors) ? 'border-error' : ''}}" placeholder="Nhập giá khối lượng tại đây">
        </div>
        <div class="form-group col-md-6">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">{{__('product.price_marketing')}}</label>
            <input type="text" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" value="{{getOldErrorInput('price_marketing') != 0 ? formatMoneyComma(getOldErrorInput('price_marketing'), '') : null }}" class="form-control price_marketing {{inValidInput('price_marketing', $errors) ? 'border-error' : ''}}" placeholder="Nhập giá marketing tại đây">
            <input type="hidden" name="price_marketing[]" class="price_marketing_hidden">
        </div>
        <div class="form-group col-md-6">
            <label for="inputEmail4">{{__('product.price_sell')}}</label>
            <input type="text" required oninput="setCustomValidity('')" oninvalid="this.setCustomValidity('Trường này không thể để trống')" value="{{getOldErrorInput('price_sell') != 0 ? formatMoneyComma(getOldErrorInput('price_sell'), '') : null }}" class="form-control price_sell {{inValidInput('price_sell', $errors) ? 'border-error' : ''}}" placeholder="Nhập giá bán tại đây">
            <input type="hidden" name="price_sell[]" class="price_sell_hidden">
        </div>
    </div>
</div>
