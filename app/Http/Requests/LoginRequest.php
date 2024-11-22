<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            //
            'mssv' => ['required'],
            'password' =>['required'],
        ];
    }

    public function messages()
    {
        return [
            'mssv.required' => 'Vui lòng nhập mã sinh viên đăng nhập',
            'password.required' => 'Vui lòng nhập mật khẩu đăng nhập',
        ];
    }
}
