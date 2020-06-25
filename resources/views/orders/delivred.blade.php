@extends('layouts.app')
@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
    <center> <p class="lead" >{{__('messages.myOrders')}}</p></center>
  </div>
  <div class="container">
    <a href="/orders" class="btn mb-3 btn-outline-dark "> <- back to Orders </a>
    @if (count($orders)>0)
        <table class="table">
            <thead>
                <th scope="row">{{__('messages.order')}}</th>
                    <th scope="row">{{__('messages.priceTotal')}}</th>
                    <th scope="row">{{__('messages.orderdAt')}}</th>
                    <th scope="row">{{__('messages.dateDelivred')}} </th>
                    <th scope="row">{{__('messages.delivred')}} </th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $cmd)
                <tr>
                    <td>{{__('messages.order')}} n°: {{$cmd->id}}</td>
                    <td>{{$cmd->total}} Dh </td>
                    <td>{{$cmd->created_at}}</td>
                    <td>
                        @if ($cmd->type==0)
                            ---
                        @else
                            {{$cmd->updated_at}}
                        @endif
                    </td>
                    <td>
                        @if ($cmd->type==0)
                        <p class="text-danger" >{{__('messages.notYet')}}</p>
                        @else
                            <p class="text-success" >{{__('messages.delivred')}}</p>
                        @endif
                    </td>
                    <td> <a href="/orders/{{$cmd->id}}/detail" class="btn btn-primary" > {{__('messages.details')}}  <span></span> </a> </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$orders->links()}}
    @else
    <center> <p class="lead"> {{__('messages.msgStartshopping')}}   <a href="/products">{{__('messages.startShopping')}}  </a> </p> </center>
    @endif
  </div>
@endsection
