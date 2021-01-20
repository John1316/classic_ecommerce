<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateContactUsRequest extends FormRequest
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
            'sales_email_1' => 'required|email',
            'sales_email_2' => 'required|email',
            'sales_email_3' => 'nullable|email',
            'en_location' => 'required',
            'ar_location' => 'required',
            'en_address' => 'required',
            'ar_address' => 'required',
            'phone' => 'required|digits:13',
            'fax' => 'required|digits:13',
            'en_work_days' => 'required',
            'ar_work_days' => 'required',
            'en_work_hours' => 'required',
            'ar_work_hours' => 'required',
            'facebook' => 'required|url',
            'twitter' => 'required|url',
            'instagram' => 'required|url',
            'banner_image' => 'mimes:jpg,jpeg,png,svg',
        ];
    }
}
