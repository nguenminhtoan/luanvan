<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nganhhang extends Model
{
    use HasFactory;
    protected $fillable = ['MA_NGANH','TEN'];
}
