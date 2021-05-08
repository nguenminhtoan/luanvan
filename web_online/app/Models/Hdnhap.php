<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Hdnhap extends Model
{
    use HasFactory;
    protected $fillable = ['MA_DHNHAP', 'NGAYNHAP', 'TONGTIEN','MA_NGUOIDUNG'];
    
    public static function list_sanpham($ma_ch, $batdau, $ketthuc){
        $sql = "SELECT hdnhap.*, SUM(ctnhap.SOLUONG) AS SOLUONG, (select GROUP_CONCAT(sp.TEN_SP) from ctnhap ct JOIN sanpham sp ON sp.MA_SP = ct.MA_SP WHERE ct.MA_DONNHAP = hdnhap.MA_DONNHAP group by ct.MA_DONNHAP) AS TEN_SP FROM hdnhap 
                            join ctnhap ON hdnhap.MA_DONNHAP = ctnhap.MA_DONNHAP
                            JOIN nguoidung ON nguoidung.MA_NGUOIDUNG = hdnhap.MA_NGUOIDUNG where nguoidung.MA_CUAHANG = ? AND NGAYNHAP BETWEEN ? AND ? GROUP BY MA_DONNHAP ORDER BY MA_DONNHAP DESC, NGAYNHAP ASC 
                            ";
        
//        $sql = "select * from hdnhap 
//                    innner join ctnhap ON hdnhap.MA_DONNHAP = ctnhap.MA_DONNHAP
//                    JOIN nguoidung ON nguoidung.MA_NGUOIDUNG = hdnhap.MA_NGUOIDUNG where nguoidung.MA_CUAHANG = :MA_CUAHANG GROUP BY MA_DONNHAP
//                 where "
        $param = [$ma_ch, $batdau, $ketthuc];
        $list = DB::select($sql, $param);
        return $list;
    }
    
    
    public static function hd_mahd($ma_hd){
        $sql = "SELECT * from hdnhap where MA_DONNHAP = ? 
                            ";
        
//        $sql = "select * from hdnhap 
//                    innner join ctnhap ON hdnhap.MA_DONNHAP = ctnhap.MA_DONNHAP
//                    JOIN nguoidung ON nguoidung.MA_NGUOIDUNG = hdnhap.MA_NGUOIDUNG where nguoidung.MA_CUAHANG = :MA_CUAHANG GROUP BY MA_DONNHAP
//                 where "
        $param = [$ma_hd];
        $list = DB::select($sql, $param)[0];
        return $list;
    }
    
    
    public static function ct_hd_mahd($ma_hd){
        $sql = "SELECT ctnhap.*, sp.TEN_SP from ctnhap join sanpham sp on sp.MA_SP = ctnhap.MA_SP where MA_DONNHAP = ? 
                            ";
        
//        $sql = "select * from hdnhap 
//                    innner join ctnhap ON hdnhap.MA_DONNHAP = ctnhap.MA_DONNHAP
//                    JOIN nguoidung ON nguoidung.MA_NGUOIDUNG = hdnhap.MA_NGUOIDUNG where nguoidung.MA_CUAHANG = :MA_CUAHANG GROUP BY MA_DONNHAP
//                 where "
        $param = [$ma_hd];
        $list = DB::select($sql, $param);
        return $list;
    }
    
}
