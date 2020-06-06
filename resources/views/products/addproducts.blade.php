
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<style>
    .promo{
        margin-top: -10px;
    }
</style>
<div class="container">
    <br>
    <a href="/home" class="btn indigo  "><i class="material-icons left">arrow_back</i> Back to dashbroad</a>
    <br>
<div class="row">
    <form class="col s12" enctype="multipart/form-data" method="POST" action="productstore" >
        @csrf
      <div class="row">
        <div class="input-field col s8">
          <input id="name" name="name" type="text" class="validate">
          <label for="name">name</label>
        </div>
        <div class="input-field col s4">
            <input id="prix" name="prix" type="number"   class="validate">
            <label for="prix">prix</label>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input  id="description" name="description" type="text" class="validate">
          <label for="description">Description</label>
        </div>
        <div class="input-field col s4">
          <input  id="stock" name="stock" type="number" class="validate">
          <label for="stock">Stock</label>
        </div>
      </div>
      <div class="row">
      <div class="input-field col s6">
      <select name="categorie_id" class="browser-default">
        <option value="0" disabled selected>Choisir categorie</option>
        <?php
            use App\Categorie;
            $cats =Categorie::all() ;
            foreach ($cats as $cat ) {
                echo" <option value='{$cat->id}' > {$cat->categorieName }</option>";
            }
            ?>
      </select>
      </div>
        <div class="col s6">
            <div class = "file-field input-field">
               <div class = "btn">
                  <span>chosir cover </span>
                  <input  type = "file" name="cover" />
               </div>

               <div class = "file-path-wrapper">
                  <input class = "file-path validate" type = "text"
                     placeholder = "upload i'image de " />
               </div>
            </div>
        </div>

        <div class="row">
            <h4>Select Images Of Product </h4>
            <div class="col s3">
                <div class = "file-field input-field">
                    <div class = "btn green">
                        <i class="material-icons  "> add_a_photo </i>
                       <input type = "file" name="images[]"  />
                    </div>
                    <div class = "file-path-wrapper">
                       <input class = "file-path validate" type = "text"
                          placeholder = "Upload image's 1    " />
                    </div>
                 </div>
            </div>
            <div class="col s3"><div class = "file-field input-field">
                <div class = "btn green">
                    <i class="material-icons  "> add_a_photo </i>
                   <input type = "file" name="images[]" />
                </div>
                <div class = "file-path-wrapper">
                   <input class = "file-path validate" type = "text"
                      placeholder = "Upload  image 2 " />
                </div>
             </div></div>
            <div class="col s3"><div class = "file-field input-field">
                <div class = "btn green">
                    <i class="material-icons  "> add_a_photo </i>
                   <input type = "file" name="images[]"  />
                </div>
                <div class = "file-path-wrapper">
                   <input class = "file-path validate" type = "text"
                      placeholder = "Upload image 3  "  />
                </div>
             </div></div>
            <div class="col s3"><div class = "file-field input-field">
                <div class = "btn green">
                   <i class="material-icons  "> add_a_photo </i>
                   <input type = "file" name="images[]" />
                </div>
                <div class = "file-path-wrapper">
                   <input class = "file-path validate" type = "text"
                      placeholder = "Upload  image 4  " />
                </div>
             </div></div>



          <div class="col s12  ">
              <h3 class="promo">set promotion</h3>
          </div>
          <div class="col s3">
            <label>
                <input type="checkbox" value="0"  id="promofield" />
                <span>Set Promotion </span>
              </label>
          </div>
          <div class="input-field col s3 promo">
            <input  id="value" name="value" type="text" class="validate">
            <label for="value">value</label>
          </div>
          <div class="input-field col s3 promo">
            <input  id="date_start"  name="date_start" type="date" class="validate">
            <label for="date_start">date_start</label>
          </div>
          <div class="input-field col s3 promo">
            <input  id="date_end"  name="date_end" type="date" class="validate">
            <label for="date_end">date_end</label>
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


