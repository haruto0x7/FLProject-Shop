<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;

class Administrator
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
        if(Auth::user()->role == 'Admin' && Auth::user()->status == 'Active'){
            return $next($request);
        }
        return redirect()->route('admin.index');
    }
}
