<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Binhluan extends Model
{
    use HasFactory;
    protected $table = "binhluan";
    
    
    public static function binhluan_sp($ma_sp){
        $sql = "SELECT * FROM binhluan bl JOIN nguoidung nd ON nd.MA_NGUOIDUNG = bl.MA_NGUOIDUNG join sanpham on sanpham.MA_SP = bl.MA_SP  WHERE bl.ma_sp =  ?";
        $param = [$ma_sp];
        $list = DB::select($sql, $param);
        return $list;
    }
}
