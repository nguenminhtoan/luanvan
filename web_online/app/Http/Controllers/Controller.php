<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Donhang;
use Session;
use View;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {
        $ship = false;
        $mach = Session::get("MA_NGUOIDUNG");
        $notifi = [];
        $cuahang = [];
        if (isset($mach) && $mach->ADMIN == 3){
            $notifi = Donhang::list_notifi_ch();
        }else{
            if (isset($mach) && $mach->MA_CUAHANG != ""){
                $notifi = Donhang::list_notifi($mach->MA_CUAHANG);
                $cuahang = DB::select('select * from nguoidung nd left join Cuahang ch on ch.MA_CUAHANG = nd.MA_CUAHANG
                         where ch.MA_CUAHANG = :MA_CUAHANG', ['MA_CUAHANG' => $mach->MA_CUAHANG])[0];
            }
        }
        View::share("thongbao",$notifi);
        View::share("cuahang",$cuahang);
        if (isset($mach)){
            $mavt = DB::select("select * from nhanvien where ma_nguoidung = ?" , [$mach->MA_NGUOIDUNG]);
            if (count($mavt) > 0 ){
                $ship = true;
                View::share("user",$mach);
            }
            
        }
        View::share("ship",$ship);
    }

}
