<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ApiProductController extends Controller
{
    // index function
    public function index()
    {
        $products = Product::all();
        return $products;
    }
    public function categoried($id)
    {
        $cat = 1;
        $cat = $id;
        $products = DB::table('products')
            ->where('categorie_id', '=', $cat)
            ->get();
        return $products;
    }
}
