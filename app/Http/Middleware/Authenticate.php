<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Jenssegers\Agent\Agent;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $agent = new Agent();

        if (!$request->expectsJson()) {
            if ($agent->isDesktop())
                return route('loginComp');
            else if ($agent->isMobile())
                return route('loginMobile');
            else
                "Error: User not authenticated";
        }
    }
}
