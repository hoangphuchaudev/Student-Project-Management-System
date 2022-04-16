<?php

namespace App\Http\Middleware;
use Auth;
use Closure;
use Session;
class SinhVien
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
       if(Session::get('MaUS')!="" && Session::get('LoaiUS') == 2)
        {
             return $next($request);
        }
        else
        return redirect()->route('trangchu');
    }
}
