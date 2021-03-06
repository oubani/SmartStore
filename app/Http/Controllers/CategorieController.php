<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategorieController extends Controller
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
        $categories = DB::table('categories')->select('*')->paginate(5);

        return view('categories.categories', ['categories' => $categories]);
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
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        DB::table('categories')->insert(
            ['categorieName' => $request->categorieName]
        );
        return redirect('/categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Categorie $categorie)
    {
        $categorie = Categorie::findOrFail($request->id);
        $categorie->categorieName = $request->title;
        $categorie->save();
        return redirect('/categories')->with('success', 'Categorie Name Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->user()->type == 0) {
            return redirect('/')->with('error', 'you don\'t have the permetion');
        }
        $categorie = Categorie::find($id);
        $categorie->delete();
        return redirect('/categories')->with('success', 'Categorie Removed');
    }
}
