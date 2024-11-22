<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CauHoiDeThi extends Model
{
    use HasFactory;
    protected $table = 'cauhoidethi';
    protected $guarded = ['MaDeThi', 'MaCH', 'MaMH', 'dapan'];

    public function cauhoi()
    {
        return $this->hasOne(CauHoi::class, 'MaCH', 'MaCH');
    }
}
