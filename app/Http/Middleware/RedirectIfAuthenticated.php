<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            $href = $request->url();

            if (str_contains($href, '/mobilePartApp/')) {
                return redirect('mobilePartApp/main');
            }
            else if(str_contains($href, '/computerPartApp/')){
                return redirect('computerPartApp/main');
            }

            return '"RedirectIfAuthenticated" breaked!';
        }

        return $next($request);
    }
}
