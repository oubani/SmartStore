<?php
    use Illuminate\Support\Facades\DB;

    function oneProducts($item){

        $price = $item->prix-($item->prix *$item->value/100);
        $promo = '';
        $oldprice='';
        if ($item->value) {
            $promo =  '<span class="remise badge badge-secondary" > '. $item->value .' %</span>';
            $oldprice= '<s>'.$item->prix.' Dh  </s>';
        }
        $product = '
        <div class="col-sm">
            <div class="card shadow rounded mb-2 " style="width: 18rem;">
                <img class="card-img-top" src="/images/'.$item->cover.'" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">'.$item->name.'  </h5>  '.$promo.'
                <p class="card-text"> '.$oldprice.'  <span class="lastPrice" > '.$price .' Dh</span>    </p>
                  <hr>
                  <a href="product/'.$item->idP.' " class="btn btn-primary">See details</a>
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

                    <input type="text" class="form-control" placeholder="{{__('messages.Searchholder')}}" name="search" id="search">
                    <div class="input-group-append">
                    <span class="input-group-text text-primary "><b>{{__('messages.search')}}</b></span>
                    </div>
                </div>
                <div id="output" class="list-group" ></div>
            </div>
        </div>
    </div>
</div>
{{-- order by promotion  --}}
<div class="container mt-3 text-center ">
    <h1 class="text-primary mb-3 ">{{__('messages.orderbyValue')}}</h1>
    <div class="row">
        <?php
        $table = DB::select('select *,products.id as idP from products LEFT JOIN promotions ON products.id = promotions.product_id ORDER By value DESC  limit 3 ');
        ?>
        @foreach ($table as $item)
            <?php  oneProducts($item);  ?>
        @endforeach
    </div>
    <br>
    <a  href="products" class=" btn btn-success">{{__('messages.seeMore')}}</a>
    <br>
</div>

{{-- produits lpus demander  --}}
<div class="container mt-3 text-center ">
    <h1 class="text-primary mb-3 ">The Most Requested Products</h1>
    <div class="row">
        <?php
        $table = DB::select('select *,SUM(quantity) as tataolP ,products.id as idP from details JOIN products on products.id=details.product_id LEFT JOIN promotions ON products.id = promotions.product_id GROUP BY (details.product_id) ORDER By (sum(quantity)) DESC  limit 3 ');
        ?>
        @foreach ($table as $item)
            <?php  oneProducts($item);  ?>
        @endforeach
    </div>
    <br>
    <a  href="products" class=" btn btn-success">{{__('messages.seeMore')}}</a>
    <br>
</div>

{{-- nouveaux produits   --}}
<div class="container mt-3 text-center ">
    <h1 class="text-primary mb-3 ">New Products</h1>
    <div class="row">
        <?php
        $table = DB::select('select *,products.id as idP from products LEFT JOIN promotions ON products.id = promotions.product_id GROUP BY idP DESC  limit 3 ');
        ?>
        @foreach ($table as $item)
            <?php  oneProducts($item);  ?>
        @endforeach
    </div>
    <br>
    <a  href="products" class=" btn btn-success">{{__('messages.seeMore')}}</a>
    <br>
</div>

{{-- About As   --}}
<div class="container mt-3  ">
    <div class="row ">
        <div class="col-md-6">
            <img src="/images/store.jpg" height="500px" alt="store">
        </div>
        <div class="col-md-6 my-auto ">
            <h1 class="text-primary mb-3 ">About Us</h1>
            <p class="ml-2 lead ">
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Facere autem vitae similique magni tempore consequatur quisquam enim natus? Aut iure voluptate aspernatur quod necessitatibus laborum soluta laudantium recusandae nostrum porro?
            </p>
        </div>
    </div>
</div>

{{-- Location As   --}}
<div class="container mt-3  ">
    <div class="row ">
        <div class="col-md-8">
            <iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d3385.613001120381!2d-4.4597339!3d31.9442627!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sma!4v1594294907662!5m2!1sen!2sma" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <div class="col-md-4  ">
            <form method="POST" action="contact" class=" shadow ContactFrom" >
                @csrf
                <h1>Contact Us</h1>
                <div class="form-group">
                  <label for="Name">Name</label>
                  <input type="text" class="form-control" name="name" id="name" required placeholder="Enter your name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email address</label>
                  <input type="email" class="form-control" name="email" id="exampleInputEmail1" required aria-describedby="emailHelp" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">message</label>
                    <textarea  class="form-control" name="message" id="exampleFormControlTextarea1" required rows="3"></textarea>
                  </div>
                <button type="submit" class="btn btn-primary btn-block ">Send <i class=" ml-2 fa fa-paper-plane"></i> </button>
              </form>
        </div>
    </div>
</div>




{{--  Ajax start here --}}
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
