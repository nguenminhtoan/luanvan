<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hinhanh extends Model
{
    use HasFactory;
    protected $fillable = ['MA_HINHANH', 'MA_SP', 'TEN_HINHANH'];
}
