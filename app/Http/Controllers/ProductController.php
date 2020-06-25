<?php

namespace App\Http\Controllers;

use App\Product;
use App\Promotion;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    /*
        * this function is is retrun products by categorie
    */

    public function categored($id = 1)
    {
        $cat = $id;
        $products = DB::table('products')
            ->leftJoin('promotions', 'products.id', '=', 'promotions.product_id')
            ->where('categorie_id', '=', $cat)
            ->select('products.*', 'promotions.value')
            ->paginate(6);
        // return $products;

        return view('products.products', ['products' => $products, 'categorie_id' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.addproducts');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'prix' => 'required|numeric',
            'categorie_id' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $imagename = time() . '.' . $request['cover']->extension();
        $product =  Product::create([
            'name' => $request['name'],
            'description' => $request['description'],
            'prix' => $request['prix'],
            'cover' => $imagename,
            'categorie_id' => $request['categorie_id'],
            'stock' => $request['stock'],
        ]);
        $request['cover']->move(public_path('images'), $imagename);

        foreach ($request->file('images') as $image) {

            $name = time() . '.' . $image->getClientOriginalName();
            $image->move(public_path('images'), $name);
            Image::create([
                'imagename' => $name,
                'product_id' => $product['id']
            ]);
        }

        if ($request['value'] !== null) {
            $promotion = Promotion::create([
                'product_id' => $product['id'],
                'value' => $request['value'],
                'date_start' => $request['date_start'],
                'date_expires' => $request['date_end'],
            ]);
        }
        return  view('products.addproducts');
    }


    /**
     *
     * Search for products  Live search
     */

    public function search(Request $request)
    {
        $output = "";
        $products = DB::select("SELECT * FROM products
        WHERE name LIKE '%{$request->search}%' limit 4 ");
        if ($products) {
            foreach ($products as $key => $product) {
                $output .=
                    '<a href ="product/' . $product->id . '"  class="list-group-item " >' . $product->name . '</a>';
            }
            return ($output);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('products')
            ->leftJoin('promotions', 'products.id', 'promotions.product_id')
            ->select('products.*', 'promotions.value')
            ->where('products.id', '=', $id)
            ->get();
        $images  = DB::table('images')
            ->select('images.imagename')
            ->where('images.product_id', '=', $id)
            ->get();
        return view('products.product', ['prod' => $product, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     *
     */
    public function productDetails($id)
    {
        $product = DB::table('products')
            ->leftJoin('promotions', 'products.id', 'promotions.product_id')
            ->select('products.id as pid', 'promotions.*', 'promotions.id as idPromotion', 'products.*')
            ->where('products.id', '=', $id)
            ->get();
        $images  = DB::table('images')
            ->select('images.imagename')
            ->where('images.product_id', '=', $id)
            ->get();
        return view('products.productDetails', ['product' => $product, 'images' => $images]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $images = DB::table('images')
            ->where('images.product_id', '=', $id)
            ->get();
        return view('products.editProduct', ['product' => $product, 'images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // get old  product
        $product = Product::findOrFail($request->id);
        $product->name = $request->name;
        $product->prix = $request->prix;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->categorie_id = $request->categorie_id;
        $product->save();
        return redirect('/allProducts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function allProducts()
    {
        $products = DB::table('products')
            ->join('categories', 'products.categorie_id', '=', 'categories.id')
            ->leftJoin('promotions', 'products.id', '=', 'promotions.product_id')
            ->select('products.*', 'categories.categorieName', 'promotions.value')
            ->paginate(5);
        // return $products;
        return view('products.allProducts', ['products' => $products]);
    }
}
