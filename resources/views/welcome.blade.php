<?php
    use Illuminate\Support\Facades\DB;

    function oneProducts($item){

        $price = $item->prix-($item->prix *$item->value/100);
        $product = '
        <div class="col-sm">
            <div class="card shadow rounded mb-2 " style="width: 18rem;">
                <img class="card-img-top" src="/images/'.$item->cover.'" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'.$item->name.'  </h5>  <span class="remise badge badge-secondary" > '. $item->value .' %</span>
                <p class="card-text"> <s>'.$item->prix.' Dh  </s>  <span class="lastPrice" > '.$price .' Dh</span>    </p>
                  <hr>
                  <a href="product/'.$item->idP.' " class="btn btn-primary">Ajouter au panier</a>
                </div>
              </div>
        </div>
        ';
        echo $product;
    }
?>
@extends('layouts.app')
@section('content')

<style>
*{
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}
.hh{
    height: 70vh;
}
.search{
    display: flex;
    flex-direction: column;
    text-align: center;
    justify-content: center;
    align-items: center;
    width: 100%;
    padding: 30vh 2rem;
}
.form-search{
    width: 80%;
    margin: auto;
}
.form-control{
    height: 50px;
    border: none;
    border-radius: none;
    width: 50%;
}
.input-group-text{
    width: 100%;
    border: none;
    background: #FFFFFF;
}
</style>

<div class="hh bg-dark ">
    <div class="search ">
        <div class="container">
            <div class="form-search" >
                <div class="input-group mb-3">

                    <input type="text" class="form-control" placeholder="Search for a product by name " name="search" id="search">
                    <div class="input-group-append">
                    <span class="input-group-text text-primary "><b>Search</b></span>
                    </div>
                </div>
                <div id="output" class="list-group" ></div>
            </div>
        </div>
    </div>
</div>
<div class="container mt-3 text-center ">
    <h1 class="text-primary mb-3 ">Produits Plus Demmander</h1>
    <div class="row">
        <?php

        $table = DB::select('select *,products.id as idP from products LEFT JOIN promotions ON products.id = promotions.product_id ORDER By value DESC  limit 3 ');

        ?>
        @foreach ($table as $item)
            <?php  oneProducts($item);  ?>
        @endforeach
    </div>
    <br>
    <a  href="products" class=" btn btn-success">More priducts +</a>
    <br>
    <hr>

</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" ></script>


<script type="text/javascript">

$('#search').on('keyup',function(){
    var  value=$(this).val();
    console.log(value)
$.ajax({
type : 'get',
url : '{{URL::to('search')}}',
data:{'search':value},
success:function(data){
    console.log(data);
$('#output').html(data);
}
});
})


</script>
<script type="text/javascript">
    $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });
    </script>
@endsection
