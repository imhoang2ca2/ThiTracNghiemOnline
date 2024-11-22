<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HocKy extends Model
{
    use HasFactory;
    protected $table = 'hocky';
    protected $guarded = ['MaHK', 'Lop'];
}
