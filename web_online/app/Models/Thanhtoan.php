<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thanhtoan extends Model
{
    use HasFactory;
    protected $fillable = ['MA_THANHTOAN', 'PHUONGTHUC_THANHTOAN'];
}
