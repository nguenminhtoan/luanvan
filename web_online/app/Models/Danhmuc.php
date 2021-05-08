<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuc extends Model
{
    use HasFactory;
    protected $fillable = ['MA_DANHMUC', 'TEN_DANHMUC', 'HINHANH','DAN_MA_DANHMUC'];
}
