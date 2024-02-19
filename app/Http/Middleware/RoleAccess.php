<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        abort_if(
            !Auth::check() && !$request->user()->hasRole($role) || Auth::check() && !$request->user()->hasRole($role),
            403,
            'Você não tem permissão!'
        );
        
        return $next($request);
    }
}
