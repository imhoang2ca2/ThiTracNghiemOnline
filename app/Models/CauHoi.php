<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CauHoi extends Model
{
    use HasFactory;
    protected $table = 'cauhoi';
    protected $guarded = ['MaCH', 'NoiDung', 'PhuongAnA', 'PhuongAnB', 'PhuongAnC', 'PhuongAnD', 'DapAnDung', 'MaMH'];
    public $timestamps = false;
}
