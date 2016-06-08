<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Authenticate
{

    protected $redirectNotLogged = '/admin/login';

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
        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            } else {
                $redirectNotLogged = property_exists($this, 'redirectNotLogged') ? $this->redirectNotLogged : 'login';
                return redirect()->guest($redirectNotLogged);
            }
        }

        return $next($request);
    }
}
