<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Booking;
use App\Models\Product\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Product\Review;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Log;

class UsersController extends Controller
{
    public function displayOrders()
    {
        // Lấy tất cả orders của user hiện tại
        $orders = Order::with('orderItems')
                      ->where('user_id', Auth::user()->user_id)
                      ->orderBy('order_id', 'desc')
                      ->get();
        
        // Debug: Log thông tin chi tiết
        Log::info('Total orders found: ' . $orders->count());
        Log::info('User ID: ' . Auth::user()->user_id);
        
        foreach($orders as $order) {
            Log::info('Order #' . $order->order_id . ' - Items count: ' . $order->orderItems->count());
            if ($order->orderItems->count() > 0) {
                foreach($order->orderItems as $item) {
                    Log::info('  - Item: ' . $item->product_name . ' (Qty: ' . $item->quantity . ')');
                }
            }
        }
        
        // Loại bỏ các orders trùng lặp dựa trên order_id
        $orders = $orders->unique('order_id')->values();
        Log::info('Unique orders count: ' . $orders->count());
        
        return view('users.orders', compact('orders'));
    }

    public function displayBookings()
    {
        $bookings = Booking::select()->where('user_id', Auth::user()->user_id)->orderBy('booking_id', 'desc')->get();
        
        return view('users.bookings', compact('bookings'));
    }

    public function writeReview()
    {
        return view('users.writereview');
    }

    public function proccessWriteReview(Request $request)
    {
        $writeReviews = Review::create([
            'name' => Auth::user()->name,
            'review' => $request->review,
        ]);
        if($writeReviews){
            return Redirect::route('write.reviews')->with(['reviews' => "review submitted successfully"]);
            }

    }
}