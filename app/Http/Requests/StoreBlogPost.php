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
//            'title'=>'required',
//            'content'=>'required',
//            'photo'=>'required',
//            'check'=>'required',
//            'tos'=>'accepted',
//            'website'=>'active_url',
//            'dt'=>'required|date|after:today',
//            'start_date'=>'required|date|after:today',
//            'start_date'=>'required|date',
//            'end_date'=>'required|date|after:start_date',
//            'end_date'=>'required|date|after_or_equal:start_date',

//            'title'=>'required|alpha',
//            'title'=>'required|alpha_dash',
//            'title'=>'required|alpha_num',
//            'check'=>'required|array',
//            'title'=>'bail|alpha|required'
//            'title'=>'bail|alpha|between:2,4',
//                'tos'=>'boolean',
//                'password'=>'bail|required|confirmed'
                'title'=>'email:filter'
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
            'photo' =>'Post Logo',
            'start_date' =>'start date',
            'end_date' =>'end date'
        ];
    }
}
