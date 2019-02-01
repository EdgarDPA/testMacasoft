<?php

namespace App\Http\Middleware;
use Auth;
use Closure;

class UserType
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
        if(Auth::user()->type==1)
            return response()->view('admin.inicio');
        if(Auth::user()->type==3)
            return response()->view('usuario.inicio');
        if(Auth::user()->type==2)
            return response()->view('vendedor.incio');
        return $next($request);
    }
}
