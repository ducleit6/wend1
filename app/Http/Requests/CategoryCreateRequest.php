<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryCreateRequest extends FormRequest
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
            'name' =>'required|max:100|unique:categories,name',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Bạn không được bỏ trống tên danh mục',
            'name.unique'   => '"'.request()->name.'" đã có trong CSDL',
            'name.max'      => 'Tên danh mục không quá 100 ký tự'
        ];
    }
}
