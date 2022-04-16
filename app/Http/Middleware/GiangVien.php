<?php

namespace App\Http\Middleware;

use Closure;
use Session;

class GiangVien
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
      if((Session::get('MaUS')!="" && Session::get('LoaiUS') == 1)||(Session::get('MaUS')!="" && Session::get('LoaiUS') == 3))
        {
             return $next($request);
        }
        else
        return redirect()->route('trangchu');
    }
}
