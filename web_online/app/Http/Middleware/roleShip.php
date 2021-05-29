<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use DB;
class roleShip
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $mach = Session::get("MA_NGUOIDUNG");
        $mavt = DB::select("select * from nhanvien where ma_nguoidung = ?" , [$mach->MA_NGUOIDUNG]);
        if (count($mavt) > 0 ){
            return $next($request);
        }
        else
        {
            return redirect("/home");
        }
    }
}
