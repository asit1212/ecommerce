<?php namespace App\Http\Middleware;

use Closure;

class RequireSSL
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$request->isSecure()) {
            return redirect()->secure($request->path());
        }

        return $next($request);
    }

}