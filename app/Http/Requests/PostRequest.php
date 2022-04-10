<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'user_id'=>'required',
            'body'=>'required|min:5|max:200',
            'image'=>'mimes:jpeg,jpg,png,gif|max:10000'
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            'user_id'=>auth()->user()->id
        ]);
    }
}
