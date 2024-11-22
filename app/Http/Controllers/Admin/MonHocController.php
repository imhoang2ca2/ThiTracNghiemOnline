<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MonHoc;
use Illuminate\Support\Facades\DB;

class MonHocController extends Controller
{
    public function __construct()
    {
        view()->share([
            'monhoc_active' => 'active',

        ]);
    }
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $monhoc = MonHoc::orderByDesc('id')->paginate(10);
        //
        return view('admin.mon_hoc.index', compact('monhoc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.mon_hoc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        DB::beginTransaction();
        try {
            $this->createOrUpdate($request);
            DB::commit();
            return redirect()->back()->with('success', 'Thêm mới thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
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
        $monhoc = MonHoc::findOrFail($id);

        if (!$monhoc) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('admin.mon_hoc.edit', compact('monhoc'));
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
        $monhoc = MonHoc::find($id);
        if (!$monhoc) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $monhoc->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request , $id ='')
    {
        $monhoc = new MonHoc();
        if ($id) {
            $monhoc = MonHoc::findOrFail($id);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $name);
            $monhoc->image = $name;
        }

        $monhoc->content = $request->content;
        $monhoc->MaMH = $request->MaMH;
        $monhoc->TenMH = $request->TenMH;
        $monhoc->MaHK = $request->MaHK;
        $monhoc->save();
    }
}
