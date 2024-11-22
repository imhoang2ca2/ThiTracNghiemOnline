<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoc extends Model
{
    use HasFactory;
    protected $table = 'hoc';
    protected $guarded = ['MaSV', 'MaMH', 'MaHK'];
}
