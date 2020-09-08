<?php

namespace App\Http\Middleware;

use Closure;

class SuperAdmin
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
        if (!$request->user()->admin==2)
        {
            if ($request->wantsJson())
            {
                return response()->json(['Message' , 'You do not have access to this page.'], 403);
            }
            abort(403, 'You do not have access to this page');
        }
        return $next($request);
    }
}
