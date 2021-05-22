<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\Models\Nguoidung;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Session;
use DB;

class SocialController extends Controller {

    public function redirect($provider) {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider) {
        $getInfo = Socialite::driver($provider)->user();
        $user = $this->createUser($getInfo, $provider);        
        Session::put("MA_NGUOIDUNG",$user);
        return redirect("/home");
    }

    function createUser($getInfo, $provider) {
        $taikhoan = DB::select('select * from Nguoidung where TK_MANGXH = :TK_MANGXH', ['TK_MANGXH' => $getInfo->id]);
        if (count($taikhoan) > 0){
            return $taikhoan[0];
        }
        $nguoidung = new Nguoidung(["TEN_NGUOIDUNG" => $getInfo->name, 'TK_MANGXH' => $getInfo->id, "EMAIL" => $getInfo->email]);
        $sql = "INSERT INTO `nguoidung`(`TEN_NGUOIDUNG`, `TK_MANGXH`,`EMAIL`, TOKEN, STATUS, ADMIN) VALUES (:TEN_NGUOIDUNG, :TK_MANGXH, :EMAIL , :TOKEN, :STATUS, 1)";
        $token = $this->generateRandomString(150);
        $param = ['TEN_NGUOIDUNG' => $nguoidung->TEN_NGUOIDUNG, 'TK_MANGXH' => $nguoidung->TK_MANGXH, 'EMAIL' => $nguoidung->EMAIL,
             "TOKEN" => $token, "STATUS" => 0];
        DB::insert($sql, $param);
        $taikhoan = DB::select('select * from Nguoidung where TK_MANGXH = :TK_MANGXH', ['TK_MANGXH' => $getInfo->id]);
        if(isset($taikhoan[0]->EMAIL)){
            $data = [
                "to" => $taikhoan[0]->EMAIL,
                "subject" => "[Xác thực] xác thực đăng ký tài khoản tại shop SupperMarket",
                "template" => "xacthuc_mail",
                "data" => [
                    "name" => $taikhoan[0]->TEN_NGUOIDUNG,
                    "link" => "http://localhost:8000/verify?token_id=".$token,
                    "phai" => 1
                ]
            ];

            $email = new SendEmail($data);
            Mail::to($data["to"])->send($email);
        }
        return $taikhoan[0];
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
