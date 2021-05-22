<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class roleAdmin
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
        if (Session::get("MA_NGUOIDUNG")->ADMIN == 3){
            return $next($request);
        }else
        {
            return redirect("/admin/shop");
        }
    }
}
