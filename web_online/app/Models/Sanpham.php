<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Sanpham extends Model
{
    use HasFactory;
    protected $table = "sanpham";
    protected $fillable = ['MA_SANPHAM', 'MA_DANHMUC', 'MA_CUAHANG','TEN_SP','GIA','CHI_TIET','GIAMGIA','LUOTXEM', 'AN_HIEN'];
    
    
    public static function sanpham(){
        $sql = "select sp.MA_SP, sp.MA_DANHMUC, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, h1.URL, bl.DANHGIA, SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO, CASE WHEN bl.SL IS NULL THEN 0 ELSE bl.SL END as SL from sanpham sp 
                                inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA, COUNT(*) as SL from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                                left join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8) GROUP BY ctdonhang.MA_SP ) as ctdonhang 
                                on ctdonhang.MA_SP = sp.MA_SP WHERE sp.AN_HIEN = 1 GROUP BY sp.MA_SP ORDER BY sp.MA_SP DESC";
        
        $list = DB::select($sql);
        return $list;
    }
    
    public static function sell_shock(){
        $sql = "select sp.MA_SP, sp.MA_DANHMUC, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, h1.URL, ctdonhang.SOLUONG as SOLUONG, SUM(ctnhap.SOLUONG) as TONGSL, SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO, bl.DANHGIA from sanpham sp 
                                inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA, COUNT(*) as SL from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                                left join (select MA_SP, DONGIA, SUM(SOLUONG) as SOLUONG from ctdonhang GROUP BY ctdonhang.MA_SP, DONGIA) as ctdonhang on sp.MA_SP = ctdonhang.MA_SP AND sp.GIA - sp.GIAMGIA = ctdonhang.DONGIA
                                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                                inner join hdnhap on hdnhap.MA_DONNHAP = ctnhap.MA_DONNHAP WHERE sp.GIAMGIA / sp.GIA >= 0.5 AND sp.AN_HIEN = 1 GROUP BY sp.MA_SP HAVING MAX(hdnhap.NGAYNHAP) ORDER BY sp.MA_SP DESC";
        
        $list = DB::select($sql);
        return $list;
    }

    public static function rank(){
        $sql = "select sp.MA_SP, sp.MA_DANHMUC, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, h1.URL, bl.DANHGIA, CASE WHEN bl.SL IS NULL THEN 0 ELSE bl.SL END as SL ,
                                SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO from sanpham sp 
                                inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA, COUNT(*) as SL from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                                left join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8) GROUP BY ctdonhang.MA_SP ) as ctdonhang 
                                on ctdonhang.MA_SP = sp.MA_SP  WHERE bl.DANHGIA > 3 AND sp.AN_HIEN = 1 GROUP BY sp.MA_SP ORDER BY sp.MA_SP DESC";
        
        $list = DB::select($sql);
        return $list;
    }
    
    
    public static function comment(){
        $sql = "select sp.MA_SP, sp.MA_DANHMUC, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA ENDA as GIAMOI, h1.URL, bl.DANHGIA, CASE WHEN bl.SL IS NULL THEN 0 ELSE bl.SL END as SL ,
                                SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO from sanpham sp 
                                inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA, COUNT(*) as SL from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                                left join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8) GROUP BY ctdonhang.MA_SP ) as ctdonhang 
                                on ctdonhang.MA_SP = sp.MA_SP  WHERE sp.AN_HIEN = 1 GROUP BY sp.MA_SP ORDER BY sp.MA_SP DESC";
        
        $list = DB::select($sql);
        return $list;
    }

    public static function sanpham_moi(){
        $sql = "select sp.MA_SP, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, h1.URL, bl.DANHGIA, SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO from sanpham sp 
                                inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                                left join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8) GROUP BY ctdonhang.MA_SP ) as ctdonhang 
                                on ctdonhang.MA_SP = sp.MA_SP 
                                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                                inner join hdnhap on hdnhap.MA_DONNHAP = ctnhap.MA_DONNHAP WHERE hdnhap.NGAYNHAP >= CURDATE()-15 AND sp.AN_HIEN = 1 GROUP BY sp.MA_SP  ORDER BY sp.MA_SP DESC LIMIT 15 ";
        
        $list = DB::select($sql);
        return $list;
    }
    
    
    public static function banchay(){
        $sql = "select sp.MA_SP, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, h1.URL, SUM(ctnhap.SOLUONG) as TONGSL, SUM(ct.SOLUONG) - ctdonhang.SOLUONG as KHO , ctdonhang.SOLUONG, bl.DANHGIA from ctnhap ct
                inner join sanpham sp on sp.MA_SP = ct.MA_SP 
                inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                inner join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN 
                where donhang.NGAYDAT >= CURDATE()- 7 and ma_trangthai not in (1,7,8)  GROUP BY ctdonhang.MA_SP HAVING SUM(ctdonhang.SOLUONG) > 1 ) as ctdonhang on ctdonhang.MA_SP = sp.MA_SP
                GROUP BY sp.MA_SP ORDER BY sp.MA_SP DESC LIMIT 20";
        
        $list = DB::select($sql);
        return $list;
    }
    
    
    
    public static function search_ma_sp($list_ma){
        $sql = "select sp.MA_SP, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, h1.URL, bl.DANHGIA, SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO from sanpham sp 
                                inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                                left join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8) GROUP BY ctdonhang.MA_SP ) as ctdonhang
                                on ctdonhang.MA_SP = sp.MA_SP WHERE sp.AN_HIEN = 1 AND sp.MA_SP IN ('".join("','", $list_ma)."') GROUP BY sp.MA_SP ORDER BY sp.MA_SP DESC LIMIT 15 ";
        $param = [];
