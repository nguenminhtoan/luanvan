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
        return redirect("/admin/cuahang/list");
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
        $ch = DB::select('SELECT count(*)as SOLUONG from cuahang;');
        $nd = DB::select('SELECT count(*)AS SOLUONG FROM nguoidung');
        $doanhthu = DB::select('SELECT cuahang.TEN_CUAHANG, CASE WHEN SUM(donhang.TONGTIEN) is NULL THEN 0 ELSE SUM(donhang.TONGTIEN) END AS DOANHTHU FROM cuahang
                                inner join donhang on donhang.MA_CUAHANG = cuahang.MA_CUAHANG 
                                group by cuahang.MA_CUAHANG;');
        $dautu = DB::select('SELECT cuahang.TEN_CUAHANG,SUM(ctnhap.SOLUONG) AS SOLUONG,CASE WHEN SUM(hdnhap.TONGTIEN) is NULL THEN 0 ELSE SUM(hdnhap.TONGTIEN) END AS DAUTU FROM cuahang
                        inner join nguoidung on nguoidung.MA_CUAHANG = cuahang.MA_CUAHANG
                        inner join hdnhap on hdnhap.MA_NGUOIDUNG = nguoidung.MA_NGUOIDUNG 
                        inner join ctnhap on ctnhap.MA_DONNHAP = hdnhap.MA_DONNHAP
                        GROUP by cuahang.MA_CUAHANG');
        $sanpham = DB::select('SELECT sanpham.MA_SP,sanpham.TEN_SP,binhluan.DANHGIA,ctdonhang.SOLUONG,ctdonhang.DONGIA,donhang.MA_DONBAN FROM sanpham
                            inner join binhluan on binhluan.MA_SP = sanpham.MA_SP
                            INNER JOIN ctdonhang ON ctdonhang.MA_SP = sanpham.MA_SP
                            INNER JOIN donhang ON donhang.MA_DONBAN = ctdonhang.MA_DONBAN
                            where ctdonhang.SOLUONG>=5
                            group by sanpham.MA_SP');
    return view("admin.dashboard",['doanhthu'=>$doanhthu,'cuahang'=>$ch[0], 'nguoidung'=>$nd[0],'dautu'=>$dautu,'sanpham'=>$sanpham]);
    }
}
