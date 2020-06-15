<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {   
        return view('seller.index');
    }
    public function products()
    {   
        return view('seller.index');
    }
    public function orders()
    {   
        return view('seller.index');
    }
    public function inquiries()
    {   
        return view('seller.index');
    }
    public function messages()
    {   
        return view('seller.index');
    }
}