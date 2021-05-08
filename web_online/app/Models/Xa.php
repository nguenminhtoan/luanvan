<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xa extends Model
{
    use HasFactory;
    protected $fillable = ['MA_XA', 'MA_HUYEN', 'TEN_XA','LOAI'];
}
