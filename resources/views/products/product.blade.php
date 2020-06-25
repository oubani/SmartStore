@extends('layouts.app')
<title>{{$prod[0]->name }}</title>
@section('content')
    <div class="container mt-5 ">
    <div class="row">
        <style>
            .discounted{
                font-size: 18px;
                font-weight: bold;
                color: green;
                margin-right: 50px;
            }
            .oldprice{
                color: red;
                text-decoration: line-through;
            }
            .lady{
                height: 400px;
            }
        </style>
           {{-- Images Slide Start here --}}
           <div class="col-md-5">
            <div id="carouselExampleControls" class="carousel slide shadow " data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                      <img class="d-block w-100" src="/images/{{$prod[0]->cover}}" alt="First slide">
                    </div>
                    @foreach ($images as $image)
                    <div class="carousel-item ">
                      <img class="d-block w-100" src="/images/{{$image->imagename}}" alt="First slide">
                    </div>
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
              <div class="col-sm-12 pt-2 d-flex justify-content-between ">
                    @foreach ($images as $img)
                        <img src="/images/{{$img->imagename}}" width="22%"  class="rounded card float-left img" >
                    @endforeach
                </div>
        </div>

           {{-- Product details start here --}}
        <div class="col-sm-6">
        @foreach ($prod as $item)
            <h1  >{{$item->name}}</h1>
            <p class="mt-1" > {{$item->description}}</p>
            <p class="mt-3" >{{__('messages.price')}} : <span class="discounted" > {{ $item->prix -  ($item->prix * $item->value/100)}} Dh </span>  @php
                if($item->value!==null){
                    echo "<span class='oldprice' >".$item->prix." DH </span>";
                }
            @endphp  </p>
            <form action="{{url('add')}} " method="POST">
                <input type="hidden" name="_token"   value="{{csrf_token()}}">
                <div class="form-group mt-4 ">
                    <label for="quantite">{{__('messages.quantity')}}  : </label>
                    <input type="number" required name="quantity" class="form-control"  placeholder="Quantite">
                    <input type="hidden" name='id' value="{{$item->id}}">
                    <input type="hidden" name='name' value="{{$item->name}}">
                    <input type="hidden" name='price' value=" {{$item->prix -  ($item->prix * $item->value/100)}}  ">
                  </div>
                  <button  type="submit" class="btn btn-primary  btn-lg btn-block"> {{__('messages.addToCart')}}  </button>
            </form>
        @endforeach
        </div>
    </div>
</div>
@endsection
