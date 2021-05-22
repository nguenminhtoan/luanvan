<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noithanhtoan extends Model
{
    use HasFactory;
    protected $fillable = ['MA_NOI', 'MA_XA', 'MA_NGUOIDUNG','CHITIET', "DT"];
}
