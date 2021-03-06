@extends('layouts.app')
<title>Cart</title>
@section('content')
    <div class="container " style="min-height: 58vh" >
        @if (count(Cart::content())>0)
            <table class="table mt-3">
                <thead class="thead-dark"  >
                    <tr>
                       <th scope="col" >{{__('messages.item')}}</th>
                       <th scope="col" >{{__('messages.price')}}</th>
                       <th scope="col" >{{__('messages.quantity')}}</th>
                       <th scope="col" >{{__('messages.total')}}</th>
                       <th scope="col"></th>

                    </tr>
                </thead>
                <tbody>
                    <form action="{{url('updatecart')}} " method="POST">
                        @csrf
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->price}} Dh</td>
                                <td><input name='quantity[]' type="number" value="{{$item->qty}}" min="1" ></td>
                                <td>{{( $item->qty*$item->price)}} Dh</td>
                                <td><a href="/deleteItem/{{$item->rowId}}" class="btn btn-danger"> <i class="fa fa-minus "></i> </a></td>

                            </tr>
                        @endforeach
                            <tr><td colspan="3"><b>{{__('messages.total')}} : </b></td><td><b>{{Cart::total()}} Dh </b></td></tr>
                            <tr>
                                <td><input class="btn btn-primary" value="{{__('messages.update')}}" type="submit">  </td>
                                <td><a href="/cart/destroy" class="btn btn-danger">{{__('messages.cleanCart')}} <i class="fa fa-trash "></i></a></td>
                            </tr>
                    </form>
                </tbody>
            </table>
            <a href="/products" class="btn btn-outline-primary mt-5 text-center">{{__('messages.continueShopping')}}</a>
            <a href="/validate"  class="btn mt-5 btn-success" >{{__('messages.validate')}}</a>
            @else
            <a href="/products" class="btn btn-primary mt-5 text-center">{{__('messages.startShopping')}}</a>

        @endif

    </div>
@endsection
