<?php

namespace App\Http\Controllers\Staffs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Order;
use App\Models\Product\Booking;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


class StaffsController extends Controller
{
    public function viewLoginStaff()
    {
        return view('staffs.login');
    }

    public function checkLoginStaff(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('staff')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('staffs.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {
        $productsCount = Product::select()->count();
        $ordersCount = Order::select()->count();
        $bookingsCount = Booking::select()->count();
        $staffsCount = Staff::select()->count();

        return view('staffs.index', compact('productsCount', 'ordersCount', 'bookingsCount', 'staffsCount'));
    }

    public function displayAllStaffs()
    {
        $allStaffs = Staff::select()->orderBy('id', 'desc')->get();

        return view('staffs.allstaffs', compact('allStaffs'));
    }

    public function createStaffs()
    {
        return view('staffs.createstaffs');
    }

    public function storeStaffs(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'email' => 'required|max:40',
            'password' => 'required|max:40',
        ]);

        $storeStaffs = Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($storeStaffs){
            return Redirect::route('staff.all.staffs')->with(['success' => 'Staff created successfully']);
        }

    }

    public function logoutStaff(Request $request)
    {
        Auth::guard('staff')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('view.login.staff'); // Chuyển hướng về trang login của staff
    }

    public function displayAllOrdersStaff()
    {
        $allOrders = Order::select()->orderBy('order_id', 'desc')->get();

        return view('staffs.allorders', compact('allOrders'));
    }

    public function editOrdersStaff($id)
    {
        $order = Order::find($id);

        return view('staffs.editorders', compact('order'));
    }

    public function updateOrdersStaff(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update($request->all());

        if($order){
            return Redirect::route('all.orders.staff')->with(['update' => 'Order status updated successfully']);
        }
    }

    public function deleteOrdersStaff($id)
    {
        $order = Order::find($id);
        $order->delete();

        if($order){
            return Redirect::route('all.orders.staff')->with(['delete' => 'Order deleted successfully']);
        }
    }

    public function displayAllProductsStaff()
    {
        $products = Product::select()->orderBy('product_id', 'desc')->paginate(10);

        return view('staffs.allproducts', compact('products'));
    }

    public function createProductsStaff()
    {
        return view('staffs.createproducts');
    }

    public function storeProductsStaff(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:100',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required',
            'type' => 'required',
        ]);

        $destinationPath = 'assets/images/';
        $myimage = $request->product_image->getClientOriginalName();
        $request->product_image->move(public_path($destinationPath), $myimage);

        $storeProducts = Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'product_image' => $myimage,
            'description' => $request->description,
            'type' => $request->type,
            'quantity' => $request->quantity ?? 0,
        ]);

        if($storeProducts){
            return Redirect::route('all.products.staff')->with(['success' => 'Product created successfully']);
        }
    }

    public function deleteProductsStaff(Request $request)
    {
        $product = Product::find($request->id);

        if(File::exists(public_path('assets/images/' . $product->product_image))){
            File::delete(public_path('assets/images/' . $product->product_image));
        }else{
            //dd('File does not exists.');
        }
        $product->delete();

        if($product){
            return Redirect::route('all.products.staff')->with(['delete' => 'Product deleted successfully']);
        }
    }

    public function editProductsStaff($id)
    {
        $product = Product::find($id);
        return view('staffs.editproducts', compact('product'));
    }

    public function updateProductsStaff(Request $request, $id)
    {
        $product = Product::find($id);

        // Handle image upload if new image is provided
        if($request->hasFile('product_image')) {
            // Delete old image
            if(File::exists(public_path('assets/images/' . $product->product_image))){
                File::delete(public_path('assets/images/' . $product->product_image));
            }

            // Upload new image
            $myimage = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('assets/images'), $myimage);
            $product->product_image = $myimage;
        }

        // Update product fields
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->type = $request->type;
        $product->quantity = $request->quantity ?? 0;
        $product->save();

        return Redirect::route('all.products.staff')->with(['success' => 'Product updated successfully']);
    }

    public function displayAllBookingsStaff()
    {
        $bookings = Booking::select()->orderBy('booking_id', 'desc')->get();

        return view('staffs.allbookings', compact('bookings'));
    }

    public function editBookingsStaff($id)
    {
        $booking = Booking::find($id);

        return view('staffs.editbookings', compact('booking'));
    }

    public function updateBookingsStaff(Request $request, $id)
    {
        $booking = Booking::find($id);

        $booking->update($request->all());

        if($booking){
            return Redirect::route('all.bookings.staff')->with(['update' => 'Booking status updated successfully']);
        }
    }

    public function deleteBookingsStaff($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        if($booking){
            return Redirect::route('all.bookings.staff')->with(['delete' => 'Booking deleted successfully']);
        }
    }
}