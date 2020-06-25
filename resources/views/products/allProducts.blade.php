@extends('layouts.app')
@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
    <center> <p class="lead" >All products</p></center>
</div>
<div class="container mt-1 ">
    <table class="table">
        <thead class="thead-dark" >
            <tr>
                <th scope="col" >image</th>
                <th scope="col" >{{__('messages.Pname')}}</th>
                <th scope="col" >{{__('messages.description')}} </th>
                <th scope="col" >{{__('messages.stock')}} </th>
                <th scope="col" >{{__('messages.price')}}</th>
                <th scope="col" >{{__('messages.category')}}</th>
                <th scope="col" >{{__('messages.promotion')}}</th>
                <th scope="col" ></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <td> <img src='./images/{{$product->cover}}' style="width:60px"  alt=""> </td>
                <td> {{$product->name}} </td>
                <td> {{$product->description}} </td>
                <td> {{$product->stock}} </td>
                <td> {{$product->prix}} </td>
                <td> {{$product->categorieName}} </td>
                <td> {{$product->value!== null?$product->value .' %':'---'}} </td>
                <td> <a href="/gproduct/{{$product->id}} " class="btn btn-primary"> {{__('messages.details')}} </a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}}
</div>
@endsection
