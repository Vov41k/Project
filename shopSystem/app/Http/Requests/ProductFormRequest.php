<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'title'       => 'required|max:10|string',
            // 'image'       => 'required|image|mimes:jpeg,png,jpg,gif',
            //            'text_input'   => 'required',
            //            'select_input' => 'required',
            'description' => 'required|string|max:100',
            'price'       => 'required|numeric',
        ];
    }
}
