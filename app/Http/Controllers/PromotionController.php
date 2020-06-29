<?php

namespace App\Http\Controllers;

use App\Promotion;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
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
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $promotion = new Promotion;
        $promotion->product_id = $request->idP;
        $promotion->value = $request->value;
        $promotion->date_start = $request->dateStart;
        $promotion->date_expires = $request->dateEnd;
        $promotion->save();
        return redirect('/allProducts')->with('success', 'Promotion added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        //
        $promotion = Promotion::findOrFail($id);
        $promotion->value = $request->value;
        $promotion->date_start = $request->dateStart;
        $promotion->date_expires = $request->dateEnd;
        $promotion->save();
        return redirect('/allProducts')->with('success', 'Promotion Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}
