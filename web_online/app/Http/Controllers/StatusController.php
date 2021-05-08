<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Models\Trangthai;

use DB;

class StatusController extends Controller
{
    public function status(){
        
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $status = DB::SELECT('select *from trangthai' );
        
        return view ("status/status",['trangthai' => $status, "cuahang" => $cuahang[0]]);
    }
    public function status_add(){
        $loai = new Trangthai(); 
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $trangthai = DB::SELECT('select * from trangthai' );
        return view ("status/status_add",['loai' => $loai, 'trangthai' => $trangthai, "cuahang" => $cuahang[0]]);
    }
    public function status_save(Request $req){
        
        $trangthai = new Trangthai(["MA_TRANGTHAI"=>$req->MA_TRANGTHAI,"TEN_TRANGTHAI"=>$req->TEN_TRANGTHAI]);
        $sql = "INSERT INTO `trangthai`(`MA_TRANGTHAI`, `TEN_TRANGTHAI`) VALUES (:MA_TRANGTHAI,:TEN_TRANGTHAI)";
        $param =['MA_TRANGTHAI' => $trangthai->MA_TRANGTHAI,'TEN_TRANGTHAI' => $trangthai->TEN_TRANGTHAI] ;
        if(DB::insert($sql, $param)){
            return redirect("/admin/status/index");
        }
    }
    public function status_edit(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $loai = DB::select("SELECT * from trangthai WHERE MA_TRANGTHAI = :MA_TRANGTHAI", ["MA_TRANGTHAI" => $req->id]);
        $trangthai = DB::SELECT('select *from trangthai');
        return view ("status/status_edit",['trangthai' => $trangthai, 'loai' => $loai[0], "cuahang" => $cuahang[0]]);
        
    }
    public function status_update(Request $req) {
        $trangthai = new Trangthai(["MA_TRANGTHAI"=>$req->MA_TRANGTHAI,"TEN"=>$req->TEN]);
        $param = ['MA_TRANGTHAI' => $trangthai->MA_TRANGTHAI,'TEN_TRANGTHAI' => $trangthai->TEN_TRANGTHAI,'ID'=>$req->id];
        $sql = 'UPDATE `trangthai` Set `TEN_TRANGTHAI` = :TEN_TRANGTHAI,`MA_TRANGTHAI` = :MA_TRANGTHAI WHERE MA_TRANGTHAI = :ID';
        
        if(DB::insert($sql, $param)){
            return redirect("/admin/status/index");
        }
    }    
    public function status_detele(Request $req){
        DB::delete('DELETE FROM `trangthai` WHERE `trangthai`.`MA_TRANGTHAI` = :ID',["ID" => $req->id]);
        return redirect("/admin/status/index");
    }
}
