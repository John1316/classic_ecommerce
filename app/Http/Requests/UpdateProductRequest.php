<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'price_before_discount' => 'required|integer',
            'price_after_discount' => 'nullable|integer',
            'featured' => 'required',
            'hot_deal' => 'required',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',
            'banner_image' => 'mimes:jpeg,png,jpg,gif,svg',
            'category_id' => 'required|integer',
        ];
    }
}
