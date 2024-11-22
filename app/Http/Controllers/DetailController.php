<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thi;
use App\Models\MonHoc;
use App\Models\CauHoiDeThi;
use App\Models\BaiLam;
use App\Models\CauHoi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    // thông tin sinh viên và danh sách bài thi
    public function getDetail()
    {
        // get thông tin sinh viên
        $user = Auth::guard('users')->user();
        $monhoc = MonHoc::select('*')->orderByDesc('id')->get();
        // danh sách đề thi
        $danhSachThi = Thi::with(['sinhvien', 'monhoc', 'hocky'])->where('MaSV', $user->MaSV)->orderByDesc('NgayThi')->orderByDesc('ThoiGianThi')->paginate(10);

        return view('detail/detail', compact('user', 'danhSachThi', 'monhoc'));
    }

    // hiển thị thông tin đề thi
    public function getDeThi(Request $request, $id)
    {
        // thông tin sinh viên
        $user = Auth::guard('users')->user();
        // thông tin đề thi
        $thi = Thi::with(['monhoc', 'hocky'])->find($id);

        if (Carbon::now() < $thi->NgayThi) {
            return redirect()->route('detail');
        }
        if (!$thi) {
            return redirect()->route('detail');
        }
        if (empty($thi->GioVaoThi)) {
            $thi->GioVaoThi = now();
            $thi->TrangThai = 1;
            $thi->save();
        }

        $cauhoidethi = CauHoiDeThi::with('cauhoi')->where('MaDeThi', $thi->MaDeThi)->get();
        $cauhoi = [];
        if ($cauhoidethi->isEmpty()) {
            $cauhoi = CauHoi::where('MaMH', $thi->MaMH)->inRandomOrder()->limit($thi->SoLuongCauHoi)->get();
            foreach ($cauhoi as $key => $ch) {
                $data = [
                    'MaDeThi' => $thi->MaDeThi,
                    'MaCH' => $ch->MaCH,
                    'dapan' => $ch->DapAnDung,
                ];

                CauHoiDeThi::insert($data);
            }
        }

        return view('thi/index', compact('user', 'thi', 'cauhoi', 'cauhoidethi'));
    }

    public function  traLoi(Request $request, $made, $id)
    {
        $thi = Thi::find($id);
        $user = Auth::guard('users')->user();
        $cauhoi = CauHoiDeThi::where('MaDeThi', $made)->get();
        $baithi = $request->all();
        DB::beginTransaction();
        try {
            foreach ($cauhoi as $key => $ch) {
                $data = [
                    'MaCH' => $ch->MaCH,
                    'MaSV' => $user->MaSV,
                    'MaMH' => $thi->MaMH,
                    'MaDeThi' => $made,
                ];
                if (isset($baithi['question'][$ch->MaCH][0])) {
                    $data['TraLoi'] = $baithi['question'][$ch->MaCH][0];
                } else {
                    $data['TraLoi'] = null;
                }
                BaiLam::insert($data);
            }
            DB::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return redirect()->route('detail');
    }
}
