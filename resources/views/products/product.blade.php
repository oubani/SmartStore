@extends('layouts.app')
<title>{{$prod[0]->name }}</title>
@section('content')
    <div class="container mt-5 ">
    <div class="row">
        <style>
            .son{
                width: 170px;
                margin:10px 15px 0px 0px;
                padding-left:15px;
            }
            .son:last-child{
                margin: 10px auto;
            }
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
            <div class="col-sm-6  ">
        @if (count($images)>0)
            @php
                $t=0;
            @endphp
            @foreach ($images as $img)
                @if ($t==0)
                <img src="/images/{{$img->imagename}}" width="100%"    class=" col-sm-12 rounded lady card float-left img" >
                @php
                    $t++;
                @endphp
                @else
                <img src="/images/{{$img->imagename}}" width="100%"   class="rounded son card float-left img" >
                @endif
            @endforeach
        </div>
        <div class="col-sm-6">

        @foreach ($prod as $item)
            <h1  >{{$item->name}}</h1>
            <p class="mt-1" > {{$item->description}}</p>
            <p class="mt-3" >prix : <span class="discounted" > {{$item->prix -  ($item->prix * $item->value/100)}} Dh </span> <span class="oldprice" >{{$item->prix}} DH </span>  </p>
            <form action="{{url('add')}} " method="POST">
                <input type="hidden" name="_token"   value="{{csrf_token()}}">
                <div class="form-group mt-4 ">
                    <label for="quantite">choisir quantite : </label>
                    <input type="number" required name="quantity" class="form-control"  placeholder="Quantite">
                    <input type="hidden" name='id' value="{{$item->id}}">
                    <input type="hidden" name='name' value="{{$item->name}}">
                    <input type="hidden" name='price' value=" {{$item->prix -  ($item->prix * $item->value/100)}}  ">
                  </div>
                  <button  type="submit" class="btn btn-primary  btn-lg btn-block"> Ajouter au panier  </button>
            </form>
        @endforeach
        </div>
        @endif
    </div>
</div>
@endsection
