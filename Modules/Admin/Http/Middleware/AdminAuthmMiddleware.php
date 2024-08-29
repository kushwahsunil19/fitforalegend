<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuthmMiddleware
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
       if(!session()->has('admin') && !session()->has('ADMINLOGIN'))
        {
            return redirect('/admin');
        }
        return $next($request);
    }
}
