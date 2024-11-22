<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HocSinhController extends Controller
{
    public function __construct()
    {
        view()->share([
            'hocsinh_active' => 'active',

        ]);
    }
    //
    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinhvien = User::orderByDesc('id')->paginate(10);
        //
        return view('admin.hoc_sinh.index', compact('sinhvien'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.hoc_sinh.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        //
        // DB::beginTransaction();
        // try {
            $this->createOrUpdate($request);
            return redirect()->back()->with('success', 'Thêm mới thành công');
        // } catch (\Exception $exception) {
        //     // DB::rollBack();
        //     return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        // }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $sinhvien = User::findOrFail($id);

        if (!$sinhvien) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('admin.hoc_sinh.edit', compact('sinhvien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        DB::beginTransaction();
        try {
            $this->createOrUpdate($request, $id);
            DB::commit();
            return redirect()->back()->with('success', 'Chỉnh sửa thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $sinhvien = User::find($id);
        if (!$sinhvien) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $sinhvien->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request , $id ='')
    {
        $sinhvien = new User();
        if ($id) {
            $sinhvien = User::findOrFail($id);
        }

        $sinhvien->MaSV = $request->MaSV;
        $sinhvien->HoTen = $request->HoTen;
        $sinhvien->Lop = $request->Lop;
        $sinhvien->NgaySinh = $request->NgaySinh;
        $sinhvien->email = $request->email;
        $sinhvien->password = password_hash($request->password, PASSWORD_DEFAULT);
        $sinhvien->save();
    }
}
