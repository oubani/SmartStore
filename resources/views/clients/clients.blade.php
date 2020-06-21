@extends('layouts.app')
@section('content')
    <div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
        <center> <p class="lead" >{{$page}}</p></center>
    </div>
    <div class="container">
        <a href="/home" class="btn mb-3 btn-outline-dark ">  back to Dashboard </a>
        @if ($page!=='Clients Liste')
            <a href="/clientliste" class="btn mb-3 ml-3  btn-outline-danger "> All Clients </a>
        @endif
        <a href="/clientliste/admins" class="btn mb-3 ml-3  btn-outline-primary "> Admins </a>
        <a href="/clientliste/clients" class="btn mb-3 ml-3  btn-outline-success ">  Clients </a>
        @if (count($clients)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="row">name</th>
                    <th scope="row">Last Name</th>
                    <th scope="row">Email</th>
                    <th scope="row">phone </th>
                    <th scope="row">type </th>
                    <th scope="row">Address </th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                <tr>
                    <td> {{$client->name}}</td>
                    <td>{{$client->lastName}} </td>
                    <td>{{$client->email}}</td>
                    <td>{{$client->phone}}</td>
                    <td>
                        @if ($client->type==0)
                            Client
                        @else
                            Admin
                        @endif
                    </td>
                    <td>{{$client->address}}</td>
                    @if ($client->type == 0)
                    <td> <a href="/clients/upgrade/{{$client->id}}" class="btn btn-primary  " > upgrade <i class="fas fa-arrow-up"></i> </a> </td>
                    @else
                    <td> <a href="/clients/degrade/{{$client->id}}" class="btn btn-warning text-dark bold " > degrade <i class="fas fa-arrow-down"></i> </a> </td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$clients->links()}}
   @endif

    </div>



@endsection

