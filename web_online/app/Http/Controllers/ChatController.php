<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Events\MessageSent; 
use DB;

class ChatController extends Controller
{
    public function index(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select *from Cuahang where MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        return view("chat.index", ['cuahang'=>$cuahang[0]]);
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
      
        $user = 1;
        $message = $request->message;
//        $message = $user->messages()->create([
//          'message' => $request->input('message')
//        ]);
//        broadcast(new MessageSent($user, $message))->toOthers();
        event(new MessageSent($user, $message));
        return ['status' => 'Message Sent!'];
    }
}
