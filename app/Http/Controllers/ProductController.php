<?php

namespace App\Http\Controllers;

use App\Models\Product1;  // this is the name of table
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //  this function get all data in database and show in index.blade.php
    public function index()
    {
        $products = Product1::latest()->paginate(5);
    
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()  // bu this function we can show the template to name create
    {
        return view('products.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     // by this function we can make and add new data or store in database
    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'detail' => 'required',
    //     ]);
    
    //     Product1::create($request->all());
     
    //     return redirect()->route('products.index')
    //                     ->with('success','Product created successfully.');
    // }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

     // by this function we can show one data in the template to name show by user chosen
    public function show(Product1 $product)
    {
        return view('products.show',compact('product'));
    } 
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

     // by this function we can show that data choose by user and show in the template to name edit
    public function edit(Product1 $product)
    {
        return view('products.edit',compact('product'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

     // this function edit data
    public function update(Request $request, Product1 $product)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        $product->update($request->all());
    
        return redirect()->route('products.index')
                        ->with('success','Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */

     // this function remove or delete data that choose by user
    public function destroy(Product1 $product)
    {
        $product->delete();
    
        return redirect()->route('products.index')
                        ->with('success','Product deleted successfully');
    }

    public function test(Request $request){
        $method = $request->method();
        if ($request->isMethod('post')){
            
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
    
        Product1::create($request->all());
     
        return redirect()->route('products.index')
                        ->with('success','Product created successfully.');
    
        }

        if ($request->isMethod('get')){
            
        $products = Product1::latest()->paginate(5);
    
        return view('products.index',compact('products'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
        }


    }

    // this worked Good
    // thanks and dont forget to subscribe

}
