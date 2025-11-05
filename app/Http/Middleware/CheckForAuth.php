<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\Response;

class CheckForAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If already authenticated for a specific guard, prevent accessing its login page
        if ($request->is('admin/login') && Auth::guard('admin')->check()) {
            return redirect()->route('admins.dashboard');
        }

        if ($request->is('staff/login') && Auth::guard('staff')->check()) {
            return redirect()->route('staffs.dashboard');
        }

        return $next($request);

    }
}