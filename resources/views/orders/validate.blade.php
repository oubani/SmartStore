@extends('layouts.app')
<title>Cart</title>
@section('content')
    <div class="container">
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
                    <form action="{{url('confirmOrder')}} " method="POST">
                        @csrf
                        @foreach (Cart::content() as $item)
                            <tr>
                                <td>{{$item->name}} </td>
                                <td>{{$item->price}} Dh</td>
                                <td>{{$item->qty}}</td>
                                <td>{{( $item->qty*$item->price)}} Dh</td>
                            </tr>
                        @endforeach
                            <tr><td colspan="3"><b>{{__('messages.total')}} : </b></td><td><b>{{Cart::total()}} Dh </b></td></tr>
                            <tr>
                                <td colspan="1" >{{__('messages.address')}} :  </td>
                                <td colspan="3" > <input type="text" name="address" style="width: 100%" required   value=" {{auth()->user()->address}}"> </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="{{__('messages.confirm')}}"   class="btn mt-2 btn-success" >
                                    <a href="/products" class="btn btn-danger mt-2 ml-4 text-center">{{__('messages.cancle')}}</a>
                                </td>
                            </tr>
                    </form>
                </tbody>
            </table>
            @else
        @endif

    </div>
@endsection
