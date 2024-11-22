<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\HocKy;
use App\Models\MonHoc;
use App\Models\LichThi;
use App\Models\Thi;
use Illuminate\Support\Facades\DB;


class LichThiController extends Controller
{
    //
    public function index()
    {
        $lichthi = LichThi::orderByDesc('NgayThi')->paginate(10);
        return view('lich_thi.index', compact('lichthi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $lop = User::select('Lop')->distinct()->get();
        $hocky = HocKy::all();
        $monhoc = MonHoc::all();
        return view('lich_thi.create', compact('lop', 'hocky', 'monhoc'));
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
            $lichthi = new LichThi();
            $lichthi->Lop = $request->Lop;
            $lichthi->MaHK = $request->MaHK;
            $lichthi->MaMH = $request->MaMH;
            $lichthi->NgayThi = date('Y-m-d H:s', strtotime($request->NgayThi));
            $lichthi->ThoiGianThi = $request->ThoiGianThi;
            $lichthi->SoLuongCauHoi = $request->SoLuongCauHoi;
            if ($lichthi->save()) {
                $sinhvien = User::where('Lop', $request->Lop)->get();
                foreach($sinhvien as $key => $sv) {
                    $data = [
                        'MaSV' => $sv->MaSV,
                        'MaHK' => $request->MaHK,
                        'MaMH' => $request->MaMH,
                        'NgayThi' => date('Y-m-d H:s', strtotime($request->NgayThi)),
                        'ThoiGianThi' => $request->ThoiGianThi,
                        'SoLuongCauHoi' => $request->SoLuongCauHoi,
                        'TrangThai' => 0,
                        'IDLichThi' => $lichthi->id,
                        'MaDeThi' => randString(10),

                    ];

                    Thi::insert($data);
                }
            }

            DB::commit();
            return redirect()->route('danhsachlichthi')->with('success', 'Đăng ký thành công');
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
        $lichthi = LichThi::find($id);
        $lop = User::select('Lop')->distinct()->get();
        $hocky = HocKy::all();
        $monhoc = MonHoc::all();
        return view('lich_thi.edit', compact('lop', 'hocky', 'monhoc', 'lichthi'));
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
            $lichthi = LichThi::find($id);
            $lichthi->Lop = $request->Lop;
            $lichthi->MaHK = $request->MaHK;
            $lichthi->MaMH = $request->MaMH;
            $lichthi->NgayThi = date('Y-m-d H:s', strtotime($request->NgayThi));
            $lichthi->ThoiGianThi = $request->ThoiGianThi;
            $lichthi->SoLuongCauHoi = $request->SoLuongCauHoi;
            if ($lichthi->save()) {
                $sinhvien = User::where('Lop', $request->Lop)->get();
                foreach($sinhvien as $key => $sv) {
                    $thi = Thi::where(['MaSV' => $sv->MaSV, 'IDLichThi' => $lichthi->id])->first();
                    $thi->MaHK = $request->MaHK;
                    $thi->MaMH = $request->MaMH;
                    $thi->NgayThi = date('Y-m-d H:s', strtotime($request->NgayThi));
                    $thi->ThoiGianThi = $request->ThoiGianThi;
                    $thi->SoLuongCauHoi = $request->SoLuongCauHoi;
                    $thi->save();
                }
            }

            DB::commit();
            return redirect()->route('danhsachlichthi')->with('success', 'Đăng ký thành công');
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
        $lichthi = LichThi::find($id);
        if (!$lichthi) {
            return redirect()->back()->with('error', 'Dữ liệu không tồn tại');
        }

        DB::beginTransaction();
        try {
            $lichthi->delete();
            Thi::where('IDLichThi', $id)->delete();
            DB::commit();
            return redirect()->route('danhsachlichthi')->with('success', 'Đăng ký thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }
}
