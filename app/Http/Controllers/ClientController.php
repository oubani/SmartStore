<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $clients = DB::table('users')->paginate(5);
        return  view('clients.clients', ['clients' => $clients, 'page' => 'Clients Liste']);
    }


    public function admins()
    {
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $clientss =
            DB::table('users')
            ->select('*')
            ->where('type', '=', 1)
            ->paginate(5);
        return  view('clients.clients', ['clients' => $clientss, 'page' => 'admins']);
    }

    public function clients()
    {
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $clients = DB::table('users')->where('users.type', '=', 0)->paginate(5);
        return  view('clients.clients', ['clients' => $clients, 'page' => 'clients']);
    }


    public function upgrade($id)
    {
        if (auth()->user()->type == 0 || auth()->user()->type == 1) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $client = User::findorFail($id);
        $client->type = 1;
        $client->save();
        return redirect('/clientliste');
    }



    public function degrade($id)
    {
        if (auth()->user()->type == 0 || auth()->user()->type == 1) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $client = User::findorFail($id);
        $client->type = 0;
        $client->save();
        return redirect('/clientliste');
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
}
