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
            <form action="/categories/update" method="POST">
                @csrf
                <div class="form-group">
                    <input type="hidden" value="" class="form-control" id="editcategorieId" name="categorieId" >
                  <label for="categorieName">{{__('messages.categorieName')}}</label>
                  <input type="text" value="" class="form-control" id="editcategorieName" name="categorieName" >
                </div>
                <button type="submit" class="btn-block btn btn-primary mb-3 ">{{__('messages.updateCategorie')}}</button>
                <button type="button" class="btn btn-secondary btn-block " data-dismiss="modal">{{__('messages.close')}}</button>
              </form>
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

