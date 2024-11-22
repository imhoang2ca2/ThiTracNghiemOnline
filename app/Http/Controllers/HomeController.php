<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MonHoc;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return redirect()->route('get.login');
        $monhoc = MonHoc::select('*')->orderByDesc('id')->get();
        return view('home.index', compact('monhoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        //
        $monhoc = MonHoc::find($id);
        return view('home.detail', compact('monhoc'));

    }
}
