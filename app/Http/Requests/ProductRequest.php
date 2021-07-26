<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'category_id' => 'required',
            'code' => 'required|size:9',
            'price_marketing' => 'required|integer|min:1',
            'price_sell' => 'required|integer|min:1',
            'image_feature' => 'required',
            'image' => 'required',
            'description' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('label.name'),
            'category_id' => __('label.category'),
            'price_marketing' => __('product.price_marketing'),
            'price_sell' => __('product.price_sell'),
            'image_feature' => __('product.image_feature'),
            'description' => __('product.description'),
            'image' => __('product.image_detail')
        ];
    }
}
