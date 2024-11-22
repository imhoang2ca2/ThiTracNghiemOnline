<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeThi extends Model
{
    use HasFactory;
    protected $table = 'dethi';
    protected $guarded = ['MaDeThi', 'IdThi'];

    public function monhoc()
    {
        return $this->hasOne(MonHoc::class, 'MaMH', 'MaMH');
    }
    public function hocky()
    {
        return $this->hasOne(HocKy::class, 'MaHK', 'MaHK');
    }
}
