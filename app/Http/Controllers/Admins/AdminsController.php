<?php

namespace App\Http\Controllers\Admins;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Order;
use App\Models\Product\Booking;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Staff;


class AdminsController extends Controller
{
    public function viewLoginAdmin()
    {
        return view('admins.login');
    }

    public function checkLoginAdmin(Request $request)
    {
        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {
            
            return redirect() -> route('admins.dashboard');
        }
        return redirect()->back()->with(['error' => 'error logging in']);
    }

    public function index()
    {
        $productsCount = Product::select()->count();
        $ordersCount = Order::select()->count();
        $bookingsCount = Booking::select()->count();
        $StaffsCount = Staff::select()->count();

        // Get orders by month for the current year
        $ordersPerMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Get bookings by month for the current year
        $bookingsPerMonth = Booking::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        // Fill in missing months with 0
        $ordersData = [];
        $bookingsData = [];
        for ($i = 1; $i <= 12; $i++) {
            $ordersData[] = $ordersPerMonth[$i] ?? 0;
            $bookingsData[] = $bookingsPerMonth[$i] ?? 0;
        }

        return view('admins.index', compact('productsCount', 'ordersCount', 'bookingsCount', 'StaffsCount', 'ordersData', 'bookingsData'));
    }

    public function displayAllStaffs()
    {
        $allStaffs = Staff::select()->orderBy('id', 'desc')->get();

        // Render staff listing within the admin layout
        return view('admins.allstaffs', compact('allStaffs'));
    }

    public function createAdmins()
    {
        return view('admins.createadmins');
    }

    public function createStaffs()
    {
        return view('admins.createstaffs');
    }

    public function storeAdmins(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'email' => 'required|max:40',
            'password' => 'required|max:40',
        ]);

        $storeAdmins = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if($storeAdmins){
            return Redirect::route('admins.dashboard')->with(['success' => 'Admin created successfully']);
        }

    }

    public function storeStaffs(Request $request)
    {
        Request()->validate([
            'name' => 'required|max:40',
            'email' => 'required|email|max:40|unique:staffs,email',
            'password' => 'required|max:40',
        ]);

        $storeStaffs = Staff::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($storeStaffs) {
            return Redirect::route('all.staffs')->with(['success' => 'Staff created successfully']);
        }
    }

    public function logoutAdmin(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('view.login.admin'); // Chuyển hướng về trang login của admin
    }

    public function displayAllOrders()
    {
        $allOrders = Order::select()->orderBy('order_id', 'desc')->get();

        return view('admins.allorders', compact('allOrders'));
    }

    public function editOrders($id)
    {
        $order = Order::find($id);

        return view('admins.editorders', compact('order'));
    }

    public function updateOrders(Request $request, $id)
    {
        $order = Order::find($id);

        $order->update($request->all());

        if($order){
            return Redirect::route('all.orders')->with(['update' => 'Order status updated successfully']);
        }
    }

    public function deleteOrders($id)
    {
        $order = Order::find($id);
        $order->delete();

        if($order){
            return Redirect::route('all.orders')->with(['delete' => 'Order deleted successfully']);
        }
    }

    public function displayAllProducts()
    {
        $products = Product::select()->orderBy('product_id', 'desc')->paginate(10);

        return view('admins.allproducts', compact('products'));
    }

    public function createProducts()
    {
        return view('admins.createproducts');
    }

    public function storeProducts(Request $request)
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
            return Redirect::route('all.products')->with(['success' => 'Product created successfully']);
        }
    }

    public function deleteProducts(Request $request)
    {
        $product = Product::find($request->id);

        if(File::exists(public_path('assets/images/' . $product->product_image))){
            File::delete(public_path('assets/images/' . $product->product_image));
        }else{
            //dd('File does not exists.');
        }
        $product->delete();

        if($product){
            return Redirect::route('all.products')->with(['delete' => 'Product deleted successfully']);
        }
    }

    public function editProducts($id)
    {
        $product = Product::find($id);
        return view('admins.editproducts', compact('product'));
    }

    public function updateProducts(Request $request, $id)
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

        return Redirect::route('all.products')->with(['success' => 'Product updated successfully']);
    }

    public function displayAllBookings()
    {
        $bookings = Booking::select()->orderBy('booking_id', 'desc')->get();

        return view('admins.allbookings', compact('bookings'));
    }

    public function editBookings($id)
    {
        $booking = Booking::find($id);

        return view('admins.editbookings', compact('booking'));
    }

    public function updateBookings(Request $request, $id)
    {
        $booking = Booking::find($id);

        $booking->update($request->all());

        if($booking){
            return Redirect::route('all.bookings')->with(['update' => 'Booking status updated successfully']);
        }
    }

    public function deleteBookings($id)
    {
        $booking = Booking::find($id);
        $booking->delete();

        if($booking){
            return Redirect::route('all.bookings')->with(['delete' => 'Booking deleted successfully']);
        }
    }
}