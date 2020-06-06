@extends('layouts.app')

@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
  <center> <p class="lead" >Welcome {{$userId = auth()->user()->name}}</p></center>
</div>
<div class="container">
    <div class="row">

    @if (auth()->user()->type==0)
    <div class="col-sm-6 col-md-4 mb-3 ">
        <a href="/products" class="link_cards card pl-5 p-5 bg-secondary text-light mb-1 "> Start Shopping <span class="" ></span></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3 ">
        <a href="/myorders" class="link_cards card pl-5 p-5 bg-success text-white mb-1"> Mes Commandes <span class="" ></span></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/profile" class="link_cards card pl-5 p-5 bg-warning text-dark mb-1"> Mon Profile <span class="" ></span></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/favotite" class="link_cards card pl-5 p-5 bg-warning text-dark mb-1"> Favorites <span class="" ></span></a>
    </div>
    @endif

    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/addproduct" class="link_cards card pl-5 p-5 bg-danger text-dark mb-1"> Add product <span class="" ></span></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/clientliste" class="link_cards card pl-5 p-5 bg-secondary text-dark mb-1"> clients liste <span class="" ></span></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/orders" class="link_cards card pl-5 p-5 bg-info text-dark mb-1"> edit orders <span class="" ></span></a>
    </div>

    </div>
</div>
@endsection
