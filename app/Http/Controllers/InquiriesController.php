<?php

namespace App\Http\Controllers;

use App\Inquiry;
use Illuminate\Http\Request;

class InquiriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getLeads()
    {
        
    }
    public function getInquiries()
    {
        // $inquiries = Inquiry::where('from_id', '=', auth()->id() )->with('from')->paginate(10);
        $inquiries = Inquiry::where('from_id', '=', auth()->id() )->with('to')->paginate(10);
        return response()->json([
            'inquiries' => $inquiries,
            'message' => 'Inquiries have been fetched'
        ], 200);
    }
    public function getInquiryById($id)
    {   
        $inquiry = Inquiry::where('id', '=', $id)->with('to')->first();
        return response()->json([
            'inquiry' => $inquiry,
            'message' => 'Inguiry has been fetched'
        ], 200);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
