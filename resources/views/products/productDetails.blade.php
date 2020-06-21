@extends('layouts.app')
@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
    <center> <p class="lead" > {{$product[0]->name}} </p></center>
</div>
<div class="container">
<div class="row">
    <div class="col-md-5">
        @php
            $i=0
        @endphp
        <div id="carouselExampleControls" class="carousel slide shadow " data-ride="carousel">
            <div class="carousel-inner">
                @foreach ($images as $image)
                @if ($i==0)
                <div class="carousel-item active">
                  <img class="d-block w-100" src="/images/{{$image->imagename}}" alt="First slide">
                </div>
                @else
                <div class="carousel-item ">
                  <img class="d-block w-100" src="/images/{{$image->imagename}}" alt="First slide">
                </div>
                @endif
                @php
                    $i++;
                @endphp
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon bg-dark " aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
              <span class="carousel-control-next-icon bg-dark " aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>

    <div class="col-md-5">
        <h1> {{$product[0]->name}} </h1>
        <p class="my-2" > description : <b> {{$product[0]->description}}</b> </p>
        <p class="my-2" > prix : <b> {{$product[0]->prix}} DH </b> </p>
        <p class="my-2" > Promotion : <b> {{($product[0]->value!=null)? $product[0]->value .' %' : ('No promotion for this product ') }}  </b> </p>
        <p class="my-2 d-flex justify-content-between " >
            <span>  {{$product[0]->value!=null? 'Promotion started at:'. date_format(date_create($product[0]->date_start),'Y/m/d'):' '}} </span>
            <span>  {{$product[0]->value!=null? 'Promotion expired at:'. date_format(date_create($product[0]->date_expires),'Y/m/d'):' '}} </span>
        </p>
        <a href="/gproduct/{{$product[0]->id}}/edit" class="btn btn-primary btn-block">Edit</a>
        <div class="btn btn-warning btn-block">{{$product[0]->value!=null? 'Update Promotion': 'Set Promotion'}}</div>
    </div>

    </div>
</div>
<script>
    $('.carousel').carousel({
  interval: 1000
})
</script>
@endsection
