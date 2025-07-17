<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class MultiRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $roles): Response
    {
        // check user if authenticated
        if(!Auth::check()){
            return redirect()->route('login');
        };

        $user = Auth::user();

        // For simple role column approach
        if(!in_array($user->role, $roles)){
            abort('403',  'Unauthorized. You do not have any of the required roles.');
        }

        return $next($request);
    }
}
