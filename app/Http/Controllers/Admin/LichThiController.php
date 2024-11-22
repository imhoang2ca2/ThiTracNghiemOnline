<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\HocKy;
use App\Models\MonHoc;
use App\Models\LichThi;
use App\Models\Thi;
use Carbon\Carbon;
use App\Models\DeThi;
use App\Models\CauHoiDeThi;
use App\Models\BaiLam;
use App\Models\CauHoi;
use Illuminate\Support\Facades\DB;
use App\Helpers\MailHelper;

class LichThiController extends Controller
{
    public function __construct(MonHoc $monHoc)
    {
        view()->share([
            'lichthi_active' => 'active',

        ]);
    }
    //
    //
    public function index()
    {
        $lichthi = LichThi::orderByDesc('NgayThi')->paginate(10);
        return view('admin.lich_thi.index', compact('lichthi'));
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
        return view('admin.lich_thi.create', compact('lop', 'hocky', 'monhoc'));
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
        $NgayThi = new Carbon($request->NgayThi);
        DB::beginTransaction();
        try {
            $monhoc = MonHoc::where('MaMH', $request->MaMH)->first();
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
                        'NgayThi' => $NgayThi,
                        'ThoiGianThi' => $request->ThoiGianThi,
                        'SoLuongCauHoi' => $request->SoLuongCauHoi,
                        'TrangThai' => 0,
                        'IDLichThi' => $lichthi->id,
                        'MaDeThi' => randString(10),

                    ];
                    Thi::insert($data);
                    $data = [
                        'email' => $sv->email,
                        'subject' => 'Thông báo lịch thi',
                        'ngay_thi' => $NgayThi,
                        'thoi_gian' => $request->ThoiGianThi,
                        'so_cau_hoi' => $request->SoLuongCauHoi,
                        'name' => $sv->HoTen,
                        'mon_hoc' => $monhoc->TenMH
                    ];

                    MailHelper::sendMail($data);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Đăng ký thành công');
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
        return view('admin.lich_thi.edit', compact('lop', 'hocky', 'monhoc', 'lichthi'));
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
        $NgayThi = new Carbon($request->NgayThi);
        DB::beginTransaction();
        try {
            $monhoc = MonHoc::where('MaMH', $request->MaMH)->first();
            $lichthi = LichThi::find($id);
            $lichthi->Lop = $request->Lop;
            $lichthi->MaHK = $request->MaHK;
            $lichthi->MaMH = $request->MaMH;
            $lichthi->NgayThi = $NgayThi;
            $lichthi->ThoiGianThi = $request->ThoiGianThi;
            $lichthi->SoLuongCauHoi = $request->SoLuongCauHoi;
            if ($lichthi->save()) {
                $sinhvien = User::where('Lop', $request->Lop)->get();
                foreach($sinhvien as $key => $sv) {
                    $thi = Thi::where(['MaSV' => $sv->MaSV, 'IDLichThi' => $lichthi->id])->first();
                    $thi->MaHK = $request->MaHK;
                    $thi->MaMH = $request->MaMH;
                    $thi->NgayThi = $NgayThi;
                    $thi->ThoiGianThi = $request->ThoiGianThi;
                    $thi->SoLuongCauHoi = $request->SoLuongCauHoi;
                    $thi->save();
                    $data = [
                        'email' => $sv->email,
                        'subject' => 'Cập nhật lịch thi',
                        'ngay_thi' => $NgayThi,
                        'thoi_gian' => $request->ThoiGianThi,
                        'so_cau_hoi' => $request->SoLuongCauHoi,
                        'name' => $sv->HoTen,
                        'mon_hoc' => $monhoc->TenMH
                    ];

                    MailHelper::sendMail($data);
                }
            }

            DB::commit();
            return redirect()->back()->with('success', 'Đăng ký thành công');
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
            return redirect()->back()->with('success', 'Đăng ký thành công');
        } catch (\Exception $exception) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Đã xảy ra lỗi khi lưu dữ liệu');
        }
    }

    public function danhSach($id)
    {
        $thi = Thi::where('IDLichThi', $id)->get();
        return view('admin.lich_thi.list_student', compact('thi'));
    }

    // hiển thị thông tin đề thi
    public function getDeThi(Request $request, $id, $made)
    {
        // thông tin sinh viên
        $user = User::where('MaSV', $id)->first();
        // thông tin đề thi
        $thi = Thi::with(['monhoc', 'hocky'])->where(['MaSV' => $id, 'MaDeThi' => $made])->first();
        if (!$thi) {
            return redirect()->route('detail');
        }
        if (empty($thi->GioVaoThi)){
            $thi->GioVaoThi = now();
            $thi->TrangThai = 1;
            $thi->save();
        }

        $cauhoidethi = CauHoiDeThi::with('cauhoi')->where('MaDeThi', $thi->MaDeThi)->get();
        $traloi = [];
        $bailam = BaiLam::where('MaDeThi', $thi->MaDeThi)->get();
        foreach ($bailam as $item) {
            $traloi[intval($item->MaCH)] = $item->TraLoi;
        }
        $cauhoi = [];
        if ($cauhoidethi->isEmpty()) {
            $cauhoi = CauHoi::where('MaMH', $thi->MaMH)->inRandomOrder()->limit($thi->SoLuongCauHoi)->get();
            foreach($cauhoi as $key => $ch) {
                $data = [
                    'MaDeThi' => $thi->MaDeThi,
                    'MaCH' => $ch->MaCH,
                    'dapan' => $ch->DapAnDung,
                ];
                CauHoiDeThi::insert($data);
            }
        }

        return view('admin.lich_thi.bai_lam', compact('user', 'thi', 'cauhoi', 'cauhoidethi', 'traloi'));
    }
}
