<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuahang extends Model
{
    use HasFactory;
    protected $fillable = ['MA_CUAHANG', 'MA_XA', 'MA_NGANH','TEN_CUAHANG','HINHANH','MOTA','LUOTVAO','DIACHI'];
}
