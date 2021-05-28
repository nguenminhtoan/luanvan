<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Donhang;
use Session;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct() {
        $mach = Session::get("MA_NGUOIDUNG");
        if (isset($mach) && $mach->MA_CUAHANG != ""){
            $notifi = Donhang::list_notifi($mach->MA_CUAHANG);
            View::share("thongbao",$notifi);
        }
    }

}
