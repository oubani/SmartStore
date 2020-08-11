<?php

namespace App\Http\Controllers;

use App\Order;
use App\Detail;
use App\User;
use Illuminate\Http\Request;
use App\Product;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        return view('orders.myorders', ['myorders' => $user->orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function allorders()
    {
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $orders = DB::table('orders')->paginate(5);
        return view('orders.allorder', ['orders' => $orders]);
    }


    public function notdelivred()
    {
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $orders = DB::table('orders')
            ->where('type', '=', 0)
            ->paginate(5);
        return view('orders.notdelivred', ['orders' => $orders]);
    }

    public function details($id)
    {
        $order = Order::findorFail($id);
        $order = $order->details;
        $data = [];
        foreach ($order as $detail) {
            $product = Product::find($detail->product_id);
            $data[] = ['name' => $product['name'], 'quantity' => $detail->quantity, 'price' => $detail->price, 'cover' => $product['cover']];
        }
        return view('orders.detailadmin', ['details' => $data, 'order_number' => $id]);
    }

    public function delivred()
    {
        $orders = DB::table('orders')
            ->where('type', '=', 1)
            ->paginate(5);
        return view('orders.delivred', ['orders' => $orders]);
    }

    public function valid()
    {
        return view('orders.validate');
    }

    public function valideOrder($id)
    {
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $order = Order::findorFail($id);
        $order->type = 1;
        $order->save();
        return  redirect('/orders');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return Cart::subtotal();
        $request->validate([
            'address' => 'required'
        ]);

        $order = Order::create([
            'user_id' => Auth()->user()->id,
            'type' => 0,
            'address' => $request->address,
            'total' => Cart::subtotal()
        ]);

        foreach (Cart::content() as $item) {
            Detail::create([
                'order_id' => $order->id,
                'product_id' => $item->id,
                'quantity' => $item->qty,
                'price' => $item->price,
            ]);
        }
        Cart::destroy();
        return redirect('/home')->with('success', 'Your order accepeted we will delevred it to you soon as we can ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $order =  Order::findorFail($order);
        $order->type = 1;
        return view('orders.allorder');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}
