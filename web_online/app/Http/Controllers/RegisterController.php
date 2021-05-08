<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\Nguoidung;
use App\Models\Cuahang;
use DB;
use App\Models\Danhmuc;
use Session;

/**
 * Description of RegisterController
 *
 * @author THU
 */
class RegisterController extends Controller {

    public function index() {
        $user = Session::get("MA_NGUOIDUNG");
        $tinh = DB::select("select *from tinh");
        $huyen  = DB::select("select *from huyen");
        $xa = DB::select("select *from xa");
        $nguoidung = new Nguoidung();
        $danhmuc = DB::SELECT('select *from danhmuc');
        return view("register/register", ['nguoidung'=>$nguoidung,'user' => $user,'danhmuc'=> $danhmuc, 'err' =>'','tinh' => $tinh,'huyen' => $huyen,'xa' => $xa, 'soluong' => 0]);
    }

    public function create(Request $req) {
        $user = Session::get("MA_NGUOIDUNG");
        $tinh = DB::select("select *from tinh");
        $huyen  = DB::select("select *from huyen");
        $xa = DB::select("select *from xa");
        $danhmuc = DB::SELECT('select *from danhmuc');
        $nguoidung = new Nguoidung(["TEN_NGUOIDUNG" => $req->TEN_NGUOIDUNG, "GIOITINH" => $req->GIOITINH, "SDT" => $req->SDT,'GIOITINH'=> $req-> GIOITINH ,'NGAYSINH'=>$req-> NGAYSINH ,'TK_MANGXH'=>$req->TK_MANGXH,"EMAIL" =>$req ->EMAIL ,"MATKHAU" =>$req ->MATKHAU,'MA_XA' =>$req->MA_XA]);
        $err = [];
        if (count(DB::select('select * from Nguoidung where EMAIL = :EMAIL', ['EMAIL' => $nguoidung->EMAIL])) > 0) {
            array_push($err, "Tài khoản đã tồn tại!");  
        } 
        
        if (strlen($nguoidung->SDT) < 9 || strlen($nguoidung->SDT) > 10) {
            array_push($err, "Số điện thoại đã sai!");
        }
        if (strlen($nguoidung->MATKHAU) < 5) {
            array_push($err, "Mật khẩu không đủ 5 ký tự!");
        }
        if(count($err) == 0){
            $sql = "INSERT INTO `nguoidung`(`TEN_NGUOIDUNG`, `GIOITINH`,`NGAYSINH`, `SDT`,`TK_MANGXH`,`EMAIL`,`MATKHAU`,`MA_XA`) VALUES (:TEN_NGUOIDUNG, :GIOITINH,:NGAYSINH, :SDT,:TK_MANGXH, :EMAIL , :MATKHAU, :MA_XA)";
            $param = ['TEN_NGUOIDUNG' => $nguoidung->TEN_NGUOIDUNG, 'GIOITINH' => $nguoidung->GIOITINH, 'NGAYSINH' => $nguoidung->NGAYSINH,
                        'SDT' => $nguoidung->SDT, 'TK_MANGXH' => $nguoidung->TK_MANGXH,'EMAIL' => $nguoidung->EMAIL,'MATKHAU'=>$nguoidung->MATKHAU, 'MA_XA' =>$nguoidung->MA_XA];
            if (DB::insert($sql, $param)) {
                $nguoi_dung = DB::select('select * from Nguoidung where EMAIL = :EMAIL and MATKHAU = :MATKHAU', ['EMAIL' => $nguoidung->EMAIL, 'MATKHAU'=>$nguoidung->MATKHAU]); 
                Session::put("MA_NGUOIDUNG",$nguoi_dung[0]);
                return redirect("/home");
            }
        }
        else {
            
            $tinh = DB::select("select *from tinh");
            $huyen  = DB::select("select *from huyen");
            $xa = DB::select("select *from xa");
            return view("register/register", ['soluong' => 0,'nguoidung'=>$nguoidung,'user' => $user, 'err' => $err, 'danhmuc' => $danhmuc ,'tinh' => $tinh,'huyen' => $huyen,'xa' => $xa ]);
        }
        
    }
    
