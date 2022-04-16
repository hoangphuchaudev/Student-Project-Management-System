<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;
use Session;
class loainguoidung
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()&& Auth::user()->role == 2)
        {
             return $next($request);
        }
        else if (Auth::check() && Auth::user()->role == 1)
        {
            Session::put('Mess','<div class="alert alert-danger" id="errormsg" style="margin-top: 10px;">
                <strong>Đăng nhập không thành công!</strong> Đây là giảng viên
                </div>');
          return redirect()->route('login');
        }
        else
        return redirect()->route('login');
    }
}
