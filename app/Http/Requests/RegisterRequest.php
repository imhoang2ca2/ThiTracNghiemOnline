<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'HoTen' => ['required'],
            'email' => ['required', 'email'],
            'password' =>['required'],
            'r_password' => 'required|same:password'
        ];
    }

    public function messages()
    {
        return [
            'HoTen.required' => 'Vui lòng nhập vào họ tên',
            'email.required' => 'Vui lòng nhập vào email',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu đăng nhập',
            'r_password.required' => 'Vui lòng nhập lại mật khẩu đăng nhập',
            'r_password.same' => 'Mật khẩu không trùng khớp',
        ];
    }
}
