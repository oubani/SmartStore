@extends('layouts.app')
@section('content')
    <div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
    <center> <p class="lead" >Mes Commandes</p></center>
    </div>
    <div class="container">
    @if (count($myorders)>0)
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Order N° : </th>
                <th scope="col">Total </th>
                <th scope="col">type</th>
                <th scope="col">Address</th>
                <th scope="col">Orderd at</th>
                <th scope="col">Recived at</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($myorders as $order)
                <tr>
                    <td>{{$order->id}}</td>
                    <td>{{$order->total}}</td>
                    <td>{{$order->type == 1 ? 'delired' :  'Not yet'}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->created_at==$order->updated_at ? '---':$order->updated_at}}</td>
                    <td><a href="/order/{{$order->id}}/details" class="btn btn-primary">Order's Details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <a href="/products" class="btn btn-success"> Start Shopping</a>
    @endif
  </div>
@endsection
