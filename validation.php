<?php
require "includes/database.php";
require "classes/menu.php";
require "classes/categorie.php";
require "classes/sscategorie.php";
require "classes/produit.php";
$db = Database::connect();
?>
<!DOCTYPE html>
<html>
    <?php
      include "includes/head2.php";
    ?>
  <body>
    <?php
    include "includes/navbar_cat.php";
     ?>

     <div class="container">
       <div class="row">
         <div class="col-12 col-md-8 offset-md-2">
           <div class="jumbotron">
             <form method="post">
                <div class="form-row">
                  <fieldset class="form-group">
                    <div class="row">
                      <legend class="col-sm-2">Radios</legend>
                      <div class="col-sm-10">
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
                          <label class="form-check-label" for="gridRadios1">
                            First radio
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                          <label class="form-check-label" for="gridRadios2">
                            Second radio
                          </label>
                        </div>
                      </div>
                    </div>
                  </fieldset>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" name="mail" id="mail" placeholder="Email">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-12">
                    <label for="adresse">Adresse</label>
                    <input type="text" class="form-control" id="adresse" name="adresse">
                  </div>
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3">
                    <label for="cp">Code Postal</label>
                    <input type="text" class="form-control" id="cp" name="cp">
                  </div>
                  <div class="form-group col-md-9">
                    <label for="ville">Ville</label>
                    <input type="text" class="form-control" id="ville" name="ville">
                  </div>
                </div>

                <button type="submit" class="btn btn-success">Commander</button>
              </form>
           </div>
         </div>
       </div>
     </div>

     <?php
     require "includes/footer.php";
     require "script/script.js";
     ?>
  </body>
</html>
