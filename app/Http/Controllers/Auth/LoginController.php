<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Http\Requests\LoginRequest;
use App\Models\User;

class LoginController extends Controller
{
    public function getLogin() {
        return view('auth/login');
    }

    public function postLogin(LoginRequest $request) {
        if(!empty($request->mssv) && !empty($request->password)) {
            $user = User::where('MaSV', $request->mssv)->orWhere('email', $request->mssv)->first();
            if (!$user) {
                return redirect()->back()->with('danger', 'Tài khoản mật khẩu không chính xác');
            }

            if (\Hash::check($request->password, $user->password)) {
                Auth::guard('users')->loginUsingId($user->id, true);
                return redirect()->route('detail');
            }
        } else {
            return redirect()->back()->with('danger', 'Tài khoản mật khẩu không chính xác');
        }

        return redirect()->route('get.login');
    }

}
