<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('products.index',['products' => Product::all()]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'price' => 'required',
            'name' => 'required',
            
            'image' =>'required|image',
            'discription' => 'required'
        ]) ;
        
        $product_image = $request->image;
        $product_image_new_name = time().$product_image->getClientOriginalName();
        $product_image->move('uploads/products',$product_image_new_name);

        $products = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'discription' => $request->discription,
            'image' => 'uploads/products'.$product_image_new_name,

        ]);

        return redirect()->route('products.index');

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
        $product = Product::find($id);

        return view('products/edit',['product' => $product]);
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
        $product = Product::find($id);

        $this->validate($request,[

            'price' => 'required',
            'name' => 'required',
            //'image' =>'required|image',
            'discription' => 'required'
        ]);
        
        if ($request->hasFile('image')) {
            $product_image = $request->image;
            $product_image_new_name=time().$product_image->getClientOriginalName();
            $product_image->move('uploads/products' , $product_image_new_name);
            $product->image = 'uploads/products'.$product_image_new_name;
            $product->save();
        }

        $product->name = $request->name;
        $product->price = $request->price;
        $product->discription = $request->discription;

        $product->save();

        return redirect()->route('products.index')->with('product',$product);
    
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (file_exists($product->image)) {
            unlink($product->image);
        }
        $product->delete();

        return redirect()->route('products.index');
    }
}
