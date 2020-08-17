<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        echo '1.Middlewave';
        echo "<br>Vi tri: " . $role;
        echo "<br>HTTP responding";
        return $next($request);
    }

    public function terminate($request, $respond){
        echo "<br>3.Terminate Middlewave";
        echo "<br>HTTP responded";
    }
}
