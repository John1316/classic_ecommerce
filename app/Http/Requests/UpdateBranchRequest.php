<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBranchRequest extends FormRequest
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
            'en_branch_location' => 'required',
            'ar_branch_location' => 'required',
            'en_branch_city' => 'required',
            'ar_branch_city' => 'required',
            'en_branch_address' => 'required',
            'ar_branch_address' => 'required',
            'branch_phone_1' => 'required',
            'branch_phone_2' => 'nullable',
            'branch_phone_3' => 'nullable',
            'image' => 'mimes:jpeg,png,jpg,gif,svg',        
        ];
    }
}
