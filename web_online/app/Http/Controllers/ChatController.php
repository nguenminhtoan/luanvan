<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;

class ChatController extends Controller
{
    public function chat(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('SELECT cuahang.*, SUM(sanpham.LUOTXEM) AS LUOTXEM 
                                 FROM cuahang
                                 inner join sanpham on cuahang.MA_CUAHANG = sanpham.MA_CUAHANG 
                                 where cuahang.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        $khachhang = DB::select('select nguoidung.*, cuahang.TEN_CUAHANG from nguoidung 
                                    inner join donhang on donhang.MA_NGUOIDUNG = nguoidung.MA_NGUOIDUNG
                                    inner join cuahang on cuahang.MA_CUAHANG = donhang.MA_CUAHANG
                                    where cuahang.MA_CUAHANG =:MA_CUAHANG
                                    group by nguoidung.MA_NGUOIDUNG', ['MA_CUAHANG' => $mach]);
       return view("chat.chat",['cuahang'=>$cuahang[0],'khachhang'>$khachhang[0],'mach'=>$mach]);
    }
    
    
    public function sendMessage(Request $request)
    {
      
        $user = $request->MA_NGUOIDUNG;
        $message = $request->NODUNG;
        event(new MessageSent($user, $message));
        return ['status' => 'Message Sent!'];
    }
}
