<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginAdminRequest;
use App\Models\Admin;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */



    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    public function login()
    {
        if (Auth::guard('admins')->check()) {
            return redirect()->back();
        }

        return view('admin.auth.login');
    }

    /**
     * Xử lý thực hiện đăng nhập trang admin
     *
     * @param LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function postLogin(LoginAdminRequest $request)
    {
        $data = $request->except('_token');
        $admin = Admin::where('email', $request->email)->first();
        if (!$admin) {
            return redirect()->back()->with('danger', 'Thông tin tài khoản không tồn tại');
        }

        if (Auth::guard('admins')->attempt($data)) {
            return redirect()->route('mon.hoc.index');
        }
        return redirect()->back()->with('danger', 'Đăng nhập thất bại.');
    }

    public function logout()
    {
        Auth::guard('admins')->logout();
        return redirect()->route('admin.login');
    }
}
