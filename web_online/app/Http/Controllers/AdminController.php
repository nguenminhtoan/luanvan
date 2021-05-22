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
    public function update_ch(Request $req) {
        DB::update("update cuahang set TRANGTHAI = ? Where MA_CUAHANG = ?", [$req->TRANGTHAI ,$req->id]);
        return redirect("/admin/index");
    }
    public function customers() {
        $nguoidung = DB::select('select nd.*, xa.TEN_XA, huyen.*, tinh.* from Nguoidung nd 
                                join xa on nd.MA_XA = xa.MA_XA 
                                join huyen on huyen.MA_HUYEN = xa.MA_HUYEN 
                                join tinh on tinh.MA_TINH = huyen.MA_TINH
                                ORDER BY nd.MA_NGUOIDUNG DESC');
        return view("admin.customers",['nguoidung' =>$nguoidung]);
    }
    public function dashboard() {
        $doanhthu = DB::select('SELECT cuahang.MA_CUAHANG, cuahang.TEN_CUAHANG,SUM(TONGTIEN)AS DOANHTHU FROM cuahang
                        inner join donhang on donhang.MA_CUAHANG = cuahang.MA_CUAHANG 
                        group by cuahang.MA_CUAHANG');
        return view("admin.dashboard",['doanhthu'=>$doanhthu]);
    }
}
