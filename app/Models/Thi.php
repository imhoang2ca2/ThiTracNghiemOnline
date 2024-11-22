<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thi extends Model
{
    use HasFactory;
    protected $table = 'thi';
    protected $guarded = ['MaSV', 'MaMH', 'MaHK', 'NgayThi', 'ThoiGianThi', 'SoLuongCauHoi', 'TrangThai'];

    public $timestamps = false;

    public function sinhvien()
    {
        return $this->hasOne(User::class, 'MaSV', 'MaSV');
    }

    public function monhoc()
    {
        return $this->hasOne(MonHoc::class, 'MaMH', 'MaMH');
    }
    public function hocky()
    {
        return $this->hasOne(HocKy::class, 'MaHK', 'MaHK');
    }
    public function dethi()
    {
        return $this->hasOne(DeThi::class, 'MaDeThi', 'MaDeThi');
    }

}
