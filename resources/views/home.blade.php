@extends('layouts.app')

@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
  <center> <p class="lead" > {{ __('messages.bienvenue')  }}   {{$userId = auth()->user()->name}}</p></center>
</div>
<div class="container">
    <div class="row">

        <div class="col-sm-6 col-md-4 mb-3 ">
            <a href="/products" class="link_cards card pl-5 p-5 bg-secondary text-light mb-1 "> {{__('messages.startShopping')}} </a>
        </div>
        <div class="col-sm-6 col-md-4 mb-3 ">
            <a href="/myorders" class="link_cards card pl-5 p-5 bg-success text-white mb-1"> {{__('messages.myOrders')}} </a>
        </div>
        <div class="col-sm-6 col-md-4 mb-3">
            <a href="/profile" class="link_cards card pl-5 p-5 bg-warning text-dark mb-1"> {{__('messages.myProfile')}} </a>
        </div>
    @if (auth()->user()->type!=0)

    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/addproduct" class="link_cards card pl-5 p-5 bg-danger text-dark mb-1"> {{__('messages.addProduct')}} </a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/clientliste" class="link_cards card pl-5 p-5 bg-secondary text-dark mb-1"> {{__('messages.clientList')}} </a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/orders" class="link_cards card pl-5 p-5 bg-info text-dark mb-1"> {{__('messages.editOrders')}} </a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/allProducts" class="link_cards card pl-5 p-5 bg-info text-dark mb-1"> {{__('messages.allProducts')}} </a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/contact" class="link_cards card pl-5 p-5 bg-danger text-dark mb-1"> Contact Us </a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/categories" class="link_cards card pl-5 p-5 bg-info text-dark mb-1"> {{__('messages.categories')}} </a>
    </div>
    @endif

    </div>
</div>
@endsection
