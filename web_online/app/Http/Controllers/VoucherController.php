<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Khuyenmai;
use Session;
use DB;

class VoucherController extends Controller
{
    public function voucher(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $vc = DB::SELECT('select *from khuyenmai' );
        
        return view ("voucher/voucher",['khuyenmai' => $vc, "cuahang" => $cuahang[0]]);
    }
    public function voucher_add(){
        $loaisp = new Khuyenmai(); 
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $khuyenmai = DB::SELECT('select * from khuyenmai' );
        return view ("voucher.voucher_add",['loai' => $loaisp, 'khuyenmai' => $khuyenmai, "cuahang" => $cuahang[0]]);
    }
    public function voucher_save(Request $req){
        
        $khuyenmai = new Khuyenmai(["MA_KHUYENMAI"=>$req->MA_KHUYENMAI,"TEN_KM"=>$req->TEN_KM,"BATDAU"=>$req->BATDAU,"KETTHUC"=>$req->KETTHUC,"GIAMGIA"=>$req->GIAMGIA]);
        $sql = "INSERT INTO `khuyenmai`(`MA_KHUYENMAI`, `TEN_KM`,`BATDAU`,`KETTHUC`,`GIAMGIA`) VALUES (:MA_KHUYENMAI,:TEN_KM,:BATDAU,:KETTHUC,:GIAMGIA)";
        $param =['MA_KHUYENMAI' => $khuyenmai->MA_KHUYENMAI,'TEN_KM' => $khuyenmai->TEN_KM,'BATDAU'=>$khuyenmai->BATDAU,'KETTHUC'=>$khuyenmai->KETTHUC,'GIAMGIA'=>$khuyenmai->GIAMGIA] ;
        if(DB::insert($sql, $param)){
            return redirect("/admin/voucher/index");
        }
    }
    public function voucher_edit(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $loai = DB::select("SELECT * from khuyenmai WHERE MA_KHUYENMAI = :MA_KHUYENMAI", ["MA_KHUYENMAI" => $req->id]);
        $khuyenmai = DB::SELECT('select *from khuyenmai');
        return view ("voucher/voucher_edit",['khuyenmai' => $khuyenmai, 'loai' => $loai[0], "cuahang" => $cuahang[0]]);
        
    }
    public function voucher_update(Request $req) {
        $khuyenmai = new khuyenmai(["MA_KHUYENMAI"=>$req->MA_KHUYENMAI,"TEN_KM"=>$req->TEN_KM,"BATDAU"=>$req->BATDAU,"KETTHUC"=>$req->KETTHUC,"GIAMGIA"=>$req->GIAMGIA]);
        $param = ['MA_KHUYENMAI' => $khuyenmai->MA_KHUYENMAI,'TEN_KM' => $khuyenmai->TEN_KM,'BATDAU' => $khuyenmai->BATDAU,'KETTHUC'=>$khuyenmai->KETTHUC,'GIAMGIA'=>$khuyenmai->GIAMGIA,'ID'=>$req->id];
        $sql = 'UPDATE `khuyenmai` Set `TEN_KM` = :TEN_KM,`BATDAU` = :BATDAU, KETTHUC = :KETTHUC,GIAMGIA= :GIAMGIA, `MA_KHUYENMAI` = :MA_KHUYENMAI WHERE MA_KHUYENMAI = :ID';
        
        if(DB::insert($sql, $param)){
            return redirect("/admin/voucher/index");
        }
        
    }
    public function voucher_detele(Request $req){
        DB::delete('DELETE FROM `khuyenmai` WHERE `khuyenmai`.`MA_KHUYENMAI` = :ID',["ID" => $req->id]);
        return redirect("/admin/voucher/index");
    }
}
