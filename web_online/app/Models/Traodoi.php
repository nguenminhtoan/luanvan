<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Traodoi extends Model
{
    use HasFactory;
    private $table = "traodoi";
    protected $fillable = ['NOIDUNG'];
}
