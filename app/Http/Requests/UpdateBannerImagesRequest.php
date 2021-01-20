<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBannerImagesRequest extends FormRequest
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
            'cart_banner_image' => 'mimes:jpg,jpeg,png,svg',
            'checkout_banner_image' => 'mimes:jpg,jpeg,png,svg',
            'profile_banner_image' => 'mimes:jpg,jpeg,png,svg',
            'shop_banner_image' => 'mimes:jpg,jpeg,png,svg',
            'branches_banner_image' => 'mimes:jpg,jpeg,png,svg',
            'shipping_banner_image' => 'mimes:jpg,jpeg,png,svg',
        ];
    }
}
