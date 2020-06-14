<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function dashboard()
    {
        return view('buyer.dashboard');
    }
    public function orders()
    {
        return view('buyer.dashboard');
    }
    public function inquiries()
    {
        return view('buyer.dashboard');
    }
    public function messages()
    {
        return view('buyer.dashboard');
    }
    public function accountSettings()
    {
        return view('buyer.dashboard');
    }
}
