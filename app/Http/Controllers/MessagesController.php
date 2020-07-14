<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # code...
    }

    public function readMessage($id)
    {
        $msg = Message::where('id', '=', $id)->first();
        $msg->update(
            ['read' => 1]
        );
        return response()->json([
            'msg' => $msg,
            'message' => 'Message has been read'
        ], 200);
    }
    public function getMessages()
    {
        $messages = Message::paginate(10);
        return response()->json([
            'messages' => $messages,
            'message' => 'Messages have been fetched'
        ], 200);
    }
    public function getMessage($id)
    {   
        $msg = Message::where('id', '=', $id)->first();
        return response()->json([
            'msg' => $msg,
            'message' => 'Message has been fetched'
        ], 200);
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
        $msg = Message::create($this->validateRequest());
        return response()->json([
            'message' => 'Your inquiry has been sent.',
        ], 200);
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

    public function validateRequest()
    {
        return request()->validate([
            'full_name' => ['required', 'max:150', 'string'],
            'email' => ['required', 'email', 'string'],
            'phone' => ['required', 'string'],
            'subject' => ['required', 'string', 'max:150'],
            'message' => ['required', 'max:2000'],
        ]);

    }
}
