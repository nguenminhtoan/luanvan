<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;

class role
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
        if (Session::get("MA_NGUOIDUNG")->ADMIN == 2 ){
            return $next($request);
        }else
        {
            return redirect("/register_shop");
        }
    }
}
