<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
            //Title & description are required , minimum length for title is 3 chars and unique, for description the minimum length is 10 chars

            'title'=>'required|min:3|unique:posts,title,id',
            'content'=>'required|min:10',
            'image'=>'required'
        ];
    }
}
