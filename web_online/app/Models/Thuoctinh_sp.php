<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thuoctinh_sp extends Model
{
    use HasFactory;
    protected $fillable = ['MA_SANPHAM', 'TEN_THUOCTINH', 'GIATRI', 'MA_THUOCTINH'];
}
