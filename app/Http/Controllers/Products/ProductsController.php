<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Product\Cart;
use App\Models\Product\Order;
use Illuminate\Support\Facades\Redirect as FacadesRedirect;
use Ramsey\Uuid\Codec\OrderedTimeCodec;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Product\Booking;
use Carbon\Carbon;

class ProductsController extends Controller
{
    public function singleProduct($id)
    {
        // Logic to retrieve the product by its ID
        $product = Product::find($id);


        $relatedProducts = Product::where('type', $product->type)
                                  ->where('id', '!=', $id)
                                  ->take('4')
                                  ->orderBy('id', 'desc')
                                  ->get();

        //checking for product in cart
        $checkingInCart = Cart::where('pro_id', $id)
                            ->where('user_id', Auth::user()->id)
                            ->count();
        // Return the view with the product data
        return view('products.productsingle', compact('product', 'relatedProducts','checkingInCart'));
    }


    public function addCart(Request $request, $id)
    {
        $addCart = Cart::create([
            'pro_id' => $request->pro_id,
            'name' => $request->name,
            'image' => $request->image,
            'price' => $request->price,
            "user_id" => Auth::user()->id,
        ]);

        return Redirect::route('product.single', $id)->with( ['success' => 'product added to cart successfully'] );
    }

    public function cart()
    {
        $cartProducts = Cart::where('user_id', Auth::user()->id)
                    ->orderBy('id', 'desc')
                    ->get();

        $totalPrice = Cart::where('user_id', Auth::user()->id)
                    ->sum('price');

        return view('products.cart', compact('cartProducts', 'totalPrice'));
    }


    public function deleteProductCart($id)
    {
        $deleteProductCart = Cart::where('pro_id', $id)
                                ->where('user_id', Auth::user()->id);
                                
                                
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
        $checkout = Order::create($request->all());
        if($checkout){
            return Redirect::route('products.pay');
        }
    }

    public function payWithPaypal()
    {
        return view('products.pay');
    }

    public function success()
    {
        $deleteItems = Cart::where('user_id', Auth::user()->id);
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
        $desserts = Product::select()->where("type", "dessert")->orderBy('id', 'desc')->get();
        $drinks = Product::select()->where("type", "drink")->orderBy('id', 'desc')->get();
        $burgers = Product::select()->where("type", "burger")->orderBy('id', 'desc')->get();
        $pizzas = Product::select()->where("type", "pizza")->orderBy('id', 'desc')->get();
        $coffees = Product::select()->where("type", "coffee")->orderBy('id', 'desc')->get();
        $dishes = Product::select()->where("type", "dish")->orderBy('id', 'desc')->get();

        
        return view('products.menu', compact('desserts', 'drinks','burgers','pizzas','coffees','dishes'));
        
    }
}