<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donhang;
use DB;
use Session;
class ShipController extends Controller
{
    //
    
    public function dashboard(){
        return view("ship.dashboard");
    }
    
    public function info(){
        return view("ship.info");
    }


    public function index(Request $req){
        $mach = Session::get("MA_NGUOIDUNG");
        $mavt = DB::select("select * from nhanvien where ma_nguoidung = ?" , [$mach->MA_NGUOIDUNG])[0]; 
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $trangthai = $mavt->MA_VANCHUYEN;
        $donhang = Donhang::list_all_chovt($batdau, $ketthuc, $trangthai);
        return view("ship.index",['batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhangban'=>$donhang]);
    
    }
    
    public function save(Request $req){
        
        $mach = Session::get("MA_NGUOIDUNG");
        $mavt = DB::select("select * from nhanvien where ma_nguoidung = ?" , [$mach->MA_NGUOIDUNG])[0]; 
        $sql = "insert into giaohang (MA_NV, MA_DONBAN, THOIGIAN) value(?,?,?)";
        DB::insert($sql, [$mavt->MA_NV, $req->MA_DONBAN, date("Y-m-d")]);
        $sql = "update donhang set MA_TRANGTHAI = 5 where ma_donban = ? ";
        DB::update($sql, [$req->MA_DONBAN]);
        return true;
    }
    
    public function save_order(Request $req){
        
        $sql = "update donhang set MA_TRANGTHAI = 6, NGAYGIAO = ?, DATHANHTOAN = 1 where ma_donban = ? ";
        DB::update($sql, [date("Y-m-d"), $req->MA_DONBAN]);
        return true;
    }
    
    public function save_cancel(Request $req){
        $sql = "update donhang set MA_TRANGTHAI = 8 where ma_donban = ? ";
        DB::update($sql, [$req->MA_DONBAN]);
        return true;
    }
    
    
    public function save_return(Request $req){
        $sql = "update donhang set MA_TRANGTHAI = 9 where ma_donban = ? ";
        DB::update($sql, [$req->MA_DONBAN]);
        return true;
    }
    
    public function order(Request $req){
        $mach = Session::get("MA_NGUOIDUNG");
        $mavt = DB::select("select * from nhanvien where ma_nguoidung = ?" , [$mach->MA_NGUOIDUNG])[0]; 
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $trangthai = $mavt->MA_VANCHUYEN;
        $donhang = Donhang::list_all_tn($batdau, $ketthuc, $mavt->MA_NV);
        return view("ship.order",['batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhangban'=>$donhang]);
    
    }
    
    public function complete(Request $req){
        $mach = Session::get("MA_NGUOIDUNG");
        $mavt = DB::select("select * from nhanvien where ma_nguoidung = ?" , [$mach->MA_NGUOIDUNG])[0]; 
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $trangthai = $mavt->MA_VANCHUYEN;
        $donhang = Donhang::list_all_complete($batdau, $ketthuc, $mavt->MA_NV);
        return view("ship.complete",['batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhangban'=>$donhang]);
    
    }
    public function cancel(Request $req){
        $mach = Session::get("MA_NGUOIDUNG");
        $mavt = DB::select("select * from nhanvien where ma_nguoidung = ?" , [$mach->MA_NGUOIDUNG])[0]; 
        $batdau = $req->batdau ? $req->batdau :  date( "Y-m-d", strtotime( " -1 month" ) );
        $ketthuc = $req->ketthuc ? $req->ketthuc : date("Y-m-d");
        $trangthai = $mavt->MA_VANCHUYEN;
        $donhang = Donhang::list_all_cancel($batdau, $ketthuc, $mavt->MA_NV);
        return view("ship.cancel",['batdau' => $batdau, 'ketthuc' => $ketthuc ,'donhangban'=>$donhang]);
    
    }
}
