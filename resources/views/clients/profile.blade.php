@extends('layouts.app')
@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
    <center> <p class="lead" >Profile</p></center>
</div>
<style>
    .spacebeetwen{
        line-height: 30px;
        margin-bottom: 20px;
    }
</style>
<div class="container mt-4 ">
    <div class="card shadow " style="width: 60% ;margin : auto" >
        <div class="row p-3 ">
            <div class="col-sm-6 spacebeetwen ">
                {{__('messages.name')}} : <b>{{$data->name}}</b> <br>
                {{__('messages.email')}} : <b>{{$data->email}}</b> <br>
                {{__('messages.type')}} : <b>{{$data->type===0?'Client':'Admin'}}</b> <br>

            </div>
            <div class="col-sm-6 spacebeetwen">
                {{__('messages.lastName')}} : <b>{{$data->lastName}}</b><br>
                {{__('messages.phone')}} : <b>{{$data->phone}}</b><br>
                {{__('messages.address')}} : <b>{{$data->address}}</b><br>
            </div>
            <div class="col-md-12">
                <a href="/editProfile" class="btn btn-primary btn-block "  >{{__('messages.update')}} Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
