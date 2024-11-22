<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register()
    {
        return view('auth/register');
    }

    public function postRegister(RegisterRequest $request)
    {
        \DB::beginTransaction();
        try {
            $sinhvien = new User();
            $sinhvien->MaSV = Carbon::now()->timestamp;
            $sinhvien->HoTen = $request->HoTen;
            $sinhvien->NgaySinh = $request->NgaySinh;
            $sinhvien->email = $request->email;
            $sinhvien->password = password_hash($request->password, PASSWORD_DEFAULT);
            $sinhvien->save();
            \DB::commit();
            return redirect()->route('get.login')->with('success', 'Đăng ký thành công tài khoản vui lòng đăng nhập để sử dụng');
        } catch (\Exception $exception) {
            \DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể đăng ký tài khoản');
        }
    }
}
