<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use Session;

class Admin
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
        if (!Auth::user()->admin == 1) {
            
        Session::flash('info','you do not hav the permission of this task');
        return redirect()->back();
        }
        return $next($request);
    }
}
