@extends('layouts.app')
@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 "  >
    <center> <p class="lead" >Contact Us</p></center>
</div>
    <div class="container" style="min-height: 273px" >
        <table class="table">
            <thead class="thead-dark">
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">message</th>
                <th scope="col">type</th>
                <th scope="col"></th>
                <th scope="col"></th>
            </thead>
            <tbody>
                @foreach ($contacts as $contact)
                    <tr>
                        <td>{{$contact->name}}</td>
                        <td>{{$contact->email}}</td>
                        <td>{{$contact->message}}</td>
                        <td>{{$contact->type?'visible':'hidden'}}</td>
                        <td>
                            {!!Form::open(['action' => ['ConatctUsController@destroy', $contact->id], 'method' => 'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection