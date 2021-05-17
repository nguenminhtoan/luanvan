<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Events\MessageSent; 
use App\Events\MessageReply; 
use DB;
use App\Models\Traodoi;

class ChatController extends Controller
{
    public function index(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        return view("chat.index", ['cuahang'=>$cuahang[0]]);
    }
    
    
    public function chat(Request $request){
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
        
        $list_nguoidung = Traodoi::list_by_ch($mach);
        $id = $request -> id;
        if (is_null($id)){
            if($list_nguoidung){
                $id = $list_nguoidung[0]->MA_NGUOIDUNG;
            }
        }else{
            Traodoi::update_status($mach,$id);
            $list_nguoidung = Traodoi::list_by_ch($mach);
        }
        $list_noidung = Traodoi::list_by_ch_nd($mach, $id);
        $ma_traodoi = Traodoi::ma_traodoi_by_ch_nd($mach, $id);
       return view("chat.chat",["ma_traodoi" => $ma_traodoi,'id'=>$id,'list_nguoidung' => $list_nguoidung,'list_noidung' => $list_noidung,'cuahang'=>$cuahang[0],'khachhang'>$khachhang[0],'mach'=>$mach]);
    }
    
    /**
    * Fetch all messages
    *
    * @return Message
    */
//    public function fetchMessages()
//    {
//      return Traodoi::with('user')->get();
//    }

   /**
    * Persist message to database
    *
    * @param  Request $request
    * @return Response
    */
    public function sendMessage(Request $request)
    {
//      
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach])[0];
        
        
        $image = $request->file('input_img');
        if ($image != ''){
            $name = time().'.jpg';
            $image->move(public_path('/images/chat/'.$request->MA_NGUOIDUNG), $name);
            $name = '/images/chat/'.$request->MA_NGUOIDUNG."/".$name;
        }
        else{
            $name = "";
        }
        
        $data = [
            "MA_NGUOIDUNG" => $request->MA_NGUOIDUNG,
            "NOIDUNG"=>$request->NOIDUNG,
            "MA_CUAHANG" => $cuahang->MA_CUAHANG,
            "THOIGIAN" => date("H:m"),
            "TEN_CUAHANG" => $cuahang->TEN_CUAHANG,
            "HINHANH" => $cuahang->HINHANH,
            "MA_TRAODOI" => $request->MA_TRAODOI,
            "FILE" => $name
        ];
//        $message = $user->messages()->create([
//          'message' => $request->input('message')
//        ]);
//        broadcast(new MessageSent($user, $message))->toOthers();
        event(new MessageSent($data));
        Traodoi::tl_save($data["MA_TRAODOI"],$data["MA_NGUOIDUNG"], $data["MA_CUAHANG"], $data["NOIDUNG"], date("Y-m-d H:m:s"), $name);
        return ['status' => 'Message Sent!'];
    }
    
    
     public function replyMessage(Request $request)
    {
//      
        $mand = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
        $nguoidung = DB::select('select *from nguoidung where MA_NGUOIDUNG = :MA_NGUOIDUNG', ['MA_NGUOIDUNG' => $mand])[0];
        $image = $request->file('input_img');
        if ($image != ''){
            $name = time().'.jpg';
            $image->move(public_path('/images/chat/'.$request->MA_NGUOIDUNG), $name);
            $name = '/images/chat/'.$mand."/".$name;
        }
        else{
            $name = "";
        }
        $data = [
            "MA_NGUOIDUNG" => $mand,
            "NOIDUNG"=>$request->NOIDUNG,
            "TEN_CUAHANG" => $nguoidung->TEN_NGUOIDUNG,
            "MA_CUAHANG" => $request->MA_CUAHANG,
            "THOIGIAN" => date("H:m"),
            "HINHANH" => "",
            "FILE" => $name
        ];
        
        $traodoi = Traodoi::tl_save(null,$mand, $data["MA_CUAHANG"], $data["NOIDUNG"], date("Y-m-d H:m:s"), $name);
        $data['MA_TRAODOI'] = $traodoi;
        //$data['TEN_CUAHANG'] = $traodoi;
//        $message = $user->messages()->create([
//          'message' => $request->input('message')
//        ]);
//        broadcast(new MessageSent($user, $message))->toOthers();
        event(new MessageReply($data));
        return ['status' => 'Message Sent!'];
    }
    
    
     private function tl_save($traodoi,$mand, $mach,$noidung, $thoigian, $file){
        $sql = "INSERT INTO traodoi(TRA_MA_TRAODOI,MA_NGUOIDUNG,MA_CUAHANG,NOIDUNG,THOIGIAN,FILE_1) VALUE(?,?,?,?,?)";
        DB::insert($sql, [$traodoi,$mand, $mach,$noidung, $thoigian, $file]);
        return DB::select("select MAX(MA_TRAODOI) from traodoi")[0];
    }
}
