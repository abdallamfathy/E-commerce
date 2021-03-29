<?php

namespace App\Http\Controllers;
use Cart;
use App\Product;
use Illuminate\Http\Request;

class ShoppingController extends Controller
{
    public function add_to_cart( )
    {
        $pdt = Product::find(request()->pdt_id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'price' =>$pdt->price,
            'qty' => request()->qty,

        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart');
    }


    public function cart()
    {//Cart::destroy();
     return view('front/cart') ; 
    }


    public function cart_delete($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }


    public function cart_inc($id,$qty)
    {
        Cart::update($id, $qty + 1);

        return redirect()->back();
    }

    public function cart_dec($id,$qty)
    {
        Cart::update($id, $qty - 1);

        return redirect()->back();
    }


    public function rapid_add( $id)
    {
        $pdt = Product::find($id);

        $cartItem = Cart::add([
            'id' => $pdt->id,
            'name' => $pdt->name,
            'price' =>$pdt->price,
            'qty' => 1,

        ]);

        Cart::associate($cartItem->rowId, 'App\Product');

        return redirect()->route('cart');
    }





}