//        foreach($list_ma as $key => $val){
//            if ($key == 1 ){
//                $sql .= " sp.MA_SP = ? ";
//            }
//            else{
//                $sql .= " OR sp.MA_SP = ?  ";
//            }
//            array_push($param, $val);
//
//        }
//        $sql .= " ";
        $list = DB::select($sql, $param);
        return $list;
    }
    
    public static function muacung($ma){
        $sql = "select sp.MA_SP, sp.TEN_SP, sp.GIA, sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, h1.URL, bl.DANHGIA, SUM(ctnhap.SOLUONG) - ctdonhang.SOLUONG as KHO from sanpham sp
                    inner join (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 ON h1.MA_SP = sp.MA_SP
                    left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                    inner join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8) GROUP BY ctdonhang.MA_SP ) as ctdonhang on sp.MA_SP = ctdonhang.MA_SP
                    inner join ctnhap on ctnhap.MA_SP = sp.MA_SP
                    where sp.ma_sp in (select ctdonhang.MA_SP from ctdonhang where ctdonhang.MA_DONBAN IN (select MA_DONBAN from ctdonhang where ctdonhang.ma_sp = ? group by ctdonhang.MA_DONBAN) group by ma_sp) and sp.ma_sp != ? group by sp.ma_sp  ORDER BY sp.MA_SP DESC";
        $param = [$ma,$ma];
        $list = DB::select($sql, $param);
        return $list;
    }


    public static function list_show($ma_danhmuc, $giamin, $giamax, $thuoctinh, $search){
        $sql = "select sp.*,sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, '' as HINHANH,  SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO,  CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as SOLUONG, bl.DANHGIA , CASE WHEN bl.SL IS NULL THEN 0 ELSE bl.SL END as SL from sanpham sp 
                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA, COUNT(*) as SL from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                left join danhmuc on danhmuc.MA_DANHMUC = sp.MA_DANHMUC
                left join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8) GROUP BY ctdonhang.MA_SP ) as ctdonhang on sp.MA_SP = ctdonhang.MA_SP
                inner join ctnhap on ctnhap.MA_SP = sp.MA_SP WHERE sp.AN_HIEN = 1";
        $param = [];
        if (isset($ma_danhmuc)){
            if (!is_array($ma_danhmuc)) $ma_danhmuc = [$ma_danhmuc];
            $sql .= " AND ( ";
            foreach($ma_danhmuc as $key => $val){
                if ($key == 0 ){
                    $sql .= " sp.MA_DANHMUC = ? OR danhmuc.DAN_MA_DANHMUC = ? ";
                }
                else{
                    $sql .= " OR sp.MA_DANHMUC = ?  OR danhmuc.DAN_MA_DANHMUC = ? ";
                }
                array_push($param, $val);
                array_push($param, $val);
                
            }
            $sql .= " ) ";
        }
        
        if (isset($giamin) && isset($giamax)){
            $sql .= " AND sp.GIA between ? AND ? ";
            array_push($param, $giamin);
            array_push($param, $giamax);
        }
        
        if (isset($thuoctinh)){
            $sql .= " AND (";
            foreach($thuoctinh[0] as $key => $value){
                if($key == 0){
                    $sql .= " EXISTS ( select * from thuoctinh_sp tt WHERE tt.MA_SP = sp.MA_SP AND tt.MA_THUOCTINH = ? AND GIATRI = ? )";
                }
                else{
                    $sql .= " OR EXISTS ( select * from thuoctinh_sp tt WHERE tt.MA_SP = sp.MA_SP AND tt.MA_THUOCTINH = ? AND GIATRI = ? )";
                }
                array_push($param, $value);
                array_push($param, $thuoctinh[1][$key]);
            }
            $sql .= " )";
        }
        
        
        if (isset($search)){
            $sql .= " AND sp.TEN_SP like ?";
            array_push($param, "%{$search}%");
        }
        
        $sql .= " GROUP BY sp.MA_SP ORDER BY sp.MA_SP DESC ";
        
        $list = DB::select($sql, $param);
        foreach($list as $item){
            $hinh = DB::select("select * from hinhanh where MA_SP = :MA_SP AND VIDEO = 0 LIMIT 4", ["MA_SP" => $item->MA_SP]);
            $item->HINHANH = $hinh;
        }
        
        return $list;
    }
    
    public static function detail($ma){
        $sql = "select sp.*,sp.GIA - CASE WHEN sp.GIAMGIA IS NULL THEN 0 ELSE sp.GIAMGIA END as GIAMOI, '' as HINHANH, CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as SOLUONG, 
                SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO,
                bl.DANHGIA , CASE WHEN bl.SL IS NULL THEN 0 ELSE bl.SL END as SL, cuahang.TEN_CUAHANG
                from sanpham sp 
                left join (select dg.MA_SP, AVG(DANHGIA) as DANHGIA, COUNT(*) as SL from binhluan dg GROUP BY dg.MA_SP ) as bl on bl.MA_SP = sp.MA_SP
                inner join cuahang on cuahang.MA_CUAHANG = sp.MA_CUAHANG
                inner join ctnhap on sp.MA_SP = ctnhap.MA_SP
                left join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang 
                inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8)  
                GROUP BY ctdonhang.MA_SP ) as ctdonhang on ctdonhang.MA_SP = sp.MA_SP WHERE sp.AN_HIEN = 1 AND sp.MA_SP = ?";
        $param = [$ma];
        $list = DB::select($sql, $param);
        foreach($list as $item){
            $hinh = DB::select("select * from hinhanh where MA_SP = :MA_SP", ["MA_SP" => $ma]);
            $item->HINHANH = $hinh;
        }
        return $list[0];
    }
    

    public static function list_sp_ch($ma_ch){
        $sql = "select TEN_DANHMUC, sp.*,sp.GIA , sp.GIAMGIA ,  SUM(ctnhap.SOLUONG) - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as KHO,  CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as SOLUONG from sanpham sp 
                inner join danhmuc on danhmuc.MA_DANHMUC = sp.MA_DANHMUC
                left join (select ctdonhang.MA_SP, SUM(ctdonhang.SOLUONG) as SOLUONG from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN where ma_trangthai not in (1,7,8) GROUP BY ctdonhang.MA_SP ) as ctdonhang on sp.MA_SP = ctdonhang.MA_SP
                inner join ctnhap on ctnhap.MA_SP = sp.MA_SP WHERE sp.MA_CUAHANG = ? GROUP BY sp.MA_SP ORDER BY sp.MA_SP DESC";
        $param = [$ma_ch];
        $list = DB::select($sql, $param);
        return $list;
    }
    
    
}
