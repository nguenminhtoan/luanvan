<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Nguoidung;
use Illuminate\Support\Facades\Hash;

use Session;
class LoginController extends Controller
{
    public function index(){
        $danhmuc = DB::select('select *from danhmuc');
        $nguoidung = new Nguoidung();
        $user = Session::get("MA_NGUOIDUNG");
        return view("login.login",['nguoidung'=> $nguoidung,'err'=>'','danhmuc'=> $danhmuc, 'user' => $user, 'soluong' => 0]);
    }
    
    public function auth(Request $req){
        
        $nguoidung = new Nguoidung(["EMAIL"=>$req->EMAIL,"MATKHAU"=>$req->MATKHAU]);
        $taikhoan = DB::select('select * from Nguoidung where EMAIL = :EMAIL or SDT = :SDT', ['EMAIL' => $nguoidung->EMAIL, 'SDT'=>$nguoidung->EMAIL]);
        if(count($taikhoan)> 0 && Hash::check($nguoidung->MATKHAU, $taikhoan[0]->MATKHAU)){
            Session::put("MA_NGUOIDUNG",$taikhoan[0]);
            $mach = Session::get("MA_NGUOIDUNG");
            if (isset($mach) && $mach->MA_CUAHANG != ""){
                DB::update("update cuahang set ONLINE = 1 where ma_cuahang = ? ", [$mach->MA_CUAHANG]);
            }
            return redirect("/home");
        }
        else
        {
            $danhmuc = DB::select('select *from danhmuc');
            $err = "Email hoặc mật khẩu không đúng";
            return view("login.login",['nguoidung'=> $nguoidung, 'err'=>$err,'danhmuc'=> $danhmuc,'user' => '',  'soluong' => 0]);
        }

    }
    
    public function logout(){
        $mach = Session::get("MA_NGUOIDUNG");
        if (isset($mach) && $mach->MA_CUAHANG != ""){
            DB::update("update cuahang set ONLINE = 0 where ma_cuahang = ? ", [$mach->MA_CUAHANG]);
        }
        Session::flush("");
        return redirect("/home");
    }
}
