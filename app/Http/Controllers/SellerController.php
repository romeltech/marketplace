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
    public function leads()
    {   
        return view('seller.index');
    }
    public function lead()
    {   
        return view('seller.index');
    }
    public function readLead($id)
    {
        $lead = Inquiry::where('id', '=', $id)->first();
        $lead->update(
            ['read' => 1]
        );
        return response()->json([
            'lead' => $lead,
            'message' => 'Lead has been read'
        ], 200);
    }
    public function getLead($id)
    {   
        $lead = Inquiry::where('id', '=', $id)->with('from')->first();
        return response()->json([
            'lead' => $lead,
            'message' => 'Lead has been fetched'
        ], 200);
    }
    public function getLeads()
    {   
        $leads = Inquiry::where('to_id', '=', auth()->id() )->with('from')->paginate(10);
        return response()->json([
            'leads' => $leads,
            'message' => 'Leads have been fetched'
        ], 200);
    }
    public function messages()
    {   
        return view('seller.index');
    }
}