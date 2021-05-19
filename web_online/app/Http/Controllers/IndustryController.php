<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nganhhang;

use DB;

use Session;

class IndustryController extends Controller
{
    public function industries(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $nhch = DB::SELECT('select *from nganhhang' );
        
        return view ("industries/industries",['nganhhang' => $nhch,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    public function industries_add(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $loai = new Nganhhang(); 
        $nganhhang= DB::SELECT('select * from nganhhang' );
        return view ("industries.industries_add",['nganhhang'=>$nganhhang,'loai' => $loai,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    public function industries_save(Request $req){
        
        $nganhhang = new Nganhhang(["MA_NGANH"=>$req->MA_NGANH,"TEN"=>$req->TEN]);
        $sql = "INSERT INTO `nganhhang`( `TEN`) VALUES (:TEN)";
        $param =['TEN' => $nganhhang->TEN] ;
        if(DB::insert($sql, $param)){
            return redirect("/admin/industries/index");
        }
    }
    public function industries_edit(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $loai = DB::select("SELECT * from nganhhang WHERE MA_NGANH = :MA_NGANH", ["MA_NGANH" => $req->id]);
        $industries = DB::SELECT('select *from nganhhang');
        return view ("industries/industries_edit",['nganhhang' => $industries, 'loai' => $loai[0],'cuahang'=>$cuahang[0],'mach'=>$mach]);
        
    }
    public function industries_update(Request $req) {
        $nganhhang = new Nganhhang(["MA_NGANH"=>$req->MA_NGANH,"TEN"=>$req->TEN]);
        $param = ['TEN' => $nganhhang->TEN,'ID'=>$req->id];
        $sql = 'UPDATE `nganhhang` Set `TEN` = :TEN WHERE MA_NGANH = :ID';
        
        if(DB::insert($sql, $param)){
            return redirect("/admin/industries/index");
        }
    }    
    public function industries_detele(Request $req){
        DB::delete('DELETE FROM `nganhhang` WHERE `nganhhang`.`MA_NGANH` = :ID',["ID" => $req->id]);
        return redirect("/admin/industries/index");
    }
}
