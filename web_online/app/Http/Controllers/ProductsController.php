<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Danhmuc;

use App\Models\Sanpham;

use App\Models\Hinhanh;

use App\Models\Thuoctinh_sp;

use Session;
use DB;
class ProductsController extends Controller
{
    public function product_add(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $sanpham = new Sanpham(); 
        $danhmuc = DB::SELECT('select * from danhmuc' );
        $thuoctinh = DB::select('select * from thuoctinh ');
        return view ("products.product_add",['danhmuc'=>$danhmuc, 'thuoctinh' => $thuoctinh,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    
    
    public function product_edit(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $sanpham = DB::select("select * from sanpham where MA_SP = :ID", ["ID" => $req->id]) ;
        $danhmuc = DB::SELECT('select * from danhmuc' );
        $thuoctinh = DB::select('select * from thuoctinh ');
        $thuoctinhsp = DB::select("select * from thuoctinh_sp WHERE MA_SP = :ID ", ["ID" => $req->id]);
        $hinhanh = DB::select("select * from hinhanh WHERE MA_SP = :ID ", ["ID" => $req->id]);
        return view ("products.product_edit",['danhmuc'=>$danhmuc, 'thuoctinh' => $thuoctinh, 'sanpham' => $sanpham[0], 'thuoctinhsp' => $thuoctinhsp, 'hinhanh' => $hinhanh,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }


    public function product_all(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $sp = Sanpham::list_sp_ch($mach);
        return view("products.product_all",['sanpham'=>$sp,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    
    
    public function product_update(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $sanpham = new Sanpham(['AN_HIEN' => $req->AN_HIEN,'TEN_SP' => $req->TEN_SP,'MA_DANHMUC' => $req->MA_DANHMUC,'MA_CUAHANG' => $mach,'GIA'=>$req->GIA,'CHI_TIET'=>$req->CHI_TIET,'GIAMGIA'=>$req->GIAMGIA]);
        $thuoctinh = $req->MA_THUOCTINH;
        $giatri = $req->GIATRI;
        $hinhanh = new Hinhanh();
        
        $sp = "UPDATE `sanpham` set `TEN_SP` = :TEN_SP, `MA_DANHMUC` = :MA_DANHMUC,`MA_CUAHANG` = :MA_CUAHANG,`GIA` = :GIA,`CHI_TIET` = :CHI_TIET,`GIAMGIA` = :GIAMGIA, AN_HIEN = :AN_HIEN WHERE MA_SP = :ID";
        $tt = "INSERT INTO `thuoctinh_sp`(`MA_SP`, `MA_THUOCTINH`, `GIATRI`) VALUES (:MA_SP,:MA_THUOCTINH,:GIATRI)";
        $hh = "INSERT INTO `hinhanh`(`MA_SP`, `URL`, VIDEO) VALUES (:MA_SP,:URL, :VIDEO)";
        
        $lsp =['TEN_SP' => $sanpham->TEN_SP,'MA_DANHMUC' => $sanpham->MA_DANHMUC,'MA_CUAHANG' =>$sanpham->MA_CUAHANG,'GIA'=>$sanpham->GIA,'CHI_TIET'=>$sanpham->CHI_TIET,'GIAMGIA'=>$sanpham->GIAMGIA,'AN_HIEN' => $sanpham->AN_HIEN, 'ID' => $req->id];
       // 
       // $lhh =['MA_SP' => $loai->MA_SP, 'TEN_HINHANH' => $loai->TEN_HINHANH] ;
        
        if (DB::insert($sp,$lsp)){
            $ma_sp = $req->id;
            DB::delete('DELETE FROM `thuoctinh_sp` WHERE `MA_SP` = :ID',["ID" => $ma_sp]);
            
            DB::delete("DELETE FROM `hinhanh` WHERE `MA_SP` = :ID AND URL NOT IN ('".join("', '",$req->HINHANH)."')",["ID" => $ma_sp]);
            
            for($key = 0 ; $key < sizeof($thuoctinh) - 1; $key ++){
                $param =['MA_SP' => $ma_sp,'MA_THUOCTINH' => $thuoctinh[$key], 'GIATRI' => $giatri[$key]] ;
                DB::insert($tt,$param);
            }
            
            $images = $req->file('input_img');
            if(is_array($images)){
                foreach ($images as $key => $img){
                    if ($img != ''){
                        $name = $key.time().'.jpg';
                        $img->move(public_path('/images/product/'), $name);
                    }
                    else{
                        $name = "";
                        continue;
                    }
                    $param = ['MA_SP'=> $ma_sp,'URL'=>'/images/product/'.$name, 'VIDEO' => 0];
                    DB::insert($hh, $param); 
                }
            }
            return redirect('/admin/product/index');
        }
        
    }
    
    public function product_save(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $sanpham = new Sanpham(['AN_HIEN' => $req->AN_HIEN,'TEN_SP' => $req->TEN_SP,'MA_DANHMUC' => $req->MA_DANHMUC,'MA_CUAHANG' =>$mach,'GIA'=>$req->GIA,'CHI_TIET'=>$req->CHI_TIET,'GIAMGIA'=>$req->GIAMGIA]);
        $thuoctinh = $req->MA_THUOCTINH;
        $giatri = $req->GIATRI;
        $hinhanh = new Hinhanh();
        
        $sp = "INSERT INTO `sanpham`(`TEN_SP`, `MA_DANHMUC`,`MA_CUAHANG`,`GIA`,`CHI_TIET`,`GIAMGIA`,`LUOTXEM`, AN_HIEN) VALUES (:TEN_SP,:MA_DANHMUC,:MA_CUAHANG,:GIA,:CHI_TIET,:GIAMGIA,:LUOTXEM, :AN_HIEN)";
        $tt = "INSERT INTO `thuoctinh_sp`(`MA_SP`, `MA_THUOCTINH`, `GIATRI`) VALUES (:MA_SP,:MA_THUOCTINH,:GIATRI)";
        $hh = "INSERT INTO `hinhanh`(`MA_SP`, `URL`, VIDEO) VALUES (:MA_SP,:URL, :VIDEO)";
        
        $lsp =['TEN_SP' => $sanpham->TEN_SP,'MA_DANHMUC' => $sanpham->MA_DANHMUC,'MA_CUAHANG' =>$mach,'GIA'=>$sanpham->GIA,'CHI_TIET'=>$sanpham->CHI_TIET,'GIAMGIA'=>$sanpham->GIAMGIA,'LUOTXEM'=> 0,'AN_HIEN' => $sanpham->AN_HIEN];
       // 
       // $lhh =['MA_SP' => $loai->MA_SP, 'TEN_HINHANH' => $loai->TEN_HINHANH] ;
        
        if (DB::insert($sp,$lsp)){
            $ma_sp = DB::select("select Max(MA_SP) as MA_SP from sanpham");
            for($key = 0 ; $key < sizeof($thuoctinh) - 1; $key ++){
                $param =['MA_SP' => $ma_sp[0]->MA_SP,'MA_THUOCTINH' => $thuoctinh[$key], 'GIATRI' => $giatri[$key]] ;
                DB::insert($tt,$param);
            }
            
            $images = $req->file('input_img');
            foreach ($images as $key => $img){
                if ($img != ''){
                    $name = $key.time().'.jpg';
                    $img->move(public_path('/images/product/'), $name);
                }
                else{
                    $name = "";
                    continue;
                }
                $param = ['MA_SP'=> $ma_sp[0]->MA_SP,'URL'=>'/images/product/'.$name, 'VIDEO' => 0];
                DB::insert($hh, $param); 
            }
            return redirect('/admin/product/index');
        }
        
    }
    public function product_delete(Request $req){
        DB::delete('DELETE FROM `thuoctinh_sp` WHERE `MA_SP` = :ID',["ID" => $req->id]);
        DB::delete('DELETE FROM `hinhanh` WHERE `MA_SP` = :ID',["ID" => $req->id]);
        DB::delete('DELETE FROM `sanpham` WHERE `MA_SP` = :ID',["ID" => $req->id]);
        return redirect("/admin/product/index");
    }
}
