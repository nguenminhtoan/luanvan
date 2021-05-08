<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Vanchuyen;

use DB;

class ShipmentController extends Controller
{
    public function shipment(){
        
        $vc = DB::SELECT('select *from vanchuyen' );
        
        return view ("shipment/shipment",['vanchuyen' => $vc]);
    }
    public function shipment_add(){
        $loaisp = new Vanchuyen(); 
        $vanchuyen = DB::SELECT('select * from vanchuyen' );
        return view ("shipment/shipment_add",['loai' => $loaisp, 'vanchuyen' => $vanchuyen]);
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
        $loai = DB::select("SELECT * from vanchuyen WHERE MA_VANCHUYEN = :MA_VANCHUYEN", ["MA_VANCHUYEN" => $req->id]);
        $vanchuyen = DB::SELECT('select *from vanchuyen');
        return view ("shipment/shipment_edit",['vanchuyen' => $vanchuyen, 'loai' => $loai[0]]);
        
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
}
