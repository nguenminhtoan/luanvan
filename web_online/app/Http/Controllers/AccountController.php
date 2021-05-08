<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Nganhhang;

use App\Models\Cuahang;

use Session;

use DB;

use App\Models\Donhang;

use App\Models\Nguoidung;

use App\Models\Noithanhtoan;

class AccountController extends Controller
{
    public function index() {
        $user = Session::get("MA_NGUOIDUNG");
        $danhmuc = DB::select('select *from danhmuc');
        $tinh = DB::select("select *from tinh");
        $huyen  = DB::select("select *from huyen");
        $xa = DB::select("select * from xa LIMIT 11283");
        $noithanhtoan = DB::select("select ntt.*,xa.MA_HUYEN, huyen.MA_TINH  from noithanhtoan ntt "
                . "     join xa on xa.MA_XA = ntt.MA_XA JOIN huyen on huyen.MA_HUYEN = xa.MA_HUYEN where MA_NGUOIDUNG = :ID AND MACDINH =1",
                        ['ID'=>$user->MA_NGUOIDUNG]);
        if($noithanhtoan){
            $noithanhtoan = $noithanhtoan[0];
        }else
        {
            $noithanhtoan = new Noithanhtoan();
        }
        $nguoi_dung = DB::select('select nd.*, xa.TEN_XA, huyen.*, tinh.* from Nguoidung nd join xa on nd.MA_XA = xa.MA_XA join huyen on huyen.MA_HUYEN = xa.MA_HUYEN join tinh on tinh.MA_TINH = huyen.MA_TINH where MA_NGUOIDUNG = :MA_NGUOIDUNG', ['MA_NGUOIDUNG' => $user->MA_NGUOIDUNG]); 
        if ($user){
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
        }else{
            $soluong = 0;
        }    
        return view("account.index",['nguoidung'=>$nguoi_dung[0],'danhmuc'=>$danhmuc,'user'=>$user,'soluong'=>$soluong,'tinh'=>$tinh,'huyen'=>$huyen,'xa'=>$xa,'noithanhtoan'=>$noithanhtoan]);
    }
    
    public function update(Request $req){
        $user = Session::get("MA_NGUOIDUNG");
        $nguoidung = new Nguoidung(['TEN_NGUOIDUNG'=>$req->TEN_NGUOIDUNG, 'GIOITINH'=>$req->GIOITINH,'EMAIL'=>$req->EMAIL,'NGAYSINH'=>$req->NGAYSINH,'MA_XA'=>$req->MA_XA, 'SDT'=>$req->SDT]);
        $param = ['TEN_NGUOIDUNG'=>$nguoidung->TEN_NGUOIDUNG, 'GIOITINH'=>$nguoidung->GIOITINH,'EMAIL'=>$nguoidung->EMAIL,'NGAYSINH'=>$nguoidung->NGAYSINH,'MA_XA'=>$nguoidung->MA_XA, 'SDT'=>$nguoidung->SDT, "MA_NGUOIDUNG" => $user->MA_NGUOIDUNG];
        $sql = 'UPDATE `nguoidung` SET `TEN_NGUOIDUNG` = :TEN_NGUOIDUNG, `GIOITINH` = :GIOITINH,`EMAIL` = :EMAIL,`NGAYSINH` = :NGAYSINH,`MA_XA`= :MA_XA, `SDT` = :SDT WHERE MA_NGUOIDUNG =:MA_NGUOIDUNG';
        if(DB::insert($sql,$param)){
            return redirect("/account/index".$req->id);
        }
    }

    public function address(Request $req){
        $user = Session::get("MA_NGUOIDUNG");
        $danhmuc = DB::select('select *from danhmuc');
        $noithanhtoan = DB::select("select noithanhtoan.CHITIET, noithanhtoan.MA_NGUOIDUNG, noithanhtoan.MACDINH, nguoidung.TEN_NGUOIDUNG, nguoidung.SDT, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH  from noithanhtoan 
                     join nguoidung on nguoidung.MA_NGUOIDUNG = noithanhtoan.MA_NGUOIDUNG
                     join xa on xa.MA_XA = noithanhtoan.MA_XA 
                     JOIN huyen on huyen.MA_HUYEN = xa.MA_HUYEN 
                     JOIN tinh on tinh.MA_TINH = huyen.MA_TINH
                     where noithanhtoan.MA_NGUOIDUNG = :ID",
                     ['ID'=>$user->MA_NGUOIDUNG]);
        
        if ($user){
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
        }else{
            $soluong = 0;
        }    
        return view("account.address",['danhmuc'=>$danhmuc,'user'=>$user,'soluong'=>$soluong,'noithanhtoan'=>$noithanhtoan]);
    }
    
    public function add_address(Request $req){
        $user = Session::get("MA_NGUOIDUNG");
        $danhmuc = DB::select('select *from danhmuc');
        $tinh = DB::select("select *from tinh");
        $huyen  = DB::select("select *from huyen");
        $xa = DB::select("select * from xa LIMIT 11283");
        $noithanhtoan = DB::select("select ntt.*,xa.MA_HUYEN, huyen.MA_TINH  from noithanhtoan ntt "
                . "     join xa on xa.MA_XA = ntt.MA_XA JOIN huyen on huyen.MA_HUYEN = xa.MA_HUYEN where MA_NGUOIDUNG = :ID AND MACDINH =1",
                        ['ID'=>$user->MA_NGUOIDUNG]);
        if($noithanhtoan){
            $noithanhtoan = $noithanhtoan[0];
        }else
        {
            $noithanhtoan = new Noithanhtoan();
        }
        $nguoi_dung = DB::select('select nd.*, xa.TEN_XA, huyen.*, tinh.* from Nguoidung nd join xa on nd.MA_XA = xa.MA_XA join huyen on huyen.MA_HUYEN = xa.MA_HUYEN join tinh on tinh.MA_TINH = huyen.MA_TINH where MA_NGUOIDUNG = :MA_NGUOIDUNG', ['MA_NGUOIDUNG' => $user->MA_NGUOIDUNG]); 
        if ($user){
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
        }else{
            $soluong = 0;
        }
        return view("account.add_address",['nguoidung'=>$nguoi_dung[0],'danhmuc'=>$danhmuc,'user'=>$user,'soluong'=>$soluong,'tinh'=>$tinh,'huyen'=>$huyen,'xa'=>$xa,'noithanhtoan'=>$noithanhtoan]);
    }
    
