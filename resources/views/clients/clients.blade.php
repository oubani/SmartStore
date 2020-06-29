@extends('layouts.app')
@section('content')
    <div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
        <center> <p class="lead" >{{$page}}</p></center>
    </div>
    <div class="container">
        <a href="/home" class="btn mb-3 btn-outline-dark ">  {{__('messages.backToDashboard')}} </a>
        @if ($page!=='Clients Liste')
            <a href="/clientliste" class="btn mb-3 ml-3  btn-outline-danger "> {{__('messages.allClients')}} </a>
        @endif
        <a href="/clientliste/admins" class="btn mb-3 ml-3  btn-outline-primary "> {{__('messages.admins')}} </a>
        <a href="/clientliste/clients" class="btn mb-3 ml-3  btn-outline-success ">  {{__('messages.clients')}} </a>
        @if (count($clients)>0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="row">{{__('messages.name')}}</th>
                    <th scope="row">{{__('messages.lastName')}}</th>
                    <th scope="row">{{__('messages.email')}}</th>
                    <th scope="row">{{__('messages.phone')}} </th>
                    <th scope="row">{{__('messages.type')}} </th>
                    <th scope="row">{{__('messages.address')}} </th>
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
                    @if (auth()->user()->type == 2)
                    @if ($client->type == 0)
                    <td> <a href="/clients/upgrade/{{$client->id}}" class="btn btn-primary  " > {{__('messages.upgrade')}} <i class="fas fa-arrow-up"></i> </a> </td>
                    @else
                    <td> <a href="/clients/degrade/{{$client->id}}" class="btn btn-warning text-dark bold " > {{__('messages.downgrade')}} <i class="fas fa-arrow-down"></i> </a> </td>
                    @endif
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$clients->links()}}
   @endif

    </div>



@endsection

