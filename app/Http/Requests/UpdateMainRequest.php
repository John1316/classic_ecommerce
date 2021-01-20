<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMainRequest extends FormRequest
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
            'home_first_ad' => 'mimes:jpg,jpeg,png,svg',
            'home_second_ad' => 'mimes:jpg,jpeg,png,svg',

            'home_number_banner' => 'mimes:jpg,jpeg,png,svg',

            'home_first_number' => 'required',
            'en_home_first_number_title' => 'required',
            'ar_home_first_number_title' => 'required',

            'home_second_number' => 'required',
            'en_home_second_number_title' => 'required',
            'ar_home_second_number_title' => 'required',

            'home_third_number' => 'required',
            'en_home_third_number_title' => 'required',
            'ar_home_third_number_title' => 'required',

            'home_fourth_number' => 'required',
            'en_home_fourth_number_title' => 'required',
            'ar_home_fourth_number_title' => 'required',

            'home_advantage_first_icon' => 'mimes:jpg,jpeg,png,svg',
            'en_home_advantage_first_title' => 'required',
            'ar_home_advantage_first_title' => 'required',
            'en_home_advantage_first_text' => 'required',
            'ar_home_advantage_first_text' => 'required',

            'home_advantage_second_icon' => 'mimes:jpg,jpeg,png,svg',
            'en_home_advantage_second_title' => 'required',
            'ar_home_advantage_second_title' => 'required',
            'en_home_advantage_second_text' => 'required',
            'ar_home_advantage_second_text' => 'required',

            'home_advantage_third_icon' => 'mimes:jpg,jpeg,png,svg',
            'en_home_advantage_third_title' => 'required',
            'ar_home_advantage_third_title' => 'required',
            'en_home_advantage_third_text' => 'required',
            'ar_home_advantage_third_text' => 'required',

            'home_advantage_fourth_icon' => 'mimes:jpg,jpeg,png,svg',
            'en_home_advantage_fourth_title' => 'required',
            'ar_home_advantage_fourth_title' => 'required',
            'en_home_advantage_fourth_text' => 'required',
            'ar_home_advantage_fourth_text' => 'required',

            'en_footer_about_title' => 'required',
            'ar_footer_about_title' => 'required',
            'en_footer_about_text' => 'required',
            'ar_footer_about_text' => 'required',
            
             ];
    }
}