    public function save(Request $req){
        $user = Session::get("MA_NGUOIDUNG");
        $noithanhtoan = new Noithanhtoan(['MA_NGUOIDUNG'=>$req->id,'MA_XA'=>$req->MA_XA,'CHITIET'=>$req->CHITIET]);
        $sql = 'INSERT INTO `noithanhtoan`(`MA_XA`,`MA_NGUOIDUNG`,`CHITIET`) VALUES(:MA_XA, :MA_NGUOIDUNG, :CHITIET)';
        $param = ["MA_XA" => $noithanhtoan->MA_XA, "MA_NGUOIDUNG" => $user->MA_NGUOIDUNG, "CHITIET"=> $noithanhtoan->CHITIET];
        if(DB::insert($sql, $param)){
            return redirect("/account/address".$req->id);
        }
    }

    public function cuahang(Request $req) {
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        return view("account.cuahang",['cuahang'=>$cuahang[0],'mach'=>$mach]);
    }
    public function edit_cuahang(){
        $mach = Session::get("MA_NGUOIDUNG")->MA_CUAHANG;
        $tinh = DB::select("select *from tinh");
        $huyen  = DB::select("select *from huyen");
        $xa = DB::select("select *from xa");
        $nganhhang= DB::select("select * from Nganhhang");
        $cuahang = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Cuahang nd left join xa on nd.MA_XA = xa.MA_XA left join huyen on huyen.MA_HUYEN = xa.MA_HUYEN left join tinh on tinh.MA_TINH = huyen.MA_TINH WHERE nd.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach]);
        return view("account.edit_cuahang",['cuahang'=>$cuahang[0],'mach'=>$mach,'tinh'=>$tinh,'xa'=>$xa,'huyen'=>$huyen,'nganhhang'=>$nganhhang]);
    }
    public function update_cuahang(Request $req) {
        $image = $req->file('input_img');
        if ($image != ''){
            $name = time().'.jpg';
            $image->move(public_path('/images/cuahang/'), $name);
            $name = '/images/cuahang/'.$name;
        }
        else{
            $name = $req->HINHANH;
        }
        $cuahang = new Cuahang(["MA_XA"=>$req->MA_XA,"TEN_CUAHANG"=>$req->TEN_CUAHANG,"HINHANH"=>$name,'MOTA'=>$req->MOTA,'DIACHI'=>$req->DIACHI]);
        $param = ['MA_XA' => $cuahang->MA_XA,'TEN_CUAHANG' => $cuahang->TEN_CUAHANG,'HINHANH' => $cuahang->HINHANH,'MOTA'=>$cuahang->MOTA,'DIACHI'=>$cuahang->DIACHI,'ID'=>$req->id];
        $sql = 'UPDATE `cuahang` Set `MA_XA` = :MA_XA,`TEN_CUAHANG` = :TEN_CUAHANG,`HINHANH` = :HINHANH, MOTA = :MOTA,DIACHI = :DIACHI WHERE MA_CUAHANG = :ID';
        
        if(DB::insert($sql, $param)){
            return redirect("/cuahang/".$req->id);
        }
    }
    
    public function orders(){
        $user = Session::get("MA_NGUOIDUNG");
        $danhmuc = DB::select('select *from danhmuc');
        $nguoi_dung = DB::select('select nd.*, xa.TEN_XA, huyen.TEN_HUYEN, tinh.TEN_TINH from Nguoidung nd join xa on nd.MA_XA = xa.MA_XA join huyen on huyen.MA_HUYEN = xa.MA_HUYEN join tinh on tinh.MA_TINH = huyen.MA_TINH where MA_NGUOIDUNG = :MA_NGUOIDUNG', ['MA_NGUOIDUNG' => $user->MA_NGUOIDUNG]); 
        if ($user){
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
        }else{
            $soluong = 0;
        }   
        $cuahang = DB::select("SELECT * FROM donhang JOIN cuahang ON cuahang.MA_CUAHANG = donhang.MA_CUAHANG WHERE MA_TRANGTHAI = 1 AND MA_NGUOIDUNG = :MA_NGUOIDUNG", ["MA_NGUOIDUNG" => $user->MA_NGUOIDUNG]);
        $sp = DB:: select('select sanpham.*, ctdonhang.SOLUONG, ctdonhang.DONGIA, ctdonhang.SOLUONG * ctdonhang.DONGIA as THANHTIEN, donhang.* ,h1.URL from donhang 
                                inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN
                                inner join sanpham on ctdonhang.MA_SP = sanpham.MA_SP 
                                inner JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sanpham.MA_SP
                                WHERE donhang.MA_NGUOIDUNG = :MA_NGUOIDUNG',['MA_NGUOIDUNG'=>$user->MA_NGUOIDUNG]);
        $donhang = Donhang::list_dh_nd($user->MA_NGUOIDUNG);
        
        return view("account.orders",["donhang" => $donhang,'nguoidung'=>$nguoi_dung[0],'danhmuc'=>$danhmuc,'user'=>$user,'soluong'=>$soluong]);
    }
    
}
