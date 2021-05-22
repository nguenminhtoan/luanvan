<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use App\Models\Sanpham;

class AdminController extends Controller
{
    public function index(Request $req){
        
        $cuahang = DB::select("SELECT * FROM cuahang
                                INNER JOIN nguoidung on nguoidung.MA_CUAHANG = cuahang.MA_CUAHANG
                                INNER JOIN nganhhang ON nganhhang.MA_NGANH = cuahang.MA_NGANH 
                                ORDER BY cuahang.MA_CUAHANG DESC");
       $trangthai = $req->trangthai;
       return view("admin.index",['cuahang'=>$cuahang, 'trangthai'=>$trangthai]);
    }
    public function detail(Request $req) {
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :ID', ["ID" => $req->id]);
        $sanpham = Sanpham::list_sp_ch($req->id);
        return view("admin.detail",['cuahang' => $cuahang[0],'sanpham' => $sanpham]);
    }
    public function update_status(Request $req) {
        DB::update("update cuahang set trangthai = ? Where ma_cuahang = ?", [$req->TRANGTHAI ,$req->id]);
        return redirect("/admin/index");
    }
    public function customers() {
        $nguoidung = DB::select('select nd.*, xa.TEN_XA, huyen.*, tinh.*, cuahang.TEN_CUAHANG from Nguoidung nd 
                                join cuahang on cuahang.MA_CUAHANG = nd.MA_CUAHANG
                                join xa on nd.MA_XA = xa.MA_XA 
                                join huyen on huyen.MA_HUYEN = xa.MA_HUYEN 
                                join tinh on tinh.MA_TINH = huyen.MA_TINH ');
        return redirect("admin.customers",['nguoidung' =>$nguoidung]);
    }
}
