<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategoryRequest extends FormRequest
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
            'en_name' => 'required',
            'ar_name' => 'required',
            'en_text' => 'required',
            'ar_text' => 'required',
            'image'=>'required|mimes:jpeg,png,jpg,gif,svg',
            'banner_image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'brand_id' => 'required|integer',
        ];
    }
}
