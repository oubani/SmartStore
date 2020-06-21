<div class="container-fluid p-4 pt-5 bg-dark text-warning mb-3 ">

</div>
<div class="container mt-1 ">
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .promo{
        margin-top: -10px;
    }
</style>
<center>
    <p class="lead" style="background:#333;color:white;padding:30px 0px;" >Edit {{$product->name}} </p>
</center>
<div class="container">
    <br>
    <a href="/home" class="btn indigo  "><i class="material-icons left">arrow_back</i> Back to dashbroad</a>
    <br>
    <br>
<div class="row">
    <form class="col s12" enctype="multipart/form-data" method="POST" action="/productupdate" >
        @csrf
        <input type="hidden"  name="id" type="number" value="{{$product->id}}" >
      <div class="row">
        <div class="input-field col s8">
          <input id="name" name="name" type="text" value="{{$product->name}}" class="validate">
          <label for="name">name</label>
        </div>
        <div class="input-field col s4">
            <input id="prix" name="prix" type="number" value="{{$product->prix}}"  class="validate">
            <label for="prix">prix</label>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input  id="description" name="description" type="text" value="{{$product->description}}" class="validate">
          <label for="description">Description</label>
        </div>
        <div class="input-field col s4">
          <input  id="stock" name="stock" type="number" value="{{$product->stock}}" class="validate">
          <label for="stock">Stock</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s6">
      <select value="{{$product->categorie_id}}" name="categorie_id" class="browser-default">
        <option  disabled selected>Choisir categorie</option>
        <?php
            use App\Categorie;
            $cats =Categorie::all() ;
            foreach ($cats as $cat ) {
                if ($cat->id==$product->categorie_id) {
                    echo" <option value='{$cat->id}' selected > {$cat->categorieName }</option>";

                } else {
                    echo" <option value='{$cat->id}' > {$cat->categorieName }</option>";
                }

            }
            ?>
      </select>
      </div>
        <div class="col s6">
            <div class = "file-field input-field">
               <div class = "btn">
                  <span>chosir cover </span>
                  <input  type = "file" name="cover" value="{{$product->cover}}" />
               </div>

               <div class = "file-path-wrapper">
                  <input class = "file-path validate" type = "text"
                     placeholder = "upload i'image de " />
               </div>
            </div>
        </div>


      <center>
        <button class="btn waves-effect waves-light" type="submit" name="action">Ajouter le produit
        <i class="material-icons right">send</i>
      </button>
      </center>
    </form>
</div>

</div>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('select');
    var instances = M.FormSelect.init(elems, options);
  });

  // Or with jQuery
  var instance = M.FormSelect.getInstance(elem);

  $(document).ready(function(){
    $('select').formSelect();
  });


</script>



