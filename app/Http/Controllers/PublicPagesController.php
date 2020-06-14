<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class PublicPagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact-us');
    }

    public function products()
    {
        $products = Product::paginate(10);
        return view('products', compact('products'));
    }

    public function product($slug)
    {
        $product = Product::where('slug', '=', $slug)->firstOrFail();
        return view('single-product', compact('product'));
    }
}
