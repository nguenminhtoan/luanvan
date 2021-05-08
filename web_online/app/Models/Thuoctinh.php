<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Thuoctinh extends Model
{
    use HasFactory;
    protected $fillable = ['MA_THUOCTINH', 'TEN_THUOCTINH'];
    
    public static function get_all(){
        $sql = "SELECT * FROM thuoctinh inner join thuoctinh_sp tt on thuoctinh.ma_thuoctinh = tt.ma_thuoctinh group by GIATRI";
        $list = DB::select($sql);
        return $list;
    }
    
    
}
