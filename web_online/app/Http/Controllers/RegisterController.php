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
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
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
        $nguoidung = new Nguoidung(["TEN_NGUOIDUNG" => $req->TEN_NGUOIDUNG, 
            "GIOITINH" => $req->GIOITINH, "SDT" => $req->SDT,'GIOITINH'=> $req-> GIOITINH ,'NGAYSINH'=>$req-> NGAYSINH ,
            'TK_MANGXH'=>$req->TK_MANGXH,"EMAIL" =>$req ->EMAIL ,"MATKHAU" =>$req ->MATKHAU,'MA_XA' =>$req->MA_XA,
            "MA_TINH" =>$req->MA_TINH, "MA_HUYEN" => $req->MA_HUYEN]);
        $err = [];
        if (count(DB::select('select * from Nguoidung where EMAIL = :EMAIL', ['EMAIL' => $nguoidung->EMAIL])) > 0) {
            array_push($err, "Email đã được sử dụng !");  
        } 
        
        if (count(DB::select('select * from Nguoidung where SDT = :SDT', ['SDT' => $nguoidung->SDT])) > 0) {
            array_push($err, "Số điện thoại đã được sử dụng !");  
        } 
        
        if (is_null($nguoidung->MA_XA)) {
            array_push($err, "vui lòng chọn địa chỉ !");  
        } 
        
        if (strlen($nguoidung->SDT) < 9 || strlen($nguoidung->SDT) > 11) {
            array_push($err, "Số điện thoại không chính xác !");
        }
        if (strlen($nguoidung->MATKHAU) < 6) {
            array_push($err, "Mật khẩu phải lớn hơn 5 ký tự!");
        }
        if(count($err) == 0){
            
            $token = $this->generateRandomString(150);
            $mk = Hash::make($nguoidung->MATKHAU);
            $sql = "INSERT INTO `nguoidung`(`TEN_NGUOIDUNG`, `GIOITINH`,`NGAYSINH`, `SDT`,`TK_MANGXH`,`EMAIL`,`MATKHAU`,`MA_XA`, TOKEN, STATUS, ADMIN) VALUES (:TEN_NGUOIDUNG, :GIOITINH,:NGAYSINH, :SDT,:TK_MANGXH, :EMAIL , :MATKHAU, :MA_XA, :TOKEN, :STATUS, 1)";
            $param = ['TEN_NGUOIDUNG' => $nguoidung->TEN_NGUOIDUNG, 'GIOITINH' => $nguoidung->GIOITINH, 'NGAYSINH' => $nguoidung->NGAYSINH,
                        'SDT' => $nguoidung->SDT, 'TK_MANGXH' => $nguoidung->TK_MANGXH,'EMAIL' => $nguoidung->EMAIL,'MATKHAU'=>$mk, 'MA_XA' =>$nguoidung->MA_XA, "TOKEN" => $token, "STATUS" => 0];
            if (DB::insert($sql, $param)) {
                $nguoi_dung = DB::select('select * from Nguoidung where EMAIL = :EMAIL', ['EMAIL' => $nguoidung->EMAIL]); 
                Session::put("MA_NGUOIDUNG",$nguoi_dung[0]);
                if(isset($nguoi_dung[0]->EMAIL)){
                    $data = [
                        "to" => $nguoidung->EMAIL,
                        "subject" => "[Xác thực] xác thực đăng ký tài khoản tại shop SupperMarket",
                        "template" => "xacthuc_mail",
                        "data" => [
                            "name" => $nguoi_dung[0]->TEN_NGUOIDUNG,
                            "link" => "http://localhost:8000/verify?token_id=".$token,
                            "phai" => $nguoi_dung[0]->GIOITINH
                        ]
                    ];

                    $email = new SendEmail($data);
                    Mail::to($data["to"])->send($email);
                }
                
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
    
    public function verify(Request $req){
        $nguoidung = DB::select('select * from Nguoidung where TOKEN = ?', [$req->token_id]);
        if(count($nguoidung) > 0){
            Session::put("MA_NGUOIDUNG",$nguoidung[0]);
            DB::update('update nguoidung set STATUS = 1 where TOKEN = ?', [$req->token_id]);
            $danhmuc = DB::SELECT('select *from danhmuc');
            return view("register.verify", ['danhmuc' => $danhmuc, "soluong" => 0, "user"=> $nguoidung[0]]);
        }
        else{
            return redirect("/home");
        }
    }

    public function register_shop(){
        $nguoidung = Session::get("MA_NGUOIDUNG") -> MA_NGUOIDUNG;
        $count = DB::select("SELECT * FROM nguoidung WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_CUAHANG IS NOT NULL", ["MA_NGUOIDUNG" => $nguoidung]);
        if (count($count) > 0){
            return redirect("/admin/dashboard"); // chuyển tới trang tổng quan
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
            DB::update("update nguoidung set MA_CUAHANG = :MA_CUAHANG, ADMIN = 2 WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG", ["MA_CUAHANG" => $ma_cuahang, "MA_NGUOIDUNG" => $user->MA_NGUOIDUNG]);
            $nguoi_dung = DB::select('select * from Nguoidung where MA_NGUOIDUNG = :MA_NGUOIDUNG', ['MA_NGUOIDUNG' => $user->MA_NGUOIDUNG]); 
            Session::put("MA_NGUOIDUNG",$nguoi_dung[0]);
            return redirect("/admin/dashboard"); // chuyển tới trang tổng quan
        }
        else{
            return view("register/register_shop", ['nganhhang'=>$nganh, 'cuahang'=>$cuahang,'nguoidung'=>$nguoidung,'user' => $user,'danhmuc'=> $danhmuc,'tinh' => $tinh,'huyen' => $huyen,'xa' => $xa,'soluong'=>0]);
        
        }
    }
    
    public function rest_pass(Request $req){
        $danhmuc = DB::select('select *from danhmuc');
        $nguoidung = new Nguoidung();
        $user = Session::get("MA_NGUOIDUNG");
        return view("register.reset_pass",['nguoidung'=> $nguoidung,'err'=>'','danhmuc'=> $danhmuc, 'user' => $user, 'soluong' => 0]);
   
    }
    
    public function update_pass(Request $req){
        $user = DB::select('select * from nguoidung where email = ?', [$req->email]);
        if(count($user) > 0) {
            $token = $this->generateRandomString(6);
            $mk = Hash::make($token);
            DB::update("update nguoidung set MATKHAU = ? where MA_NGUOIDUNG = ? ", [$mk, $user[0]->MA_NGUOIDUNG]);
            $data = [
                "to" => $user[0]->EMAIL,
                "subject" => "[Rest pass] thay đổi mật khẩu tại shop SupperMarket",
                "template" => "rest_pass",
                "data" => [
                    "email" => $user[0]->EMAIL,
                    "pass" => $token
                ]
            ];

            $email = new SendEmail($data);
            Mail::to($data["to"])->send($email);
            return redirect("/home");
        }else{
            $err = "email không tồn tại";
            $danhmuc = DB::select('select *from danhmuc');
            $nguoidung = new Nguoidung();
            $user = Session::get("MA_NGUOIDUNG");
            return view("register.reset_pass",['nguoidung'=> $nguoidung,'err'=>$err,'danhmuc'=> $danhmuc, 'user' => $user, 'soluong' => 0]);
        }
   
    }

    public function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
