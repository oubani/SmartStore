@extends('layouts.app')
@section('content')
<?php use App\Product; ?>
    <div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
        <center> <p class="lead" >Order : {{$order_number}}°</p></center>
    </div>
    <div class="container">
        <table class="table">
            <thead class="thead-dark" >
                <tr>
                    <th scope="col" >image</th>
                    <th scope="col" >{{__('messages.Pname')}}</th>
                    <th scope="col" >{{__('messages.quantity')}} </th>
                    <th scope="col" >{{__('messages.price')}}</th>
                    <th scope="col" >{{__('messages.total')}}</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $t = 0;
                @endphp
                @for ($i = 0; $i < count($details); $i++)
                    <tr>

                        <td> <img src="/images/{{$details[$i]['cover']}}" height="50px" alt=""> </td>
                        <td> {{$details[$i]['name']}}</td>
                        <td> {{$details[$i]['quantity']}}</td>
                        <td> {{$details[$i]['price']}} Dh</td>
                        <td> {{$details[$i]['price']*$details[$i]['quantity']}} Dh</td>
                        @php
                            $t += $details[$i]['price']*$details[$i]['quantity'];
                        @endphp
                    </tr>
                @endfor
                <tr>
                    <td colspan="4"><b>{{__('messages.total')}} : </b></td>
                    <td><b>{{$t}} Dh </b></td></tr>
            </tbody>
        </table>

    </div>
@endsection
