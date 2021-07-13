<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBlogPost extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
//        return false;
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
            'title'=>'required',
            'content'=>'required',
            'photo'=>'required',
            'check'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'This field is mendatory'
        ];
    }

    public function attributes()
    {
        return [
            'photo' =>'Post Logo'
        ];
    }
}
