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
                            <tr><td colspan="3"><b>Total : </b></td><td><b>{{Cart::total()}} Dh </b></td></tr>
                            <tr>
                                <td><input class="btn btn-primary" value="Update" type="submit">  </td>
                                <td><a href="/cart/destroy" class="btn btn-danger">Clean cart <i class="fa fa-trash "></i></a></td>
                            </tr>
                    </form>
                </tbody>
            </table>
            <a href="/validate"  class="btn mt-5 btn-success" >Validate</a>
            <a href="/products" class="btn btn-primary mt-5 text-center">Continue Shopping</a>
            @else
            <a href="/products" class="btn btn-primary mt-5 text-center">Start Shopping</a>

        @endif

    </div>
@endsection
