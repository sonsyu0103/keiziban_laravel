<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "username"=>'required',
            'sin'=>'required|image|mimes:jpeg,png,jpg,gif|max:1024|',
        ];
    }

    public function messages()
    {
        return [
            "required"=>"必須項目です。",
            "image"=>"必須項目です。",
            "mimes"=>"必須項目です。",
            "max"=>"必須項目です。",
        ];
    }
}
