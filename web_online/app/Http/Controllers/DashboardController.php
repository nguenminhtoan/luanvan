<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Hdnhap;

use App\Models\Sanpham;

use Session;

use App\Models\Cuahang;

class DashboardController extends Controller
{
    public function index(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('SELECT cuahang.*, SUM(sanpham.LUOTXEM) AS LUOTXEM 
                                FROM cuahang
                                inner join sanpham on cuahang.MA_CUAHANG = sanpham.MA_CUAHANG 
                                where cuahang.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $dh = DB::select('select COUNT(*) as DH from donhang WHERE MA_CUAHANG = :MA_CUAHANG AND MA_TRANGTHAI not in (1,7,8)', ['MA_CUAHANG' => $mach]);
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $dhn = Hdnhap::list_sanpham($mach, $batdau,$ketthuc);
        return view("dashboard.index",['dh' => $dh[0],'batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhang'=>$dhn,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
}
