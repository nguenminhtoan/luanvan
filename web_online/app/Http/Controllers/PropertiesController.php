<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Thuoctinh;
use Session;
use DB;

class PropertiesController extends Controller
{
    public function index(){
        
        $vc = DB::SELECT('select *from thuoctinh' );
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        
        
        return view ("properties.properties",['thuoctinh' => $vc, "cuahang" => $cuahang[0]]);
    }
    public function properties_add(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        
        $loaisp = new Thuoctinh(); 
        $thuoctinh = DB::SELECT('select * from thuoctinh' );
        return view ("properties.properties_add",['loai' => $loaisp, 'thuoctinh' => $thuoctinh, "cuahang" => $cuahang[0]]);
    }
    public function properties_save(Request $req){
        
        $thuoctinh = new Thuoctinh(["MA_THUOCTINH"=>$req->MA_THUOCTINH,"TEN_THUOCTINH"=>$req->TEN_THUOCTINH]);
        $sql = "INSERT INTO `thuoctinh`(`MA_THUOCTINH`, `TEN_THUOCTINH`) VALUES (:MA_THUOCTINH,:TEN_THUOCTINH)";
        $param =['MA_THUOCTINH' => $thuoctinh->MA_THUOCTINH,'TEN_THUOCTINH' => $thuoctinh->TEN_THUOCTINH,];
        if(DB::insert($sql, $param)){
            return redirect("/admin/properties/index");
        }
    }
    public function properties_edit(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        
        $loai = DB::select("SELECT * from thuoctinh WHERE MA_THUOCTINH = :MA_THUOCTINH", ["MA_THUOCTINH" => $req->id]);
        $thuoctinh = DB::SELECT('select *from thuoctinh');
        return view ("properties/properties_edit",['thuoctinh' => $thuoctinh, 'loai' => $loai[0], "cuahang" => $cuahang[0]]);
        
    }
    public function properties_update(Request $req) {
        $thuoctinh = new thuoctinh(["MA_THUOCTINH"=>$req->MA_THUOCTINH,"TEN_THUOCTINH"=>$req->TEN_THUOCTINH]);
        $param = ['MA_THUOCTINH' => $thuoctinh->MA_THUOCTINH,'TEN_THUOCTINH' => $thuoctinh->TEN_THUOCTINH,'ID'=>$req->id];
        $sql = 'UPDATE `thuoctinh` Set `TEN_THUOCTINH` = :TEN_THUOCTINH,`MA_THUOCTINH` = :MA_THUOCTINH WHERE MA_THUOCTINH = :ID';
        
        if(DB::insert($sql, $param)){
            return redirect("/admin/properties/index");
        }
        
    }
    public function properties_detele(Request $req){
        DB::delete('DELETE FROM `thuoctinh` WHERE `thuoctinh`.`MA_THUOCTINH` = :ID',["ID" => $req->id]);
        return redirect("/admin/properties/index");
    }
}
