<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;

use DB;
use App\Models\Donhang;
class OrdersController extends Controller
{
    public function orders(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $trangthai = $req->trangthai;
        $list_tt = DB::select("select * from trangthai WHERE MA_TRANGTHAI != 1");
        $donhang = Donhang::list_dh_ch($mach, $batdau, $ketthuc, $trangthai);
       return view("orders.orders",['list_tt' => $list_tt, "trangthai" => $trangthai ,'batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhangban'=>$donhang,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    public function history(){
        $user = Session::get("MA_NGUOIDUNG");
        $danhmuc = DB::select('select *from danhmuc');
        if ($user){
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
        }else{
            $soluong = 0;
        }
        return view("orders.history_orders",['danhmuc'=>$danhmuc,'user'=>$user,'soluong' => $soluong]);
    }
    public function detail(Request $req) {
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);        
        $ctiet = Donhang::list_ct_dh($req->id);
        $donhang = Donhang::get_dh_ma($req->id);
        return view("orders.detail_orders",['donhangban'=>$ctiet,'cuahang'=>$cuahang[0],'mach'=>$mach, "donhang"=>$donhang]);
    }
    
    
    
    public function update_status(Request $req) {
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        DB::update("update donhang set ma_trangthai = ?, NGAYBAN =? Where ma_donban = ?", [$req->MA_TRANGTHAI ,date("Y/m/d") ,$req->id]);
        return redirect("/admin/orders/index");
    }
}
