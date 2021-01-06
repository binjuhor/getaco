<?php

namespace App\Http\Middleware;

use Closure;

class CheckCompany
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
        $route = request()->route()->getAction();
        $a1 = explode("@",$route['controller']);
        
        dd($route);
        return;
        if ($request->age <= 200) {
            return redirect('home');
        }

        return $next($request);
    }
}
