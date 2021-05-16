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
    public static function tk_dh($mach){
        $sql = "SELECT month(NGAYDAT) as THANG,count(NGAYDAT) AS TONG FROM DONHANG
                            WHERE MA_CUAHANG= ? AND MA_TRANGTHAI not in (1,7,8)
                            AND month(NGAYDAT) <= month(CURDATE())
                            group by month(NGAYDAT)";
        $param = [$mach];
        $list = DB::select($sql, $param);
        
        return $list;
    }
    public static function tk_dt($mach) {
        $sql = 'select month(NGAYDAT),count(*) AS DH ,SUM(TONGTIEN)as DT from donhang 
                WHERE MA_CUAHANG=? AND MA_TRANGTHAI not in (1,7,8) 
                AND month(NGAYDAT) <= month(CURDATE())
                group by month(NGAYDAT)';
        $param = [$mach];
        $list = DB::select($sql, $param);
        return $list;
    }
    public static function tk_ln($mach) {
        $sql = ' select TG, SUM(LOINHUAN) as LN from
                (select month(ctdonhang.NGAYDAT) AS TG,sp.MA_SP ,SUM(ctnhap.SOLUONG) AS SLVAO,ctnhap.DONGIA AS GIAVAO ,CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END * ctdonhang.DONGIA - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END*(ctnhap.DONGIA) AS LOINHUAN,  CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as SLRA,CASE WHEN ctdonhang.DONGIA IS NULL THEN 0 ELSE ctdonhang.DONGIA END as GIARA from sanpham sp 
                               inner join danhmuc on danhmuc.MA_DANHMUC = sp.MA_DANHMUC
                               left join (select ctdonhang.MA_SP, donhang.NGAYDAT,SUM(ctdonhang.SOLUONG) as SOLUONG, ctdonhang.DONGIA from donhang 
                                                                       inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN 
                                           where ma_trangthai not in (1,7,8) 
                                           GROUP BY ctdonhang.MA_SP ) as ctdonhang on sp.MA_SP = ctdonhang.MA_SP
                               inner join ctnhap on ctnhap.MA_SP = sp.MA_SP 
                               WHERE sp.MA_CUAHANG = ? AND ctdonhang.SOLUONG >0 AND MONTH(ctdonhang.NGAYDAT) <= month(curdate())
                               GROUP BY sp.MA_SP , month(ctdonhang.NGAYDAT)) AS tb
               where TG <= month(curdate())                
               group by TG';
        $param = [$mach];
        $list = DB::select($sql, $param);
        return $list;
    }
    
    public static function banchay_ch($mach){
        $sql = "select sp.MA_SP,sp.MA_CUAHANG, ctdonhang.DONGIA, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, h1.URL, SUM(ctnhap.SOLUONG) as TONGSL, SUM(ct.SOLUONG) - ctdonhang.SOLUONG as KHO , ctdonhang.SOLUONG, bl.DANHGIA from ctnhap ct
                inner join sanpham sp on sp.MA_SP = ct.MA_SP 
                inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                inner join (select  ctdonhang.DONGIA,ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN 
                where donhang.NGAYDAT >= CURDATE()- 7 and ma_trangthai not in (1,7,8)  GROUP BY ctdonhang.MA_SP HAVING SUM(ctdonhang.SOLUONG) > 1 ) as ctdonhang on ctdonhang.MA_SP = sp.MA_SP
                where sp.MA_CUAHANG= ?
                GROUP BY sp.MA_SP ORDER BY sp.MA_SP DESC LIMIT 20;";
        $param = [$mach];
        $list = DB::select($sql, $param);
        return $list;
    }
    
}
