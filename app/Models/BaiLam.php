<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaiLam extends Model
{
    use HasFactory;
    protected $table = 'bailam';
    protected $guarded = ['MaCH', 'TraLoi', 'MaSV', 'MaMH', 'MaDeThi'];
    public $timestamps = false;
}
