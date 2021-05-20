<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nguoidung extends Model
{
    use HasFactory;
    protected $fillable = ["MA_HUYEN", "MA_TINH" ,'MA_NGUOIDUNG', 'MA_XA', 'MA_CUAHANG','MATKHAU','TEN_NGUOIDUNG','EMAIL','GIOITINH','NGAYSINH','SDT','TK_MANGXH','TICHLY'];
}
