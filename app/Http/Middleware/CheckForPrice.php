<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // Thêm Auth Facade
use App\Models\Product\Cart;                   

class CheckForPrice
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    
    public function handle(Request $request, Closure $next): Response
    {
        
         if ($request->is('products/checkout') || $request->is('products/pay') || $request->is('products/success')) {
            
            // 1. Kiểm tra xem người dùng đã đăng nhập chưa.
            // Đây là bước cần thiết để biết giỏ hàng của ai cần kiểm tra.
            if (!Auth::check()) {
                // Nếu chưa đăng nhập, chuyển hướng đến trang đăng nhập với thông báo.
                return redirect()->route('login')->with('error', 'Bạn cần đăng nhập để thực hiện thanh toán.');
            }

            // 2. Nếu đã đăng nhập, kiểm tra xem giỏ hàng của họ có trống không.
            // Sử dụng doesntExist() để tối ưu hiệu suất.
            if (Cart::where('user_id', Auth::id())->doesntExist()) {
                // Nếu giỏ hàng trống, chuyển hướng về trang sản phẩm với cảnh báo.
                return redirect()->route('products.index')->with('warning', 'Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm để thanh toán.');
    }
        }

        return $next($request);
    }
}

