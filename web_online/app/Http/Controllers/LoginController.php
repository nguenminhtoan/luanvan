<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Nguoidung;

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
        
        $user = Session::get("MA_NGUOIDUNG");
        $nguoidung = new Nguoidung(["EMAIL"=>$req->EMAIL,"MATKHAU"=>$req->MATKHAU]);
        if(count(DB::select('select * from Nguoidung where EMAIL = :EMAIL and MATKHAU = :MATKHAU', ['EMAIL' => $nguoidung->EMAIL, 'MATKHAU'=>$nguoidung->MATKHAU]) )> 0){
            $nguoi_dung = DB::select('select * from Nguoidung where EMAIL = :EMAIL and MATKHAU = :MATKHAU', ['EMAIL' => $nguoidung->EMAIL, 'MATKHAU'=>$nguoidung->MATKHAU]); 
            Session::put("MA_NGUOIDUNG",$nguoi_dung[0]);
            return redirect("/home");
        }
        else
        {
            $danhmuc = DB::select('select *from danhmuc');
            $err = "Email hoac mat khau khong dung";
            return view("login.login",['nguoidung'=> $nguoidung, 'err'=>$err,'danhmuc'=> $danhmuc,'user' => $user,  'soluong' => 0]);
        }

    }
    
    public function logout(){
        Session::flush("");
        return redirect("/home");
    }
}
