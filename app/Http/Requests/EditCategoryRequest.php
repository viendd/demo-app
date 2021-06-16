<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class EditCategoryRequest extends FormRequest
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
        $id = request()->input('id');
        $categories = Category::whereNotIn('id', [$id])->get()->pluck('id')->toArray();
        return [
            'name' => 'required|unique:categories,name,'.$id,
            'active' => 'required',
            'parent_id' => 'required|in:' . implode(',', $categories),
        ];
    }
}
