<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class checkAdmin
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
        if(!Auth::check() || Auth::user()->group_id != 1) {
            die('Ban Khong co quyen truy cap !!!');
        }
        return $next($request);
    }
}
