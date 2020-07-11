<?php

namespace App\Http\Controllers;

use App\Inquiry;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::paginate(10);
        return response()->json([
            'products' => $products,
            'message' => 'Products have been fetched'
        ], 200);
    }
    public function getProduct($id)
    {
        $product = Product::find($id);
        return response()->json([
            'product' => $product,
            'message' => 'Product have been fetched'
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
     
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->middleware('auth');

        // format and add the slug and user id
        $slug = Str::slug($request->title);
        $request->request->set('slug', $slug);
        $request->request->set('user_id', auth()->id());

        $product = Product::create($this->validateRequest());
        return response()->json([
            'product' => $product,
            'message' => 'Product has been published',
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
        $this->middleware('auth');

        // format the slug
        $slug = Str::slug($request->title);
        $request->request->set('slug', $slug);
        $product = Product::where('id', '=', $id)->first();
        if($request->slug == $product->slug){
            $product->update($this->validateRequestWithoutSlug());
            return response()->json([
                'product' => $product,
                'message' => 'Product has been updated'
            ], 200);
        }else{
            $product->update($this->validateRequest());
            return response()->json([
                'product' => $product,
                'message' => 'Product has been updated'
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }



    /**
     * Inquire Product
     */
    public function inquire(Request $request)
    {
        $this->middleware('auth');
        $request->request->set('from_id', auth()->id());
        $inquiry = Inquiry::create($this->validateInquiry());
        return response()->json([
            'inquiry' => $inquiry,
            'message' => 'Your inquiry has been sent'
        ], 200);
    }


    /**
     * Form Validations
     */
    public function validateInquiry()
    {
        return request()->validate([
            'from_id' => ['required'],
            'to_id' => ['required'],
            'content' => ['required', 'min:20', 'max:2000'],
            'product_details' => ['required']
        ]);
    }
    
    public function validateRequest()
    {
        return request()->validate([
            'title' => ['required', 'min:1', 'max:50', 'string'],
            'slug' => ['min:1', 'max:50', 'string', 'alpha_dash', 'unique:products'],
            'status' => [''],
            'description' => [''],
            'author' => [''],
            'featured_image' => ['']
        ]);

    }
    public function validateRequestWithoutSlug()
    {
        return request()->validate([
            'title' => ['required', 'min:1', 'max:50', 'string'],
            'slug' => [''],
            'status' => [''],
            'description' => [''],
            'author' => [''],
            'featured_image' => ['']
        ]);

    }
}
