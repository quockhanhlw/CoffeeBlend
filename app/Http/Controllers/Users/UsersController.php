<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Models\Product\Booking;
use App\Models\Product\Order;
use App\Models\Product\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    public function displayOrders()
    {
        // Lấy tất cả orders của user hiện tại
        $orders = Order::with('orderItems')
            ->where('user_id', Auth::user()->user_id)
            ->orderBy('order_id', 'desc')
            ->get();
        // Loại bỏ các orders trùng lặp dựa trên order_id
        $orders = $orders->unique('order_id')->values();

        return view('users.orders', compact('orders'));
    }

    public function displayBookings()
    {
        $bookings = Booking::select()
            ->where('user_id', Auth::user()->user_id)
            ->orderBy('booking_id', 'desc')
            ->get();

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
        if ($writeReviews) {
            return Redirect::route('write.reviews')->with(['reviews' => 'review submitted successfully']);
        }

    }
}
