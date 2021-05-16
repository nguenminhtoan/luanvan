<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use App\Models\Sanpham;
use DB;
class HomeController extends Controller
{
    public function index(){
        
        $user = Session::get("MA_NGUOIDUNG");
        $danhmuc = DB::select('select *from danhmuc');
        $binhluan = DB::select("SELECT bl.*, nd.TEN_NGUOIDUNG,COUNT(*)AS SL , sanpham.TEN_SP FROM binhluan bl JOIN nguoidung nd ON nd.MA_NGUOIDUNG = bl.MA_NGUOIDUNG join sanpham on sanpham.MA_SP = bl.MA_SP group by bl.MA_NGUOIDUNG");
        $cuahang = DB::select("SELECT * from cuahang");
        $sanpham = Sanpham::sanpham(); 
        $udai = Sanpham::sell_shock();
        $spmoi = Sanpham::sanpham_moi();
        $banchay = Sanpham::banchay();
        $rank = Sanpham::rank();
        $comment = Sanpham::rank();
        
        /*$xemnhieu = DB::select('select sp.*, h1.URL from sanpham sp JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sp.MA_SP WHERE LUOTXEM > 1000',[]);
        
        
        $thoitrang = DB::select("select sp.*, h1.URL from sanpham sp JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sp.MA_SP", []);
        
        $cndt = DB::select('select sanpham.MA_SP, sanpham.TEN_SP, sanpham.GIA, sanphamGIA - sanpham.GIAMGIA as GIAMOI from sanpham  JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sp.MA_SP 
                                inner join danhmuc on MA_DANHMUC = sanpham.MA_DANHMUC
                                where MA_DANHMUC=:"CÔNG NGHỆ ĐIỆN TỬ"',[]);
        
        */
        if ($user){
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
        }else{
            $soluong = 0;
        }
        return view("home.index",["cuahang"=>$cuahang,"binhluan"=>$binhluan,"comment" => $comment,"rank" => $rank,'sanpham' => $sanpham,'spmoi' => $spmoi,'banchay' => $banchay,'danhmuc'=>$danhmuc,'udai'=>$udai,'user'=>$user, 'soluong' => $soluong/*'xemnhieu'=>$xemnhieu,'cndt'=>$cndt*/]);
        
    }
    
    
    function load_xa(Request $req){
        $list_xa = DB::select("select * from XA WHERE MA_HUYEN = :MA_HUYEN", ["MA_HUYEN" => $req->MA_HUYEN]);
        return $list_xa;
    }
}
