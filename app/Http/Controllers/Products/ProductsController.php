<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Cart;
use App\Models\Product\Order;
use App\Models\Product\OrderItem;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
use Ramsey\Uuid\Codec\OrderedTimeCodec;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Product\Booking;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function singleProduct($id)
    {
        // Logic to retrieve the product by its ID
        $product = Product::find($id);


        $relatedProducts = Product::where('type', $product->type)
                                  ->where('product_id', '!=', $id)
                                  ->take('4')
                                  ->orderBy('product_id', 'desc')
                                  ->get();

        //checking for product in cart
        $checkingInCart = Cart::where('product_id', $id)
                            ->where('user_id', Auth::user()->user_id)
                            ->count();
        // Return the view with the product data
        return view('products.productsingle', compact('product', 'relatedProducts','checkingInCart'));
    }


    public function addCart(Request $request, $id)
    {
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to add products to cart');
        }

        // Check if product already exists in cart
        $existingCartItem = Cart::where('product_id', $request->product_id)
                                ->where('user_id', Auth::user()->user_id)
                                ->first();

        if ($existingCartItem) {
            // If exists, increase quantity
            $existingCartItem->quantity += $request->quantity ?? 1;
            $existingCartItem->save();
        } else {
            // If not exists, create new cart item
            $addCart = Cart::create([
                'product_id' => $request->product_id,
                'name' => $request->product_name,
                'image' => $request->product_image,
                'price' => $request->price,
                'quantity' => $request->quantity ?? 1,
                'user_id' => Auth::user()->user_id,
            ]);
        }

        return Redirect::route('product.single', $id)->with(['success' => 'product added to cart successfully']);
    }

    public function cart()
    {
        $cartProducts = Cart::where('user_id', Auth::user()->user_id)
                    ->orderBy('cart_id', 'desc')
                    ->get();

        // Calculate total price considering quantity
        $totalPrice = 0;
        foreach ($cartProducts as $item) {
            $totalPrice += $item->price * $item->quantity;
        }

        return view('products.cart', compact('cartProducts', 'totalPrice'));
    }

    // Update cart quantity
    public function updateCartQuantity(Request $request, $id)
    {
        $cartItem = Cart::where('cart_id', $id)
                        ->where('user_id', Auth::user()->user_id)
                        ->first();

        if ($cartItem) {
            $action = $request->action;
            
            if ($action === 'increase') {
                $cartItem->quantity += 1;
            } elseif ($action === 'decrease' && $cartItem->quantity > 1) {
                $cartItem->quantity -= 1;
            }
            
            $cartItem->save();
        }

        return Redirect::route('cart')->with(['success' => 'Cart updated successfully']);
    }


    public function deleteProductCart($id)
    {
        $deleteProductCart = Cart::where('product_id', $id)
                                ->where('user_id', Auth::user()->user_id);
                                
                                
        $deleteProductCart->delete();

        if($deleteProductCart) {
        return Redirect::route('cart')->with( ['delete' => 'product deleted from cart successfully'] );
        }
    }

    public function prepareCheckout(Request $request)
    {
        $value = $request->price;

        $price = Session::put('price', $value);

        $newPrice = Session::get($price); 

        if($newPrice > 0) {
        return Redirect::route('checkout');
        }
    }

    public function checkout()
    {
        return view('products.checkout');
    }

    public function storeCheckout(Request $request)
    {
        // Ngăn chặn double submit - kiểm tra xem có order tương tự vừa được tạo không
        $recentOrder = Order::where('user_id', Auth::user()->user_id)
                           ->where('email', $request->email)
                           ->where('price', $request->price)
                           ->where('created_at', '>', now()->subSeconds(10)) // Trong vòng 10 giây
                           ->first();
        
        if ($recentOrder) {
            Log::warning('Duplicate order attempt detected for user ' . Auth::user()->user_id);
            return Redirect::route('products.pay');
        }
        
        // Get all cart items for this user
        $cartItems = Cart::where('user_id', Auth::user()->user_id)->get();
        
        // Check if all products have enough stock
        foreach ($cartItems as $cartItem) {
            $product = Product::where('product_id', $cartItem->product_id)->first();
            if (!$product || $product->quantity < $cartItem->quantity) {
                return Redirect::route('cart')->with(['error' => 'Sản phẩm "' . $cartItem->name . '" không đủ số lượng trong kho']);
            }
        }
        
        // Create order
        $checkout = Order::create($request->all());
        
        Log::info('Created Order #' . $checkout->order_id . ' for user ' . Auth::user()->user_id . ' with price $' . $request->price);
        
        if ($checkout) {
            // Create order items from cart and update product quantities
            foreach ($cartItems as $cartItem) {
                // Create order item
                $orderItem = OrderItem::create([
                    'order_id' => $checkout->order_id,
                    'product_id' => $cartItem->product_id,
                    'product_name' => $cartItem->name,
                    'product_image' => $cartItem->image,
                    'quantity' => $cartItem->quantity,
                    'price' => $cartItem->price,
                    'subtotal' => $cartItem->price * $cartItem->quantity,
                ]);
                
                Log::info('Created OrderItem ID: ' . ($orderItem ? $orderItem->id : 'NULL') . ' for Order #' . $checkout->order_id . ' - Product: ' . $cartItem->name);
                
                // Decrease product quantity in stock
                $product = Product::where('product_id', $cartItem->product_id)->first();
                if ($product) {
                    $product->quantity = $product->quantity - $cartItem->quantity;
                    $product->save();
                    Log::info('Updated product ' . $product->product_id . ' quantity to ' . $product->quantity);
                }
            }
            
            return Redirect::route('products.pay');
        }
    }

    public function payWithPaypal()
    {
        return view('products.pay');
    }

    public function success()
    {
        $deleteItems = Cart::where('user_id', Auth::user()->user_id);
        $deleteItems->delete();
        if($deleteItems) {
            Session::forget('price');
            return view('products.success');
        }
    }

    public function BookTables(Request $request)
    {
    
        Request()->validate([
            'first_name' => 'required|max:40',
            'last_name' => 'required|max:40',
            'date' => 'required',
            'time' => 'required',
            'phone' => 'required|max:40',
            'message' => 'nullable|max:40',
        ]);

        if($request->date > date('n/j/Y'))
        {
            $bookTables = Booking::create($request->all());

            if($bookTables){
                return Redirect::route('home')->with(['booking' => "booking successfully"]);
            }
        }
        else{
            return Redirect::route('home')->with(['date' => "choose a date in a future"]);
        }
    }

    public function menu()
    {
        $desserts = Product::select()->where("type", "dessert")->orderBy('product_id', 'desc')->get();
        $drinks = Product::select()->where("type", "drink")->orderBy('product_id', 'desc')->get();
        $burgers = Product::select()->where("type", "burger")->orderBy('product_id', 'desc')->get();
        $pizzas = Product::select()->where("type", "pizza")->orderBy('product_id', 'desc')->get();
        $coffees = Product::select()->where("type", "coffee")->orderBy('product_id', 'desc')->get();
        $dishes = Product::select()->where("type", "dish")->orderBy('product_id', 'desc')->get();

        
        return view('products.menu', compact('desserts', 'drinks','burgers','pizzas','coffees','dishes'));
        
    }
}