<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thanhtoan;

use DB;

class PaymentController extends Controller
{
    public function payment(){
        
        $ttinh = DB::SELECT('select *from thanhtoan' );
        
        return view ("payment/payment",['loaisp' => $ttinh]);
    }
    public function payment_add(){
        $loai = new Thanhtoan(); 
        $pttt = DB::SELECT('select * from thanhtoan' );
        return view ("payment/payment_add",['loai' => $loai,'thanhtoan'=>$pttt]);
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
        $loai = DB::select("SELECT * from thanhtoan WHERE MA_THANHTOAN = :MA_THANHTOAN", ["MA_THANHTOAN" => $req->id]);
        $thanhtoan = DB::SELECT('select *from thanhtoan');
        return view ("payment/payment_edit",['thanhtoan' => $thanhtoan, 'loai' => $loai[0]]);
        
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
