<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vanchuyen extends Model
{
    use HasFactory;
    protected $fillable = ['MA_VANCHUYEN', 'PHUONGTHUC_VANCHUYEN', 'THOIGIADUKIEN','DONGIA'];
}
