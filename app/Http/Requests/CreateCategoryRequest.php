<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class CreateCategoryRequest extends FormRequest
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
        $categories = Category::all()->pluck('id')->toArray();
        $categories[] = 0;
        return [
            'name' => 'required|unique:categories,name',
            'active' => 'required',
            'parent_id' => 'required|in:' . implode(',', $categories),
        ];
    }

    public function attributes()
    {
        return [
            'name' => __('category.name')
        ];
    }
}
