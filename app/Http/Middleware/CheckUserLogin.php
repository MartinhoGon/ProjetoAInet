<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckUserLogin
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
        if (!Auth::check()) {
            return redirect('login');
        }
        if ($request->user->id != Auth::user()->id) {
            return redirect('home');
        }
        return $next($request);
    }
}
