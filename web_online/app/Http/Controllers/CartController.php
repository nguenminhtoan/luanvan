<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use App\Models\Sanpham;
use App\Models\Nguoidung;
use App\Models\Noithanhtoan;
use App\Models\Donhang;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
use Session;

class CartController extends Controller
{
    public  function index(){
        $danhmuc = DB::select('select * from danhmuc');
        $tinh = DB::select("select * from tinh");
        $huyen  = DB::select("select * from huyen");
        $xa = DB::select("select * from xa LIMIT 11283");
        $user = Session::get("MA_NGUOIDUNG");
        $thanhtoan = DB::SELECT('Select * from thanhtoan');
        $vanchuyen = DB::select('Select * from vanchuyen');
        $soluong = 0;
        
        $noithanhtoan = DB::select("select ntt.*,xa.MA_HUYEN, huyen.MA_TINH  from noithanhtoan ntt "
                . "     join xa on xa.MA_XA = ntt.MA_XA JOIN huyen on huyen.MA_HUYEN = xa.MA_HUYEN where MA_NGUOIDUNG = :ID AND MACDINH =1",
                        ['ID'=>$user->MA_NGUOIDUNG]);
        if($noithanhtoan){
            $noithanhtoan = $noithanhtoan[0];
        }else
        {
            $noithanhtoan = new Noithanhtoan();
        }
       
        
        if($user){
            $giohang = DB::select("select donhang.*, vt.DONGIA, KM.GIAMGIA from donhang LEFT JOIN vanchuyen vt ON vt.MA_VANCHUYEN = donhang.MA_VANCHUYEN LEFT JOIN KHUYENMAI KM ON KM.MA_KHUYENMAI = donhang.MA_KHUYENMAI where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1",["MA_NGUOIDUNG" => $user->MA_NGUOIDUNG]);
            
            if($giohang){
                $giohang = $giohang[0];
            }else{
                $giohang = new Donhang();
            }
            
            $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh "
                    . "join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;

            $cuahang = DB::select("SELECT * FROM donhang JOIN cuahang ON cuahang.MA_CUAHANG = donhang.MA_CUAHANG WHERE MA_TRANGTHAI = 1 AND MA_NGUOIDUNG = :MA_NGUOIDUNG", ["MA_NGUOIDUNG" => $user->MA_NGUOIDUNG]);
            $sp = DB:: select('select sanpham.*, ctdonhang.SOLUONG, ctdonhang.DONGIA, ctdonhang.SOLUONG * ctdonhang.DONGIA as THANHTIEN, donhang.* ,h1.URL from donhang 
                                    inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN
                                    inner join sanpham on ctdonhang.MA_SP = sanpham.MA_SP 
                                    inner JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sanpham.MA_SP
                                    WHERE donhang.MA_TRANGTHAI = 1 And donhang.MA_NGUOIDUNG = :MA_NGUOIDUNG',['MA_NGUOIDUNG'=>$user->MA_NGUOIDUNG]);
            return view ("cart.index",["cuahang" => $cuahang ,'giohang' => $giohang ,'noithanhtoan'=>$noithanhtoan,"vanchuyen"=>$vanchuyen, 'errors' => [],
                "thanhtoan"=>$thanhtoan,"sanpham"=>$sp,'danhmuc'=>$danhmuc,'soluong'=>$soluong,'user'=>$user,'tinh'=>$tinh,'huyen'=>$huyen,'xa'=>$xa]);
        }
        else{
            return redirect("/home");
        }
    }
    
    
    public function update_address(Request $req){
        $ma_nguoidung = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
        
        if(count(DB::select("select * from noithanhtoan where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MACDINH = 1",["MA_NGUOIDUNG" => $ma_nguoidung])) > 0){
            //
            $ma_noi = DB::select("select * from noithanhtoan where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MACDINH = 1",["MA_NGUOIDUNG" => $ma_nguoidung])[0]->MA_NOI;
            $sql = "UPDATE noithanhtoan set MA_XA = :MA_XA, CHITIET = :CHITIET, DT = :DT  WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_NOI = :MA_NOI";
            $param = ["MA_XA"=> $req->MA_XA, "CHITIET" => $req->CHITIET, "DT" => $req->SDT ,"MA_NGUOIDUNG" => $ma_nguoidung, "MA_NOI" => $ma_noi];
            DB::update($sql,$param);
            return $ma_noi;
        }
        else
        {
            $sql = "insert noithanhtoan (MA_XA, MA_NGUOIDUNG, CHITIET, DT, MACDINH) VALUES(:MA_XA, :MA_NGUOIDUNG, :CHITIET, :DT, '1')";
            $param = ["MA_XA" => $req->MA_XA, "MA_NGUOIDUNG" => $ma_nguoidung, "CHITIET"=> $req->CHITIET, "DT" => $req->SDT];
            DB::insert($sql,$param);
            $ma_noi = DB::select("select * from noithanhtoan where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MACDINH = 1",["MA_NGUOIDUNG" => $ma_nguoidung])[0]->MA_NOI;
            return $ma_noi;
        }
         
    }
//    public function update_pp(Request $req){
//        $ma_nguoidung = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
//        
//        if(count(DB::select("select *from donhang where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1",["MA_NGUOIDUNG" => $ma_nguoidung])) > 0){
//            //
//            $pp = DB::select("select * from donhang where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1",["MA_NGUOIDUNG" => $ma_nguoidung])[0];
//            $sql = "UPDATE donhang set MA_THANHTOAN = :MA_THANHTOAN, MA_VANCHUYEN = :MA_VANCHUYEN WHERE MA_DONBAN = :MA_DONBAN";
//            $param = ["MA_THANHTOAN"=> $req->MA_THANHTOAN, "MA_VANCHUYEN" => $req->MA_VANCHUYEN ,"MA_DONBAN" => $pp->MA_DONBAN];
//            DB::update($sql,$param);
//            return 1;
//        }
//        
//    }
//    
//    public function update_voucher(Request $req){
//        $ma_nguoidung = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
//        if(count(DB::select("select * from khuyenmai WHERE MA_KHUYENMAI = :MA_KHUYENMAI",["MA_KHUYENMAI" => $req->MA_KHUYENMAI]))){
//            if(count(DB::select("select *from donhang where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1",["MA_NGUOIDUNG" => $ma_nguoidung])) > 0){
//                //
//                $vc = DB::select("select * from donhang where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1 ",["MA_NGUOIDUNG" => $ma_nguoidung])[0];
//                $sql = "UPDATE donhang set MA_KHUYENMAI = :MA_KHUYENMAI WHERE MA_DONBAN = :MA_DONBAN";
//                $param = ["MA_KHUYENMAI"=> $req->MA_KHUYENMAI ,"MA_DONBAN" => $vc->MA_DONBAN];
//                DB::update($sql,$param);
//                return 1;
//            }
//        }
//        else{
//            return 2;
//        }
//        
//    }

    public function check_out(Request $req){
        $ma_nguoidung = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
        $hoadon = DB::select("select * from donhang WHERE MA_TRANGTHAI = 1 AND MA_NGUOIDUNG = :MA_NGUOIDUNG", ["MA_NGUOIDUNG" => $ma_nguoidung]);
        $list = [$req->MA_VANCHUYEN];
        $ma_vt = "";
        $ma_tt = $req-> MA_THANHTOAN;
        $ma_noi = $req->MA_NOI;
        
        $error = [];
        if(is_null($req->MA_XA)){
            array_push($error, "Vui lòng chọn nơi nhận hàng");
        }
        
        if(is_null($req-> MA_THANHTOAN)){
            array_push($error, "Vui lòng hình thức thanh toán");
        }
        if(count($error) > 0){
            $danhmuc = DB::select('select * from danhmuc');
            $tinh = DB::select("select * from tinh");
            $huyen  = DB::select("select * from huyen");
            $xa = DB::select("select * from xa LIMIT 11283");
            $user = Session::get("MA_NGUOIDUNG");
            $thanhtoan = DB::SELECT('Select * from thanhtoan');
            $vanchuyen = DB::select('Select * from vanchuyen');
            $soluong = 0;

            $noithanhtoan = DB::select("select ntt.*,xa.MA_HUYEN, huyen.MA_TINH  from noithanhtoan ntt "
                    . "     join xa on xa.MA_XA = ntt.MA_XA JOIN huyen on huyen.MA_HUYEN = xa.MA_HUYEN where MA_NGUOIDUNG = :ID AND MACDINH =1",
                            ['ID'=>$user->MA_NGUOIDUNG]);
            if($noithanhtoan){
                $noithanhtoan = $noithanhtoan[0];
            }else
            {
                $noithanhtoan = new Noithanhtoan();
            }


            if($user){
                $giohang = DB::select("select donhang.*, vt.DONGIA, KM.GIAMGIA from donhang LEFT JOIN vanchuyen vt ON vt.MA_VANCHUYEN = donhang.MA_VANCHUYEN LEFT JOIN KHUYENMAI KM ON KM.MA_KHUYENMAI = donhang.MA_KHUYENMAI where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1",["MA_NGUOIDUNG" => $user->MA_NGUOIDUNG]);

                if($giohang){
                    $giohang = $giohang[0];
                }else{
                    $giohang = new Donhang();
                }

                $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh "
                        . "join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;

                $cuahang = DB::select("SELECT * FROM donhang JOIN cuahang ON cuahang.MA_CUAHANG = donhang.MA_CUAHANG WHERE MA_TRANGTHAI = 1 AND MA_NGUOIDUNG = :MA_NGUOIDUNG", ["MA_NGUOIDUNG" => $user->MA_NGUOIDUNG]);
                $sp = DB:: select('select sanpham.*, ctdonhang.SOLUONG, ctdonhang.DONGIA, ctdonhang.SOLUONG * ctdonhang.DONGIA as THANHTIEN, donhang.* ,h1.URL from donhang 
                                        inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN
                                        inner join sanpham on ctdonhang.MA_SP = sanpham.MA_SP 
                                        inner JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sanpham.MA_SP
                                        WHERE donhang.MA_TRANGTHAI = 1 And donhang.MA_NGUOIDUNG = :MA_NGUOIDUNG',['MA_NGUOIDUNG'=>$user->MA_NGUOIDUNG]);
                return view ("cart.index",["cuahang" => $cuahang ,'giohang' => $giohang ,'noithanhtoan'=>$noithanhtoan,"vanchuyen"=>$vanchuyen,'errors' => $error,
                    "thanhtoan"=>$thanhtoan,"sanpham"=>$sp,'danhmuc'=>$danhmuc,'soluong'=>$soluong,'user'=>$user,'tinh'=>$tinh,'huyen'=>$huyen,'xa'=>$xa]);
            }
        }
//        DB::beginTransaction();
//
//        try {
            if(count(DB::select("select * from noithanhtoan where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MACDINH = 1",["MA_NGUOIDUNG" => $ma_nguoidung])) == 0){
                $sql = "insert noithanhtoan (MA_XA, MA_NGUOIDUNG, CHITIET, DT, MACDINH) VALUES(:MA_XA, :MA_NGUOIDUNG, :CHITIET, :DT ,'1')";
                $param = ["MA_XA" => $req->MA_XA, "MA_NGUOIDUNG" => $ma_nguoidung, "CHITIET"=> $req->CHITIET, "DT"=> $req->DT];
                DB::insert($sql,$param);
                $ma_noi = DB::select("select * from noithanhtoan where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MACDINH = 1",["MA_NGUOIDUNG" => $ma_nguoidung])[0]->MA_NOI;
            }
            
            foreach($hoadon as $key => $item){
                if (!is_null($list[0][$key])){
                    $ma_vt = $list[0][$key];
                }
                $tong = DB::select("select sum(SOLUONG*DONGIA) as TONG from ctdonhang WHERE MA_DONBAN = :MA_DONBAN", ["MA_DONBAN" => $item->MA_DONBAN])[0]->TONG;
                $phivt = DB::select("select DONGIA from vanchuyen WHERE MA_VANCHUYEN = :MA_VANCHUYEN", ["MA_VANCHUYEN" => $ma_vt])[0]->DONGIA;
                $giam = DB::select("select GIAMGIA from khuyenmai WHERE MA_KHUYENMAI = :MA_KHUYENMAI AND :DATE BETWEEN BATDAU and KETTHUC", 
                        ["MA_KHUYENMAI" => $req->MA_KHUYENMAI, "DATE" => date("Y/m/d")]);
                if($giam){
                    $tongtien = $tong + $phivt - $giam[0]->GIAMGIA;
                }
                else{
                    $tongtien = $tong + $phivt;
                }
                $row = DB::select("select TEN_TINH, TEN_HUYEN, TEN_XA, huyen.LOAI as LOAI_H, xa.LOAI as LOAI_X from noithanhtoan nt join xa on xa.MA_XA = nt.MA_XA 
                    join huyen on huyen.MA_HUYEN = xa.MA_HUYEN
                    join tinh on tinh.MA_TINH = huyen.MA_TINH
                    where MA_NOI = ?", [$ma_noi])[0];
                $diachi = $row->TEN_TINH. ", ".$row->LOAI_H." ".$row->TEN_HUYEN.", ".$row->LOAI_X.", ".$row->TEN_XA. ", ".$req->CHITIET;
                $sql = "update donhang set MA_TRANGTHAI = 2, MA_VANCHUYEN = :MA_VANCHUYEN, MA_THANHTOAN = :MA_THANHTOAN,"
                        . " MA_KHUYENMAI = :MA_KHUYENMAI, NGAYDAT = :NGAYDAT, TONGTIEN = :TONGTIEN, MA_NOI = :MA_NOI, DIACHI = :DIACHI WHERE MA_DONBAN = :MA_DONBAN";
                $param = ["MA_VANCHUYEN" => $ma_vt, "MA_THANHTOAN" => $ma_tt,
                    "MA_KHUYENMAI" => $req->MA_KHUYENMAI, "NGAYDAT" => date("Y/m/d"), "MA_DONBAN" => $item->MA_DONBAN, "MA_NOI" => $ma_noi, "DIACHI" => $diachi, "TONGTIEN" => $tongtien];
                DB::update($sql, $param);
            }

            $user = Session::get("MA_NGUOIDUNG");
            if($user->STATUS == 1){
                $sql = "select nd.TEN_NGUOIDUNG, vt.DONGIA, km.GIAMGIA, donhang.*,
                        PHUONGTHUC_THANHTOAN, nd.SDT, PHUONGTHUC_VANCHUYEN, THOIGIADUKIEN
                        from donhang 
                        LEFT JOIN vanchuyen vt ON vt.MA_VANCHUYEN = donhang.MA_VANCHUYEN 
                        LEFT JOIN KHUYENMAI KM ON KM.MA_KHUYENMAI = donhang.MA_KHUYENMAI 
                        JOIN thanhtoan tt on tt.MA_THANHTOAN = donhang.MA_THANHTOAN
                        JOIN nguoidung nd on nd.MA_NGUOIDUNG = donhang.MA_NGUOIDUNG
                        where MA_DONBAN IN ('".join("','",array_column($hoadon, "MA_DONBAN")). "')";
                $order = DB::select($sql);

                foreach($order as $row){
                    $detail = DB::select("select * from ctdonhang ct_dh JOIN sanpham sp on sp.MA_SP = ct_dh.MA_SP where MA_DONBAN = ?", [$row->MA_DONBAN]);

                    $data = [
                        "to" => $user->EMAIL,
                        "subject" => "[Hóa đơn mua hàng] Hóa đơn #".$row->MA_DONBAN." mua hàng ngày ".date('Y/m/d')." tại shop SupperMarket",
                        "template" => "order_mail",
                        "data" => [
                            "order" => $row,
                            "detail" => $detail
                        ]
                    ];

                    $email = new SendEmail($data);
                    Mail::to($data["to"])->send($email);
                }
            }
//            DB::commit();
//            // all good
//        } catch (\Exception $e) {
//            DB::rollback();
//            $this->error($e);
////            return redirect("/cart");
//            // something went wrong
//        }
        
        
        Session::put("complete", true);
        return redirect("/cart/complete");
    }
    
    public function check_voucher(Request $req){
        $check = DB::select("select COUNT(*) AS COUNT from khuyenmai Where MA_KHUYENMAI = :MA_KHUYENMAI AND :DATE BETWEEN BATDAU and KETTHUC",
                ["MA_KHUYENMAI" => $req->MA_KHUYENMAI, "DATE" => date("Y/m/d")])[0]->COUNT;
        if($check > 0){
            $giam = DB::select("select GIAMGIA from khuyenmai Where MA_KHUYENMAI = :MA_KHUYENMAI",  ["MA_KHUYENMAI" => $req->MA_KHUYENMAI]);
            return $giam[0]->GIAMGIA;
        }else{
            return -1;
        }
        
    }
    
    public function complete(){
        if(Session::get("complete")){
            Session::put("complete", false);
            $user = Session::get("MA_NGUOIDUNG");
            $danhmuc = DB::SELECT('select * from danhmuc');
            return view("cart.complete",["danhmuc"=>$danhmuc, 'user'=>$user, "soluong" => 0]);
        }else{
            return redirect("/");
        }
    }

    public function add_cart(Request $req){
        $ma_nguoidung = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
        $gia = DB::select("select GIA - CASE WHEN GIAMGIA IS NULL THEN 0 ELSE GIAMGIA END AS GIA, MA_CUAHANG from sanpham WHERE MA_SP = :MA_SP", ["MA_SP" => $req->MA_SP])[0];
        if($ma_nguoidung){
            if(count(DB::select("SELECT * from DONHANG WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1 AND MA_CUAHANG = :MA_CUAHANG", ["MA_NGUOIDUNG" => $ma_nguoidung, "MA_CUAHANG" => $gia ->MA_CUAHANG])) == 0){
                DB::insert("insert into DONHANG(MA_NGUOIDUNG, MA_TRANGTHAI , MA_CUAHANG) value(:MA_NGUOIDUNG, 1, :MA_CUAHANG)", ["MA_NGUOIDUNG" => $ma_nguoidung, "MA_CUAHANG" => $gia ->MA_CUAHANG]);
            }
            $sp = DB::select("select donhang.MA_DONBAN, ctdonhang.SOLUONG from donhang LEFT JOIN ctdonhang ON donhang.MA_DONBAN = ctdonhang.MA_DONBAN where MA_SP = :MA_SP AND donhang.MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1 AND donhang.MA_CUAHANG = :MA_CUAHANG", ["MA_SP" => $req->MA_SP,"MA_NGUOIDUNG" => $ma_nguoidung, "MA_CUAHANG" => $gia->MA_CUAHANG]);
            $hdon = DB::select("SELECT * from donhang WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1 AND MA_CUAHANG = :MA_CUAHANG", ["MA_NGUOIDUNG" => $ma_nguoidung, "MA_CUAHANG" => $gia->MA_CUAHANG])[0];
            $soluong = Sanpham::detail($req->MA_SP)->KHO;
            if(count($sp) > 0 ){ //trong gio hang co sang pham thi update con nguoc lai thi insert
                $sl = DB::select("select SOLUONG FROM ctdonhang WHERE MA_DONBAN = :MA_DONBAN AND MA_SP =:MA_SP", ["MA_SP"=>$req->MA_SP,"MA_DONBAN" => $hdon->MA_DONBAN]);
                if ($soluong > ($req->SOLUONG + $sl[0]->SOLUONG)){
                    $soluong = $req->SOLUONG + $sl[0]->SOLUONG;
                }
                DB::update("UPDATE ctdonhang SET SOLUONG = :SOLUONG WHERE MA_DONBAN = :MA_DONBAN AND MA_SP =:MA_SP", ["MA_SP"=>$req->MA_SP,"MA_DONBAN" => $hdon->MA_DONBAN, "SOLUONG" => $soluong]);
                //$tongtien = $req->SOLUONG * $gia->GIA;
                //DB::update("UPDATE DONHANG SET TONGTIEN = TONGTIEN + :TONGTIEN WHERE MA_DONBAN = :MA_DONBAN", ["TONGTIEN" => $tongtien , "MA_DONBAN" => $hdon->MA_DONBAN]);
            }else{
                if ($soluong > $req->SOLUONG){
                    $soluong = $req->SOLUONG;
                }
                DB::insert("INSERT INTO `ctdonhang`(MA_DONBAN, MA_SP, SOLUONG, DONGIA) VALUES(:MA_DONBAN, :MA_SP, :SOLUONG, :DONGIA)",["MA_DONBAN" => $hdon->MA_DONBAN,"MA_SP" => $req->MA_SP, "SOLUONG" => $soluong, 'DONGIA' =>$gia->GIA]);
                //$tongtien = $req->SOLUONG * $gia->GIA;
                //DB::insert("UPDATE DONHANG SET TONGTIEN = :TONGTIEN WHERE MA_DONBAN = :MA_DONBAN", ["TONGTIEN" => $tongtien , "MA_DONBAN" => $hdon->MA_DONBAN]);
                
            }    
            return 1; // them san pham moi vao
        }else
        {
            return -1; // tra ve ket qua loi
        }
    }
//    
//    public function add_order(Request $req){
//        $user = Session::get("MA_NGUOIDUNG");
//        if ($user){
//        $soluong = DB::select("select COUNT(SOLUONG) AS SOLUONG from donhang dh join ctdonhang ct on ct.ma_donban = dh.ma_donban AND dh.MA_TRANGTHAI = 1 WHERE MA_NGUOIDUNG = :ID", ['ID' => $user -> MA_NGUOIDUNG])[0]->SOLUONG;
//        }else{
//            $soluong = 0;
//        }
//        $ma_nguoidung = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
//        if($ma_nguoidung){
//            $danhmuc = DB::SELECT('select * from danhmuc');
//            $vanchuyen = DB::select('select * from vanchuyen');
//            $thanhtoan = DB::SELECT('Select * from thanhtoan');
//            $sp = DB:: select('select  SUM(ctdonhang.SOLUONG * ctdonhang.DONGIA) as THANHTIEN from donhang 
//                                    inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN
//                                    inner join sanpham on ctdonhang.MA_SP = sanpham.MA_SP 
//                                    inner JOIN (select ha.MA_SP, MIN(URL) as URL from HINHANH ha GROUP BY ha.MA_SP) as h1 on h1.MA_SP = sanpham.MA_SP
//                                    WHERE donhang.MA_TRANGTHAI = 1 And donhang.MA_NGUOIDUNG = :MA_NGUOIDUNG',['MA_NGUOIDUNG'=>$ma_nguoidung])[0];
//            $giohang = DB::select("select donhang.*, vt.DONGIA, KM.GIAMGIA from donhang LEFT JOIN vanchuyen vt ON vt.MA_VANCHUYEN = donhang.MA_VANCHUYEN LEFT JOIN KHUYENMAI KM ON KM.MA_KHUYENMAI = donhang.MA_KHUYENMAI where MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1",["MA_NGUOIDUNG" => $ma_nguoidung])[0];           
//            $toanbo = $sp->THANHTIEN + $giohang->DONGIA - $giohang->GIAMGIA;
//            DB::update("update donhang 
//                        SET MA_TRANGTHAI = 2, TONGTIEN = :TONGTIEN 
//                        WHERE MA_TRANGTHAI = 1 AND MA_NGUOIDUNG = :MA_NGUOIDUNG",["TONGTIEN" => $toanbo, 'MA_NGUOIDUNG'=>$ma_nguoidung]);
//            return view("cart.complete",["danhmuc"=>$danhmuc,'thanhtoan' =>$thanhtoan,'vanchuyen' =>$vanchuyen,'soluong'=>$soluong,'user'=>$user]);
//        }
//        else{
//            return redirect("/home");
//        }
//    }
    
    public function delete(Request $req){
        $ma_nguoidung = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
        $sanpham = DB::select("select GIA, MA_CUAHANG from sanpham WHERE MA_SP = :MA_SP", ["MA_SP" => $req->MA_SP])[0];
        $hdon = DB::select("SELECT * from donhang WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1 AND MA_CUAHANG = :MA_CUAHANG", ["MA_NGUOIDUNG" => $ma_nguoidung, "MA_CUAHANG" => $sanpham -> MA_CUAHANG])[0];
        DB::delete("DELETE FROM ctdonhang where MA_DONBAN = :MA_DONBAN AND MA_SP = :MA_SP", ["MA_DONBAN" => $hdon->MA_DONBAN, "MA_SP" => $req->MA_SP]);
        if(count(DB::select("select * from ctdonhang WHERE MA_DONBAN = :MA_DONBAN", ["MA_DONBAN" => $hdon->MA_DONBAN]) ) == 0){
          DB::delete("DELETE FROM donhang where MA_DONBAN = :MA_DONBAN", ["MA_DONBAN" => $hdon->MA_DONBAN]); 
          return 2;
        }
        return 1;
    }
    
    public function update_soluong(Request $req){
        $ma_nguoidung = Session::get("MA_NGUOIDUNG")->MA_NGUOIDUNG;
        $hdon = DB::select("SELECT * from donhang inner join ctdonhang on donhang.MA_DONBAN = ctdonhang.MA_DONBAN WHERE MA_NGUOIDUNG = :MA_NGUOIDUNG AND MA_TRANGTHAI = 1 AND ctdonhang.MA_SP = :MA_SP", ["MA_NGUOIDUNG" => $ma_nguoidung, "MA_SP" => $req->MA_SP])[0];
        
        
        if($req->SOLUONG == 0){
            DB::delete("delete from ctdonhang Where MA_DONBAN = :MA_DONBAN AND MA_SP =:MA_SP",["MA_DONBAN" => $hdon->MA_DONBAN, "MA_SP" => $req->MA_SP]);
            if(count(DB::select("select * from ctdonhang WHERE MA_DONBAN = :MA_DONBAN", ["MA_DONBAN" => $hdon->MA_DONBAN]) ) == 0){
                DB::delete("DELETE FROM donhang where MA_DONBAN = :MA_DONBAN", ["MA_DONBAN" => $hdon->MA_DONBAN]); 
                return -2;
            }
            else{
                return -1;
            }
        }
        else{
            $soluong = Sanpham::detail($req->MA_SP)->KHO;
            if ($soluong > $req->SOLUONG){
                $soluong = $req->SOLUONG;
            }
            DB::update("update ctdonhang set SOLUONG =:SOLUONG where MA_DONBAN = :MA_DONBAN AND MA_SP =:MA_SP",["MA_DONBAN" => $hdon->MA_DONBAN, "MA_SP" => $req->MA_SP,"SOLUONG"=>$soluong]);
            return $soluong;
        }
    }
    
    public function show_order(){
        
    }
}
