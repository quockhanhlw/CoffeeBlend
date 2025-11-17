<?php

namespace App\Http\Controllers;

use App\Models\Product\Product;
use App\Models\Product\Review;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::select()->orderBy('product_id', 'desc')->take(4)->get();
        $reviews = Review::select()->orderBy('review_id', 'desc')->take(4)->get();

        return view('home', compact('products', 'reviews'));
    }

    public function services()
    {
        return view('pages.services');
    }

    public function about()
    {
        $reviews = Review::select()->orderBy('review_id', 'desc')->take(5)->get();

        return view('pages.about', compact('reviews'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
