<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateStaff
{
    public function handle(Request $request, Closure $next): Response
    {
        // Ensure the current session is authenticated with the 'staff' guard
        if (! Auth::guard('staff')->check()) {
            return redirect()->route('view.login.staff')->with('error', 'Please log in to access the staff panel.');
        }

        return $next($request);
    }
}
