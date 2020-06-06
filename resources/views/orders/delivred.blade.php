@extends('layouts.app')
@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
    <center> <p class="lead" >Mes Commandes</p></center>
  </div>
  <div class="container">
    <a href="/orders" class="btn mb-3 btn-outline-dark "> <- back to Orders </a>
    @if (count($orders)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="row">Order</th>
                    <th scope="row">Price Total</th>
                    <th scope="row">Orderd at</th>
                    <th scope="row">Date delivred </th>
                    <th scope="row">Delivred </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $cmd)
                <tr>
                    <td>order n°: {{$cmd->id}}</td>
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
                        <p class="text-danger" >not yet</p>
                        @else
                            <p class="text-success" >delivred</p>
                        @endif
                    </td>
                    <td> <a href="/orders/{{$cmd->id}}/detail" class="btn btn-primary" > details <span></span> </a> </td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <center> <p class="lead"> you don't have any order didn't delivred yet  </p> </center>
        @endif
  </div>
@endsection
