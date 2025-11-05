<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Symfony\Component\HttpFoundation\Response;

class AuthenticateAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Sử dụng guard 'admin' để kiểm tra
        // Auth::guard('admin')->check() sẽ kiểm tra session của admin
        if (!Auth::guard('admin')->check()) {
            // Nếu admin chưa đăng nhập, chuyển hướng về trang đăng nhập của admin
            return redirect()->route('view.login.admin')->with('error', 'Please log in to access the admin panel.');
        }

        // Nếu đã đăng nhập, cho phép đi tiếp
        return $next($request);
    }
}