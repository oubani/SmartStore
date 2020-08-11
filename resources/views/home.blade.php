@extends('layouts.app')

@section('content')
<style>
    a:hover {
        text-decoration-line: none
    }
    .card-item {
        flex-direction: row;
        justify-content:space-around
        ;align-items:center;
    }
</style>

<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
  <center> <p class="lead" > {{ __('messages.bienvenue')  }}   {{$userId = auth()->user()->name}}</p></center>
</div>
<div class="container" style="min-height: 38vh" >
    <div class="row">

        <div class="col-sm-6 col-md-4 mb-3  "  >
            <a href="/products" class="link_cards card bg-info text-dark mb-1 py-4 card-item" > {{__('messages.startShopping')}} <i class="fas fa-shopping-cart" style="font-size: 4.2rem" ></i> </a>
        </div>
        <div class="col-sm-6 col-md-4 mb-3 ">
            <a href="/myorders" class="link_cards card  bg-info text-dark mb-1 py-4 card-item "> {{__('messages.myOrders')}} <i class="fas fa-bars" style="font-size: 4.2rem"></i> </a>
        </div>
        <div class="col-sm-6 col-md-4 mb-3">
            <a href="/profile" class="link_cards card py-4 bg-info text-dark mb-1 py-4 card-item"> {{__('messages.myProfile')}} <i class="fas fa-user" style="font-size: 4.2rem"></i></a>
        </div>
    @if (auth()->user()->type!=0)

    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/addproduct" class="link_cards card  bg-info text-dark mb-1 py-4 card-item"> {{__('messages.addProduct')}} <i class="fas fa-plus" style="font-size: 4.2rem"></i></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/clientliste" class="link_cards card  bg-info text-dark mb-1 py-4 card-item"> {{__('messages.clientList')}} <i class="fas fa-users" style="font-size: 4.2rem"></i></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/orders" class="link_cards card  bg-info text-dark mb-1 py-4 card-item"> {{__('messages.editOrders')}} <i class="fas fa-edit" style="font-size: 4.2rem"></i></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/allProducts" class="link_cards card  bg-info text-dark mb-1 py-4 card-item"> {{__('messages.allProducts')}} <i class="fas fa-list" style="font-size: 4.2rem"></i></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/contact" class="link_cards card  bg-info text-dark mb-1 py-4 card-item"> Contact Us <i class="fas fa-envelope" style="font-size: 4.2rem"></i></a>
    </div>
    <div class="col-sm-6 col-md-4 mb-3">
        <a href="/categories" class="link_cards card  bg-info text-dark mb-1 py-4 card-item"> {{__('messages.categories')}} <i class="fas fa-ellipsis-h" style="font-size: 4.2rem"></i></a>
    </div>
    @endif

    </div>
</div>
@endsection
