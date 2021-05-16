<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vanchuyen;
use Session;
use DB;
use App\Models\Donhang;

class ShipmentController extends Controller
{
    public function shipment(){
        
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        
        $vc = DB::SELECT('select *from vanchuyen' );
        
        return view ("shipment/shipment",['vanchuyen' => $vc, "cuahang" => $cuahang[0]]);
    }
    public function shipment_add(){
        $loaisp = new Vanchuyen(); 
        
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $vanchuyen = DB::SELECT('select * from vanchuyen' );
        return view ("shipment/shipment_add",['loai' => $loaisp, 'vanchuyen' => $vanchuyen, "cuahang" => $cuahang[0]]);
    }
    public function shipment_save(Request $req){
        
        $vanchuyen = new Vanchuyen(["PHUONGTHUC_VANCHUYEN"=>$req->PHUONGTHUC_VANCHUYEN,"THOIGIADUKIEN"=>$req->THOIGIADUKIEN,"DONGIA"=>$req->DONGIA]);
        $sql = "INSERT INTO `vanchuyen`( `PHUONGTHUC_VANCHUYEN`,`THOIGIADUKIEN`, `DONGIA`) VALUES (:PHUONGTHUC_VANCHUYEN,:THOIGIADUKIEN,:DONGIA)";
        $param =['PHUONGTHUC_VANCHUYEN' => $vanchuyen->PHUONGTHUC_VANCHUYEN,'THOIGIADUKIEN' => $vanchuyen->THOIGIADUKIEN ,'DONGIA' => $vanchuyen->DONGIA] ;
        if(DB::insert($sql, $param)){
            return redirect("/admin/ship/index");
        }
    }
    public function shipment_edit(Request $req){
        
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $loai = DB::select("SELECT * from vanchuyen WHERE MA_VANCHUYEN = :MA_VANCHUYEN", ["MA_VANCHUYEN" => $req->id]);
        $vanchuyen = DB::SELECT('select *from vanchuyen');
        return view ("shipment/shipment_edit",['vanchuyen' => $vanchuyen, 'loai' => $loai[0], "cuahang" => $cuahang[0]]);
        
    }
    public function shipment_update(Request $req) {
        $vanchuyen = new Vanchuyen(["MA_VANCHUYEN"=>$req->MA_VANCHUYEN,"PHUONGTHUC_VANCHUYEN"=>$req->PHUONGTHUC_VANCHUYEN,"THOIGIADUKIEN"=>$req->THOIGIADUKIEN,"DONGIA"=>$req->DONGIA]);
        $param = ['MA_VANCHUYEN' => $vanchuyen->MA_VANCHUYEN,'PHUONGTHUC_VANCHUYEN' => $vanchuyen->PHUONGTHUC_VANCHUYEN,'THOIGIADUKIEN' => $vanchuyen->THOIGIADUKIEN ,'DONGIA' => $vanchuyen->DONGIA,'ID'=>$req->id];
        $sql = 'UPDATE `vanchuyen` Set `PHUONGTHUC_VANCHUYEN` = :PHUONGTHUC_VANCHUYEN, `THOIGIADUKIEN` =:THOIGIADUKIEN,`DONGIA` = :DONGIA,`MA_VANCHUYEN` = :MA_VANCHUYEN WHERE MA_VANCHUYEN=:ID';
        if(DB::insert($sql, $param)){
            return redirect("/admin/ship/index");
        }
        
    }
    public function shipment_detele(Request $req){
        DB::delete('DELETE FROM `vanchuyen` WHERE `vanchuyen`.`MA_VANCHUYEN` = :ID',["ID" => $req->id]);
        return redirect("/admin/ship/index");
    }
    
    public function shipper(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $trangthai = $req->trangthai;
        $list_tt = DB::select("select * from trangthai WHERE MA_TRANGTHAI != 1");
        $donhang = Donhang::list_all_dh($batdau, $ketthuc, $trangthai);
       return view("shipment.shipper",['list_tt' => $list_tt, "trangthai" => $trangthai ,'batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhangban'=>$donhang,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    
    public function detail(Request $req) {
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);        
        $ctiet = Donhang::list_ct_dh($req->id);
        $donhang = Donhang::get_dh_ma($req->id);
        return view("shipment.detail_orders",['donhangban'=>$ctiet,'cuahang'=>$cuahang[0],'mach'=>$mach, "donhang"=>$donhang]);
    }
    public function update_status(Request $req) {
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        DB::update("update donhang set ma_trangthai = ?,NGAYGIAO =? Where ma_donban = ?", [$req->MA_TRANGTHAI ,date("Y/m/d"), $req->id]);
        return redirect("/admin/ship/shipper");
    }
}
