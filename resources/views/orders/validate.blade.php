@extends('layouts.app')
<title>Cart</title>
@section('content')
    <div class="container">
        @if (count(Cart::content())>0)
            <table class="table mt-3">
                <thead class="thead-dark"  >
                    <tr>
                       <th scope="col" >Item</th>
                       <th scope="col" >Price</th>
                       <th scope="col" >Quantity</th>
                       <th scope="col" >Total</th>
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
                            <tr><td colspan="3"><b>Total : </b></td><td><b>{{Cart::total()}} Dh </b></td></tr>
                            <tr>
                                <td colspan="1" >address :  </td>
                                <td colspan="3" > <input type="text" name="address" style="width: 100%" required   value=" {{auth()->user()->address}}"> </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="submit" value="Confirm"   class="btn mt-5 btn-success" >

                                </td>
                            </tr>
                    </form>
                </tbody>
            </table>
            <a href="/products" class="btn btn-danger mt-5 text-center">Cancle</a>
            @else
        @endif

    </div>
@endsection
