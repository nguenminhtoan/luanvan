<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Donhang extends Model
{
    use HasFactory;
    
    public static function list_dh_ch($mach, $batdau, $ketthuc, $tt){
        $sql = "select donhang.*, vt.PHUONGTHUC_VANCHUYEN, tt.PHUONGTHUC_THANHTOAN,
                 t.TEN_TRANGTHAI, km.TEN_KM, km.GIAMGIA from donhang 
                 inner join vanchuyen vt on vt.MA_VANCHUYEN = donhang.MA_VANCHUYEN 
                 inner join thanhtoan tt on tt.MA_THANHTOAN = donhang.MA_THANHTOAN 
                 left join khuyenmai km on km.MA_KHUYENMAI = donhang.MA_KHUYENMAI 
                 inner join trangthai t on t.MA_TRANGTHAI = donhang.MA_TRANGTHAI
                 WHERE MA_CUAHANG = ? AND t.MA_TRANGTHAI != 1 AND NGAYDAT BETWEEN ? AND ? ";
        
        $param = [$mach, $batdau, $ketthuc];
        if($tt){
            $sql .= " AND donhang.MA_TRANGTHAI = ? ";
            array_push($param, $tt);
        }
        $sql .= " ORDER BY  ma_donban DESC, ngaydat ASC  ";
        
        $list = DB::select($sql, $param);
        return $list;
    }
    
    public static function list_dh_nd($mand){
        $sql = "select donhang.*, vt.PHUONGTHUC_VANCHUYEN, vt.DONGIA, tt.PHUONGTHUC_THANHTOAN, ch.*, km.*,
                 t.TEN_TRANGTHAI, km.TEN_KM, km.GIAMGIA, '' as SANPHAM, MA_BINHLUAN as DANHGIA from donhang 
                 inner join vanchuyen vt on vt.MA_VANCHUYEN = donhang.MA_VANCHUYEN 
                 inner join thanhtoan tt on tt.MA_THANHTOAN = donhang.MA_THANHTOAN 
                 left join khuyenmai km on km.MA_KHUYENMAI = donhang.MA_KHUYENMAI 
                 left join binhluan bl on bl.MA_DONBAN = donhang.MA_DONBAN
                 inner join trangthai t on t.MA_TRANGTHAI = donhang.MA_TRANGTHAI
                 inner join cuahang ch on ch.MA_CUAHANG = donhang.MA_CUAHANG
                 WHERE donhang.MA_NGUOIDUNG = ? GROUP BY donhang.MA_DONBAN ORDER BY ngaydat, ma_donban DESC ";
        $param = [$mand];
        $list = DB::select($sql, $param);
        
        foreach($list as $item){
            $sp = DB::select("select sp.*, ctdonhang.SOLUONG, ctdonhang.DONGIA, ctdonhang.SOLUONG * ctdonhang.DONGIA as THANHTIEN ,h1.URL
                     from sanpham sp 
                    inner JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sp.MA_SP
                     inner join ctdonhang on sp.MA_SP = ctdonhang.MA_SP where MA_DONBAN = ?", [$item->MA_DONBAN]);
            $item->SANPHAM = $sp;
        }
        
        return $list;
    }
    
    public static function list_ct_dh($madb){
        $sql = "select * from ctdonhang
                inner join sanpham sp on sp.MA_SP = ctdonhang.MA_SP
                inner JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sp.MA_SP
                WHERE ma_donban = ? ";
        $param = [$madb];
        $list = DB::select($sql, $param);
        return $list;
    }
    
    
    public static function get_dh_ma($madb){
        $sql = "select * from donhang
                inner join nguoidung nd on nd.MA_NGUOIDUNG = donhang.MA_NGUOIDUNG
                inner join vanchuyen vt on vt.MA_VANCHUYEN = donhang.MA_VANCHUYEN 
                inner join thanhtoan tt on tt.MA_THANHTOAN = donhang.MA_THANHTOAN 
                left join khuyenmai km on km.MA_KHUYENMAI = donhang.MA_KHUYENMAI 
                inner join trangthai t on t.MA_TRANGTHAI = donhang.MA_TRANGTHAI
                WHERE ma_donban = ? ";
        $param = [$madb];
        $list = DB::select($sql, $param)[0];
        return $list;
    }
    
}
