<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Hdnhap;

use App\Models\Sanpham;

use App\Models\Donhang;

use Session;

use App\Models\Cuahang;


class DashboardController extends Controller
{   

    public function sodo(Request $req){
       $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
       $cuahang = DB::select('SELECT cuahang.*, SUM(sanpham.LUOTXEM) AS LUOTXEM 
                                FROM cuahang
                                inner join sanpham on cuahang.MA_CUAHANG = sanpham.MA_CUAHANG 
                                where cuahang.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
       $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $dhn = Hdnhap::list_sanpham($mach, $batdau,$ketthuc);
       return view("dashboard.index1",['donhang'=>$dhn,'cuahang'=>$cuahang[0],'mach'=>$mach]);
  
    }
    
    public function index(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('SELECT cuahang.*, SUM(sanpham.LUOTXEM) AS LUOTXEM 
                                FROM cuahang
                                inner join sanpham on cuahang.MA_CUAHANG = sanpham.MA_CUAHANG 
                                where cuahang.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $t_dh = DB::select('select count(*) AS DH from donhang
                            WHERE MA_CUAHANG=:MA_CUAHANG AND MA_TRANGTHAI not in (1,7,8) 
                            AND month(NGAYBAN) <= month(CURDATE())',['MA_CUAHANG' => $mach]);
        
        $dh = DB::select('select COUNT(*) as DH, SUM(TONGTIEN) as DOANHTHU
                            from donhang WHERE MA_CUAHANG = :MA_CUAHANG
                            AND MA_TRANGTHAI not in (1,7,8) 
                            AND month(NGAYBAN) = month(CURDATE())', ['MA_CUAHANG' => $mach]);
        $t = DB:: select('select COUNT(*) as DH,SUM(TONGTIEN) as DOANHTHU 
                            from donhang WHERE MA_CUAHANG = :MA_CUAHANG 
                            AND MA_TRANGTHAI not in (1,7,8) 
                            AND month(NGAYBAN) = month(CURDATE())-1;', ['MA_CUAHANG' => $mach]);
        $hnay = DB:: select('select CASE WHEN COUNT(*) IS NULL THEN 0 ELSE COUNT(*)END as DH,CASE WHEN SUM(TONGTIEN)IS NULL THEN 0 ELSE SUM(TONGTIEN)END as DOANHTHU 
                            from donhang WHERE MA_CUAHANG = :MA_CUAHANG 
                            AND MA_TRANGTHAI not in (1,7,8) 
                            AND NGAYBAN =(CURDATE())', ['MA_CUAHANG' => $mach]);
        $lnnow = DB:: select('select TG, SUM(LOINHUAN) as LN from
                    (select month(ctdonhang.NGAYBAN) AS TG,sp.MA_SP ,SUM(ctnhap.SOLUONG) AS SLVAO,ctnhap.DONGIA AS GIAVAO ,CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END * ctdonhang.DONGIA - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END*(ctnhap.DONGIA) AS LOINHUAN,  CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as SLRA,CASE WHEN ctdonhang.DONGIA IS NULL THEN 0 ELSE ctdonhang.DONGIA END as GIARA from sanpham sp 
                                   inner join danhmuc on danhmuc.MA_DANHMUC = sp.MA_DANHMUC
                                   left join (select ctdonhang.MA_SP, donhang.NGAYBAN,SUM(ctdonhang.SOLUONG) as SOLUONG, ctdonhang.DONGIA from donhang 
                                   inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN 
                                   where ma_trangthai not in (1,7,8) 
                                   GROUP BY ctdonhang.MA_SP ) as ctdonhang on sp.MA_SP = ctdonhang.MA_SP
                                   inner join ctnhap on ctnhap.MA_SP = sp.MA_SP 
                                   WHERE sp.MA_CUAHANG = :MA_CUAHANG AND ctdonhang.SOLUONG >0 AND MONTH(ctdonhang.NGAYBAN) <= month(curdate())
                                   GROUP BY sp.MA_SP , month(ctdonhang.NGAYBAN)) AS tb
                   where TG = month(curdate())                
                   group by TG', ['MA_CUAHANG' => $mach]);
        $lntrc = DB:: select('select TG, SUM(LOINHUAN) as LN from
                    (select month(ctdonhang.NGAYBAN) AS TG,sp.MA_SP ,SUM(ctnhap.SOLUONG) AS SLVAO,ctnhap.DONGIA AS GIAVAO ,CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END * ctdonhang.DONGIA - CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END*(ctnhap.DONGIA) AS LOINHUAN,  CASE WHEN ctdonhang.SOLUONG IS NULL THEN 0 ELSE ctdonhang.SOLUONG END as SLRA,CASE WHEN ctdonhang.DONGIA IS NULL THEN 0 ELSE ctdonhang.DONGIA END as GIARA from sanpham sp 
                                   inner join danhmuc on danhmuc.MA_DANHMUC = sp.MA_DANHMUC
                                   left join (select ctdonhang.MA_SP, donhang.NGAYBAN,SUM(ctdonhang.SOLUONG) as SOLUONG, ctdonhang.DONGIA from donhang 
                                   inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN 
                                   where ma_trangthai not in (1,7,8) 
                                   GROUP BY ctdonhang.MA_SP ) as ctdonhang on sp.MA_SP = ctdonhang.MA_SP
                                   inner join ctnhap on ctnhap.MA_SP = sp.MA_SP 
                                   WHERE sp.MA_CUAHANG = :MA_CUAHANG AND ctdonhang.SOLUONG >0 AND MONTH(ctdonhang.NGAYBAN) <= month(curdate())
                                   GROUP BY sp.MA_SP , month(ctdonhang.NGAYBAN)) AS tb
                    where TG = month(curdate())-1                
                   group by TG', ['MA_CUAHANG' => $mach]);
        $sd_doanhthu = Donhang::tk_dt($mach);
        $sd_loinhuan = Donhang::tk_ln($mach);
        $sp_banchay = Donhang::banchay_ch($mach);
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $dhn = Hdnhap::list_sanpham($mach, $batdau,$ketthuc);
        $lnnow = count($lnnow) > 0 ? $lnnow[0] : "";
        $hnay = count($hnay) > 0 ? $hnay[0] : [];
        $lntrc = count($lntrc) > 0 ? $lntrc[0] : "";
        $t = count($t) > 0? $t[0] : [];
        $t_dh = count($t_dh) > 0 ? $t_dh[0] : [];
        $dh = count($dh) > 0 ? $dh[0] : [];
        
        return view("dashboard.index",['doanhthu'=>$sd_doanhthu,'loinhuan'=>$sd_loinhuan,'hnay'=>$hnay,'banchay'=>$sp_banchay,'lnnow'=>$lnnow,'lntrc'=>$lntrc,'t'=>$t,'t_dh'=>$t_dh,'dh' => $dh,'batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhang'=>$dhn,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
}
