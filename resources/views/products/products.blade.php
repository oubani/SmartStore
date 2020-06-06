<?php
    use Illuminate\Support\Facades\DB;

    function oneProducts($item){

        $price = $item->prix-($item->prix *$item->value/100);
        $product = '
        <div class="col-md-4">
            <div class="card shadow rounded mb-2 " style="width: 17rem;">
                <img class="card-img-top" height="269px" width=100% src="/images/'.$item->cover.'" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'.$item->name.'  </h5>  <span class="remise badge badge-secondary" > '. $item->value .' %</span>
                <p class="card-text"><s>'.$item->prix.' Dh  </s>  <span class="lastPrice" > '.$price .' Dh</span>    </p>
                  <hr>
                  <a href="/product/'.$item->id.' " class="btn btn-primary">Ajouter au panier</a>
                </div>
              </div>
        </div>
        ';
        echo $product;
    }
?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-2">
                <ul class="list-group" >
                <?php
                    $categorie= DB::select('select * from categories ');
                    foreach ($categorie as $key ) {
                        if($key->id == $categorie_id )   echo '<a href="/products/'.$key->id.' " class= "list-group-item mt-2 active ">'.$key->categorieName.'</a>';
                        else    echo '<a href="/products/'.$key->id.' " class= "list-group-item mt-2 ">'.$key->categorieName.'</a>';
                    }
                ?>
                </ul>
            </div>
            <div class="col-md-9 mt-2">
                <div class="row ">
                    @foreach ($products as $item)
                        {{oneProducts($item)}}
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
