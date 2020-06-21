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
                name : <b>{{$data->name}}</b> <br>
                Email : <b>{{$data->email}}</b> <br>
                Type : <b>{{$data->type===0?'Client':'Admin'}}</b> <br>

            </div>
            <div class="col-sm-6 spacebeetwen">
                Last name : <b>{{$data->lastName}}</b><br>
                Phone : <b>{{$data->phone}}</b><br>
                Address : <b>{{$data->address}}</b><br>
            </div>
            <div class="col-md-12">
                <a href="/editProfile" class="btn btn-primary btn-block "  >Update Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection
