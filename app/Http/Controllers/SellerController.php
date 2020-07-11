<?php

namespace App\Http\Controllers;

use App\Inquiry;
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
    public function create()
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
    public function inquiry()
    {   
        return view('seller.index');
    }
    public function readInquiry($id)
    {
        $inquiry = Inquiry::where('id', '=', $id)->first();
        $inquiry->update(
            ['read' => 1]
        );
        return response()->json([
            'inquiry' => $inquiry,
            'message' => 'Inguiry has been read'
        ], 200);
    }
    public function getInquiry($id)
    {   
        $inquiry = Inquiry::where('id', '=', $id)->with('from')->first();
        return response()->json([
            'inquiry' => $inquiry,
            'message' => 'Inguiry has been fetched'
        ], 200);
    }
    public function getInquiries()
    {   
        $inquiries = Inquiry::where('to_id', '=', auth()->id() )->with('from')->paginate(10);
        return response()->json([
            'inquiries' => $inquiries,
            'message' => 'Inquiries have been fetched'
        ], 200);
    }
    public function messages()
    {   
        return view('seller.index');
    }
}