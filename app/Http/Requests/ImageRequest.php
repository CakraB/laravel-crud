<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImageRequest extends FormRequest
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
            'title'=>'required',
            'description'=>'required|min:10',
            'image'=>'required|max:2048|mimes:jpg,jpeg,png'
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Title must be Inputed',
            'description.required'=>'Description must be inputed',
            'description.min'=>'Description must be at least 10 charcters',
            'image.required'=>'Image must be Inputed',
            'image.max'=>'Image Capacity max 2 MB',
            'image.mimes'=>'Image format must be .jpg, .jpeg, or .png',
        ];
    }
}
