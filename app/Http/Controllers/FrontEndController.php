<?php

namespace App\Http\Controllers;
use App\Product;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
      return view('/front/index' , ['products'=>Product::paginate(3)  ]);  # code...
    }




    public function singleProduct( $id )
    {
      return view('/front/single', ['product' => Product::find($id)]);
    }



}
