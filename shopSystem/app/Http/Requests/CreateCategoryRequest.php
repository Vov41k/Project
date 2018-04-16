<?php

namespace App\Http\Requests;

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
        return [
            'category_name'     => 'required|min:2|max:30|string',
            'meta_tag_title'    => 'required|min:4|max:30|string',
            'description'       => 'required|min:2|max:30|string',
            'parent'            => 'required|min:3|max:30',
//            'image'             => 'required|min:4|',
            'colum'             => 'required|min:1|max:30|numeric',
            'sort_order'        => 'required|min:1|max:30|numeric',
            'meta_tag_keywords' => 'required|min:1|max:30|string',
            'status'            => 'required|min:1|max:30|string',
            'filter'            => 'required|min:1|max:30|string',

        ];
    }
}
