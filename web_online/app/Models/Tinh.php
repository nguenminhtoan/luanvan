<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tinh extends Model
{
    use HasFactory;
    protected $fillable = ['MA_TINH', 'TEN_TINH', 'LOAI'];
}