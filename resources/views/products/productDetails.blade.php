
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
        <p class="my-2" > {{__('messages.description')}} : <b> {{$product[0]->description}}</b> </p>
        <p class="my-2" > {{__('messages.price')}} : <b> {{$product[0]->prix}} DH </b> </p>
        <p class="my-2" > {{__('messages.promotion')}} : <b> {{($product[0]->value!=null)? $product[0]->value .' %' : ('No promotion for this product ') }}  </b> </p>
        <p class="my-2 d-flex justify-content-between " >
            <span>  {{$product[0]->value!=null? 'Promotion started at:'. date_format(date_create($product[0]->date_start),'Y/m/d'):' '}} </span>
            <span>  {{$product[0]->value!=null? 'Promotion expired at:'. date_format(date_create($product[0]->date_expires),'Y/m/d'):' '}} </span>
        </p>
        <a href="/gproduct/{{$product[0]->pid}}/edit" class="btn btn-primary btn-block">{{__('messages.edit')}}</a>
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-warning btn-block" data-toggle="modal" onclick="myFunction('{{$product[0]->pid}}','{{$product[0]->value}}','{{$product[0]->date_start}}','{{$product[0]->date_expires}} ')"  data-target="#exampleModal">
            {{$product[0]->value!=null? 'Update Promotion': 'Set Promotion'}}
        </button>
    </div>

  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">{{$product[0]->value!=null? 'Update Promotion': 'Set Promotion'}}</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
                @if ($product[0]->value!=null)
                {{ Form::open(['action'=>['PromotionController@update',$product[0]->idPromotion ],'method'=>'POST'])}}
                {{Form::hidden('_method','PUT')}}
                {{ Form::hidden('idPromotion',$product[0]->idPromotion,['id'=>'idP'])}}
                @else
                {{ Form::open(['action'=>'PromotionController@store','method'=>'POST'])}}
                @endif
                    <div class="form-group">
                        {{ Form::label('value', 'Value ') }}
                        {{ Form::number('value',$product[0]->value,['id'=>'value','class'=>'form-control','placeholder'=>'Set value for item','required'=>'required'])}}
                        {{ Form::label('dateStart', 'Promotion Starts on ') }}
                        {{ Form::date('dateStart',date_format(date_create($product[0]->date_start),"Y-m-d"),['id'=>'dateStart','class'=>'form-control','min'=>"YYYY-MM-DD",'placeholder'=>'Set value for item'])}}
                        {{ Form::label('dateEnd', 'Promotion ends on ') }}
                        {{ Form::date('dateEnd',date_format(date_create($product[0]->date_expires),"Y-m-d"),['id'=>'dateEnd','class'=>'form-control','min'=>date_format(date_create($product[0]->date_start),'Y-m-d'),'placeholder'=>'Set value for item'])}}
                    </div>
                    @if ($product[0]->value!=null)
                    {{From::submit('Update Promotion',['class'=>'btn btn-primary btn-block mt-2'])}}
                    @else
                    {{From::submit('Set Promotion',['class'=>'btn btn-primary btn-block'])}}
                    @endif
                        <button type="button" class="btn btn-secondary btn-block " data-dismiss="modal">Close</button>
                {{ Form::close() }}
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
<script>
    // function myFunction(id,value,dateStart,dateEnd){
    //     // console.log(id,value,dateStart,dateEnd);
    //     // var d = new Date(dateStart) ;
    //     // d=d.getFullYear()+'/'+d.getMonth()+'/'+d.getDay();
    //     // // d= d.getFullYear().concat(d.getFullYear());
    //     // console.log(d);
    //     // document.getElementById('idP').value=id;
    //     // document.getElementById('value').value=value;
    //     // document.getElementById('ee').value= '';
    //     // document.getElementById('dateStart').value=d;
    // }

    $('.carousel').carousel({
  interval: 1000
})
</script>
@endsection
