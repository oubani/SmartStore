<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;

class CartController extends Controller
{
    // test

    public function add(Request $request)
    {
        Cart::add($request->id, $request->name,  $request->quantity,  $request->price);

        return view('products.cart');
    }

    public function cart()
    {
        // return Cart::contentc();
        return view('products.cart');
    }

    public function  updatecart(Request $request)
    {
        // return $request;
        $i = 0;
        foreach (Cart::content() as $item) {
            Cart::update($item->rowId, $request->quantity[$i]);
            $i++;
        }
        return redirect('/cart');
    }
    public function delete($id)
    {
        Cart::remove($id);
        return redirect('/cart');
    }

    public function destroy()
    {
        Cart::destroy();
        return redirect('/cart');
    }
}
