<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Danhmuc;

use Session;

use DB;

class CategoriesController extends Controller
{
    public function categories_all(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $loaisp = DB::SELECT('select *from danhmuc' );
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        return view ("categories/categories_all",['danhmuc' => $loaisp,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    public function categories_add(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $loaisp = new Danhmuc(); 
        $danhmuc = DB::SELECT('select * from danhmuc' );
        return view ("categories/categories_add",['loai' => $loaisp, 'danhmuc' => $danhmuc,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    public function categories_save(Request $req){
        
        $image = $req->file('input_img');
        if ($image != ''){
            $name = time().'.jpg';
            $image->move(public_path('/images/categories/'), $name);
        }
        else{
            $name = "";
        }
        
        $loai = new Danhmuc(["DAN_MA_DANHMUC" => $req->DAN_MA_DANHMUC, "MA_DANHMUC"=>$req->MA_DANHMUC,"TEN_DANHMUC"=>$req->TEN_DANHMUC,"HINHANH"=>"/images/categories/".$name]);
        $sql = "INSERT INTO `danhmuc`(`MA_DANHMUC`, `TEN_DANHMUC`, `HINHANH`,`DAN_MA_DANHMUC`) VALUES (:MA_DANHMUC,:TEN_DANHMUC,:HINHANH,:DAN_MA_DANHMUC)";
        $param =['MA_DANHMUC' => $loai->MA_DANHMUC,'TEN_DANHMUC' => $loai->TEN_DANHMUC, 'HINHANH' => $loai->HINHANH,'DAN_MA_DANHMUC' =>$loai->DAN_MA_DANHMUC] ;
        if(DB::insert($sql, $param)){
            return redirect("/admin/categories/index");
        }
    }
    public function categories_edit(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $loai = DB::select("SELECT * from danhmuc WHERE MA_DANHMUC = :MA_DANHMUC", ["MA_DANHMUC" => $req->id]);
        $danhmuc = DB::SELECT('select * from danhmuc');
        return view ("categories/categories_edit",['danhmuc' => $danhmuc, 'loai' => $loai[0],'mach'=>$mach,'cuahang'=>$cuahang[0]]);
        
    } 
    public function categories_update(Request $req) {
        
        $image = $req->file('input_img');
        if ($image != ''){
            $name = time().'.jpg';
            $image->move(public_path('/images/categories/'), $name);
            $name = '/images/categories/'.$name;
        }
        else{
            $name = $req->HINHANH;
        }
        $danhmuc = new Danhmuc(["MA_DANHMUC"=>$req->MA_DANHMUC,"TEN_DANHMUC"=>$req->TEN_DANHMUC,"HINHANH"=>$name,'DAN_MA_DANHMUC'=>$req->DAN_MA_DANHMUC]);
        $param = ['MA_DANHMUC' => $danhmuc->MA_DANHMUC,'TEN_DANHMUC' => $danhmuc->TEN_DANHMUC,'HINHANH' => $danhmuc->HINHANH,'DAN_MA_DANHMUC'=>$danhmuc->DAN_MA_DANHMUC,'ID'=>$req->id];
        $sql = 'UPDATE `danhmuc` Set `MA_DANHMUC` = :MA_DANHMUC,`TEN_DANHMUC` = :TEN_DANHMUC,`HINHANH` = :HINHANH, DAN_MA_DANHMUC = :DAN_MA_DANHMUC WHERE MA_DANHMUC = :ID';
        
        if(DB::insert($sql, $param)){
            return redirect("/admin/categories/index");
        }
        
    }
    public function categories_detele(Request $req){
        DB::delete('DELETE FROM `danhmuc` WHERE `danhmuc`.`MA_DANHMUC` = :ID',["ID" => $req->id]);
        return redirect("/admin/categories/index");
    }
}
