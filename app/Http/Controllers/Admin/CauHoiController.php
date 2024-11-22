<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CauHoi;
use App\Models\MonHoc;
use Illuminate\Support\Facades\DB;


class CauHoiController extends Controller
{
    public function __construct(MonHoc $monHoc)
    {
        view()->share([
            'cauhoi_active' => 'active',
            'monhoc' => $monHoc->all()

        ]);
    }
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $cauhoi = CauHoi::select('*');
        if ($request->NoiDung)
        {
            $cauhoi->where('NoiDung', 'like', '%'.$request->NoiDung.'%');
        }
        $cauhoi = $cauhoi->orderByDesc('id')->paginate(10);
        //
        return view('admin.cau_hoi.index', compact('cauhoi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.cau_hoi.create');
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
        $cauhoi = CauHoi::findOrFail($id);

        if (!$cauhoi) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }
        return view('admin.cau_hoi.edit', compact('cauhoi'));
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
        $cauhoi = CauHoi::findOrFail($id);
        if (!$cauhoi) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        try {
            $cauhoi->delete();
            return redirect()->back()->with('success', 'Xóa thành công');
        } catch (\Exception $exception) {
            return redirect()->back()->with('error', 'Đã xảy ra lỗi không thể xóa dữ liệu');
        }
    }

    public function createOrUpdate($request , $id ='')
    {
        $cauhoi = new CauHoi();
        if ($id) {
            $cauhoi = CauHoi::findOrFail($id);
        }

        $cauhoi->MaCH = $request->MaCH;
        $cauhoi->NoiDung = $request->NoiDung;
        $cauhoi->PhuongAnA = $request->PhuongAnA;
        $cauhoi->PhuongAnB = $request->PhuongAnB;
        $cauhoi->PhuongAnC = $request->PhuongAnC;
        $cauhoi->PhuongAnD = $request->PhuongAnD;
        $cauhoi->DapAnDung = $request->DapAnDung;
        $cauhoi->MaMH = $request->MaMH;
        $cauhoi->save();
    }
}
