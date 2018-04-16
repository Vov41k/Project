<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateNewsRequest extends FormRequest
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
            'title'             => 'required|min:5|max:30|string',
            'deskription_short' => 'required|min:5|max:100|string',
            // 'image' => 'required|mimes:jpeg,bmp,png',
            'deskription'       => 'required|min:5|max:500|string'];
    }
}
