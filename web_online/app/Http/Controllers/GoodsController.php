<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Hdnhap;

use App\Models\Sanpham;

use Session;

use App\Models\Cuahang;

class GoodsController extends Controller
{
    //
    
    public function index(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");

        $dhn = Hdnhap::list_sanpham($mach, $batdau,$ketthuc);
        return view("goods.goods_show",['batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhang'=>$dhn,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    
    public function add(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $sanpham = DB::select("select * from sanpham where ma_cuahang = :ID", ["ID" => $mach]);
        
        return view('goods.goods_add', ['sanpham' => $sanpham,'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    public function save(Request $req){
        $user = Session::get("MA_NGUOIDUNG");
        $lhd = new HDNHAP(['NGAYNHAP'=>$req->NGAYNHAP,'TONGTIEN'=>$req->TONGTIEN]);
        $sanpham = $req->MA_SP;
        $gia = $req->GIA;
        $soluong = $req->SOLUONG;
        $tong = $req->TONG;
        
        $hdnhap = "INSERT INTO `hdnhap`(MA_NGUOIDUNG, NGAYNHAP, TONGTIEN) VALUES (:MA_NGUOIDUNG, :NGAYNHAP, :TONGTIEN)";
        $ctnhap ="INSERT INTO `ctnhap`(`MA_SP`,`MA_DONNHAP`,`SOLUONG`, `DONGIA`) VALUES (:MA_SP,:MA_DONNHAP,:SOLUONG,:DONGIA)";
        
        $hd=['MA_NGUOIDUNG' => $user->MA_NGUOIDUNG, 'NGAYNHAP'=>$lhd->NGAYNHAP, 'TONGTIEN'=>$lhd->TONGTIEN];
        
        if(DB::insert($hdnhap,$hd)){
            $ma_dh = DB::select("select Max(MA_DONNHAP) as MA_DONNHAP from hdnhap");
            for($key = 0 ; $key < sizeof($sanpham) - 1; $key ++){
                $param =['MA_SP'=>$sanpham[$key], 'MA_DONNHAP' => $ma_dh[0]->MA_DONNHAP,'SOLUONG' => $soluong[$key], 'DONGIA' => $gia[$key]] ;
                DB::insert($ctnhap,$param);
            }
            
            return redirect('/admin/goods/index');
        }
    }
    
    public function edit(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $donnhap = Hdnhap::hd_mahd($req->id);
        $sanpham = DB::select("select * from sanpham where ma_cuahang = :ID", ["ID" => $mach]);
        $ct_sp = Hdnhap::ct_hd_mahd($req->id);
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        return view("goods.edit", ["ct_sp" => $ct_sp,"hoadon" => $donnhap, "sanpham" => $sanpham, 'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }

    public function view(Request $req){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $donnhap = Hdnhap::hd_mahd($req->id);
        $sanpham = DB::select("select * from sanpham where ma_cuahang = :ID", ["ID" => $mach]);
        $ct_sp = Hdnhap::ct_hd_mahd($req->id);
        $cuahang = DB::select('select * from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        return view("goods.view", ["ct_sp" => $ct_sp,"hoadon" => $donnhap, "sanpham" => $sanpham, 'cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    

    public function delete(Request $req){
        DB::delete('DELETE FROM `ctnhap` WHERE `ctnhap`.`MA_DONNHAP` = :ID',["ID" => $req->id]);
        return redirect("/admin/goods/index");
    }
    
  
}
 