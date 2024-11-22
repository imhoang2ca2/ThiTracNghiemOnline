<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LichThi extends Model
{
    use HasFactory;
    protected $table = 'lich_thi';
    protected $guarded = ['Lop', 'MaHK', 'MaMH', 'MaHK', 'NgayThi', 'ThoiGianThi', 'SoLuongCauHoi'];
    public $timestamps = false;
}
