<?php
 
 namespace App\Http\Controllers\Auth;
  
 use Illuminate\Http\Request;
 use App\Http\Controllers\Controller;
 use Illuminate\Support\Facades\Auth;
  
 class LogoutController extends Controller
 {
     public function __construct() {
         $this->middleware('auth');
     }
         
     public function getLogout() {
         Auth::guard('users')->logout();
         return redirect()->route('get.login');
     }
 }