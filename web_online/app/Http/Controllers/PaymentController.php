<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thanhtoan;
use Session;
use DB;

class PaymentController extends Controller
{
    public function payment(){
        
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $ttinh = DB::SELECT('select *from thanhtoan' );
        
        return view ("payment/payment",['loaisp' => $ttinh, "cuahang" => $cuahang[0]]);
    }
    public function payment_add(){
        $loai = new Thanhtoan(); 
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $pttt = DB::SELECT('select * from thanhtoan' );
        return view ("payment/payment_add",['loai' => $loai,'thanhtoan'=>$pttt, "cuahang" => $cuahang[0]]);
    }
    public function payment_save(Request $req){
        
        $thanhtoan = new Thanhtoan(["MA_THANHTOAN"=>$req->MA_THANHTOAN,"PHUONGTHUC_THANHTOAN"=>$req->PHUONGTHUC_THANHTOAN]);
        $sql = "INSERT INTO `thanhtoan`(`MA_THANHTOAN`, `PHUONGTHUC_THANHTOAN`) VALUES (:MA_THANHTOAN,:PHUONGTHUC_THANHTOAN)";
        $param =['MA_THANHTOAN' => $thanhtoan->MA_THANHTOAN,'PHUONGTHUC_THANHTOAN' => $thanhtoan->PHUONGTHUC_THANHTOAN] ;
        if(DB::insert($sql, $param)){
            return redirect("/admin/payment/index");
        }
    }
    public function payment_edit(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $loai = DB::select("SELECT * from thanhtoan WHERE MA_THANHTOAN = :MA_THANHTOAN", ["MA_THANHTOAN" => $req->id]);
        $thanhtoan = DB::SELECT('select *from thanhtoan');
        return view ("payment/payment_edit",['thanhtoan' => $thanhtoan, 'loai' => $loai[0], "cuahang" => $cuahang[0]]);
        
    }
    public function payment_update(Request $req) {
        $pttt = new Thanhtoan(["MA_THANHTOAN"=>$req->MA_THANHTOAN,"PHUONGTHUC_THANHTOAN"=>$req->PHUONGTHUC_THANHTOAN]);
        $param = ['MA_THANHTOAN' => $pttt->MA_THANHTOAN,'PHUONGTHUC_THANHTOAN' => $pttt->PHUONGTHUC_THANHTOAN,'ID'=>$req->id];
        $sql = 'UPDATE `Thanhtoan` Set `PHUONGTHUC_THANHTOAN` = :PHUONGTHUC_THANHTOAN, `MA_THANHTOAN` = :MA_THANHTOAN WHERE MA_THANHTOAN=:ID';
        if(DB::insert($sql, $param)){
            return redirect("/admin/payment/index");
        }
        
    }
    public function payment_detele(Request $req){
        DB::delete('DELETE FROM `thanhtoan` WHERE `thanhtoan`.`MA_THANHTOAN` = :ID',["ID" => $req->id]);
        return redirect("/admin/payment/index");
    }
    
}