    public function register_shop(){
        $nguoidung = Session::get("MA_NGUOIDUNG") -> MA_NGUOIDUNG;
        $count = DB::select("SELECT * FROM nguoidung WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_CUAHANG IS NOT NULL", ["MA_NGUOIDUNG" => $nguoidung]);
        if (count($count) > 0){
            return redirect("/admin/goods/add"); // chuyển tới trang tổng quan
        }
        else{
            $nganh = DB::select("select * from nganhhang");
            $user = Session::get("MA_NGUOIDUNG");
            $tinh = DB::select("select *from tinh");
            $huyen  = DB::select("select *from huyen");
            $xa = DB::select("select *from xa");
            $nguoidung = new Nguoidung();
            $cuahang = new Cuahang();
            $danhmuc = DB::SELECT('select *from danhmuc');
            return view("register/register_shop", ['nganhhang'=>$nganh, 'cuahang'=>$cuahang,'nguoidung'=>$nguoidung,'user' => $user,'danhmuc'=> $danhmuc,'tinh' => $tinh,'huyen' => $huyen,'xa' => $xa,'soluong'=>0]);
        }
        
    }
    
    public function create_shop(Request $req){
        $user = Session::get("MA_NGUOIDUNG");
        $tinh = DB::select("select *from tinh");
        $huyen  = DB::select("select *from huyen");
        $xa = DB::select("select *from xa");
        $danhmuc = DB::SELECT('select *from danhmuc');
        $cuahang = new Cuahang(["TEN_CUAHANG" => $req->TEN_CUAHANG, "HINHANH" => $req->HINHANH, "MA_XA" => $req->MA_XA,'DIACHI'=> $req-> DIACHI, "MOTA" => $req->MOTA, "MA_NGANH" => $req->MA_NGANH]);
        $sql = "INSERT cuahang (TEN_CUAHANG, HINHANH, MOTA, DIACHI, MA_XA, MA_NGANH) values(:TEN_CUAHANG, :HINHANH, :MOTA, :DIACHI, :MA_XA, :MA_NGANH)";
        
        $image = $req->file('input_img');
        if ($image != ''){
            $name = time().'.jpg';
            $image->move(public_path('/images/cuahang/'), $name);
            $name = "/images/cuahang/". $name;
        }
        else{
            $name = "";
        }
        
        $param = ["TEN_CUAHANG" => $cuahang->TEN_CUAHANG, "HINHANH" => $name, "MOTA" => $cuahang->MOTA, "DIACHI" => $cuahang -> DIACHI, "MA_XA" => $cuahang->MA_XA, "MA_NGANH" => $cuahang->MA_NGANH];
        
        if (DB::insert($sql,$param)){
            $ma_cuahang = DB::select("select MAX(MA_CUAHANG) AS MA_CUAHANG from cuahang")[0]->MA_CUAHANG;
            DB::update("update nguoidung set MA_CUAHANG = :MA_CUAHANG WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG", ["MA_CUAHANG" => $ma_cuahang, "MA_NGUOIDUNG" => $user->MA_NGUOIDUNG]);
            $nguoi_dung = DB::select('select * from Nguoidung where MA_NGUOIDUNG = :MA_NGUOIDUNG', ['MA_NGUOIDUNG' => $user->MA_NGUOIDUNG]); 
            Session::put("MA_NGUOIDUNG",$nguoi_dung[0]);
            return redirect("/admin/goods/add"); // chuyển tới trang tổng quan
        }
        else{
            return view("register/register_shop", ['nganhhang'=>$nganh, 'cuahang'=>$cuahang,'nguoidung'=>$nguoidung,'user' => $user,'danhmuc'=> $danhmuc,'tinh' => $tinh,'huyen' => $huyen,'xa' => $xa,'soluong'=>0]);
        
        }
    }
}
