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
        return view('buyer.index');
    }
    public function orders()
    {
        return view('buyer.index');
    }
    public function inquiries()
    {
        return view('buyer.index');
    }
    public function inquiry()
    {
        return view('buyer.index');
    }
    public function messages()
    {
        return view('buyer.index');
    }
    public function accountSettings()
    {
        return view('buyer.index');
    }
}
