<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckBlockedUser
{
    
    public function handle($request, Closure $next)
    {
        if (!Auth::user()->blocked()) {
            return redirect('login');
        }
        return $next($request);
    }
}
