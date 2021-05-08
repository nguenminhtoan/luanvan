<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

use Session;
use App\Models\Thuoctinh;
use App\Models\Sanpham;
use App\Models\Binhluan;

class DetailController extends Controller
{
    public function index(Request $req){
        $user = Session::get("MA_NGUOIDUNG");
        DB::update("update sanpham set luotxem = luotxem + 1 Where MA_SP = ?", [ $req->id]);
        if ($user){
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
        }else{
            $soluong = 0;
        }
        $spmoi = Sanpham::sanpham_moi();
        $danhmuc = DB::select('select *from danhmuc');
        $thuoctinh = DB::select('SELECT thuoctinh.TEN_THUOCTINH as THUOCTINH, thuoctinh_sp.GIATRI as GIATRI 
                                    FROM thuoctinh_sp
                                    inner join thuoctinh 
                                    on thuoctinh.MA_THUOCTINH = thuoctinh_sp.MA_THUOCTINH where thuoctinh_sp.MA_SP=:ID',["ID" => $req->id]);
        $ct_sp = Sanpham::detail($req->id);
        $udai = Sanpham::sell_shock();
        $binhluan = Binhluan::binhluan_sp($req->id);
        
        $lichsu = [];
        $cookie = Session::get("link");
        if ($cookie){
            $lichsu = Sanpham::search_ma_sp($cookie);
        }
        $this->add_cookie($req->id);
        $muacung = Sanpham::muacung($req->id);
        
        return view("detail/index",['user'=>$user, 'soluong' => $soluong,'danhmuc'=>$danhmuc,'udai'=>$udai,
            'thuoctinh' => $thuoctinh, 'lichsu' => $lichsu, "muacung" => $muacung,
           "binhluan" => $binhluan, 'spmoi' => $spmoi,'ct_sp'=>$ct_sp]);
    }
    
    
    
    public function search(Request $req){
        $user = Session::get("MA_NGUOIDUNG");
        $danhmuc = DB::select('select *from danhmuc');
        $soluong = 0;
        $search = $req->search;
        $tt_sp = [[],[]];
        if (isset($req->thuoctinh)){$tt_sp = $req->thuoctinh;} 
        $ma_dm = [];
        if (isset($req->ma_danhmuc)){$ma_dm = $req->ma_danhmuc;} 
        if (!is_array($ma_dm)) $ma_dm = [$ma_dm];
        $giamin = $req->giamin;
        $giamax = $req->giamax;
        
        
        
        
        $banchay = Sanpham::banchay();
        $thuoctinh = Thuoctinh::get_all();
        $group = [];
        foreach ( $thuoctinh as $value ) {
            $group[$value->MA_THUOCTINH][] = $value;
        }
        if ($user){
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
        }
        
        $sanpham = Sanpham::list_show($req->ma_danhmuc, $giamin, $giamax, $req->thuoctinh, $search);
        
        return view ("detail.search",["search" => $search, 'tt_sp' => $tt_sp, 'ma_dm' => $ma_dm, 'giamin' => $giamin, 'giamax' => $giamax, 'banchay' => $banchay,
            "sanpham" => $sanpham,"thuoctinh" => $group,'user'=>$user, 'soluong' => $soluong,'danhmuc'=>$danhmuc]);
    }
    
    
    private static function add_cookie($link){
        if (is_null(Session::get("link"))){
            Session::put("link", [$link]);
        }else{
            $list = Session::get("link");
            $a = array_search($link, $list);
            if ($a == 0){
                if (count($list) > 15){
                    unset($list[0]);
                }
                array_push($list, $link);
                
            }
            Session::put("link", $list);
        }
    }
    
    
    
}
