@extends('layouts.app')

@section('content')
<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">
  <center> <p class="lead" > {{__('messages.editCategories')}}</p></center>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                      <th scope="col">{{__('messages.categorieName')}}</th>
                      <th scope="col">{{__('messages.edit')}}</th>
                      <th scope="col">{{__('messages.delete')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($categories as $categorie)
                      <tr>
                        <th> {{$categorie->categorieName}} </th>
                        <td>
                            <button type="button" id="mod" onclick="myFunction('{{$categorie->categorieName}}','{{$categorie->id}}')" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                {{__('messages.editCategorie')}}
                            </button>
                        </td>
                        <td>
                            {!!Form::open(['action'=> ['CategorieController@destroy',$categorie->id],'method'=>'POST','class'=>'center'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{form::submit('Delete',['class'=>'btn btn-danger'])}}
                            {!!Form::close()!!}
                        </td>
                      </tr>
                      @endforeach

                  </tbody>
            </table>
            <div class=" center mx-auto">{{ $categories->links() }}</div>
        </div>
        <div class="col-md-4">
            <h1>{{__('messages.addCategorie')}}</h1>
            <form action="/categories" method="POST">
                @csrf
                <div class="form-group">
                  <label for="categorieName">{{__('messages.categorieName')}}</label>
                  <input type="text" class="form-control" required id="categorieName" name="categorieName" >
                </div>
                <button type="submit" class="btn-block btn btn-primary">{{__('messages.addCategorie')}}</button>
              </form>
        </div>
       <!-- Button trigger modal -->


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{__('messages.updateCategorie')}}</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          {!! Form::open(['action' => ['CategorieController@update', $categorie->id], 'method' => 'POST']) !!}
          {{Form::hidden('_method','PUT')}}
            <div class="form-group">
                {{Form::label('title', 'Categorie name')}}
                {{Form::text('title', '', ['class' => 'form-control', 'id' => 'editcategorieName' , 'placeholder' => 'Title'])}}
                {{Form::hidden('id','', ['class' => 'form-control','id' => 'editcategorieId' ])}}
            </div>
        {{Form::submit('Update', ['class'=>'btn btn-primary btn-block '])}}
    {!! Form::close() !!}

           
        </div>
      </div>
    </div>
  </div>
    </div>
</div>
<script>

function myFunction(categorieName,id) {
  document.getElementById("editcategorieName").value = categorieName;
  document.getElementById("editcategorieId").value = id;
}

    $('#myModal').on('shown.bs.modal', function () {
    $('#myInput').trigger('focus')
})
</script>
@endsection

