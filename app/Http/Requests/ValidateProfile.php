<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidateProfile extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // return \Auth::;
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
            'address'=>'required',
            'ph' => 'required|phone:PK',
            //'cover_image'=>'image|size:2M|mimes:jpg,png'
            'cover_image'=>'image'
        ];
    }
}
