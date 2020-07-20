<?php

namespace App\Http\Controllers;

use App\ConatctUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConatctUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactUs = ConatctUs::all();
        return view('ContactUs.contactUS', ['contacts' => $contactUs]);
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

        DB::table('conatct_us')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'type' => 0,
        ]);

        // DB::table('conatct_us')->create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'message' => $request->message,
        //     'type' => 0,
        // ]);
        return redirect('/')->with('success', 'thank you for your message we will reply soon to you');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ConatctUs  $conatctUs
     * @return \Illuminate\Http\Response
     */
    public function show(ConatctUs $conatctUs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ConatctUs  $conatctUs
     * @return \Illuminate\Http\Response
     */
    public function edit(ConatctUs $conatctUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ConatctUs  $conatctUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConatctUs $conatctUs)
    {
        return $request;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ConatctUs  $conatctUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConatctUs $conatctUs)
    {
        //
    }
}
