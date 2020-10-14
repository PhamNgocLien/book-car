<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class InfoRequest extends FormRequest
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
            'name_update' => 'required',
            'phone_update' => [
                'required',
                Rule::unique('users','phone')->ignore(Auth::user()->id),
            ],
            'address_update' => 'required',
            'issue_number_update' => [
                'required',
                Rule::unique('users','issue_number')->ignore(Auth::user()->id),
            ],
        ];
    }

    public function attributes()
    {
        return [
            'name-edit' => 'Họ tên',
            'phone-edit' => 'Số điện thoại',
            'address-edit' => 'Địa chỉ',
            'issue-number-edit' => 'Số CMND',
        ];
    }

    public function messages()
    {
        return [
            'required' => ':attribute không được để trống',
            'unique' => ':attribute đã tồn tại',
        ];
    }
}
