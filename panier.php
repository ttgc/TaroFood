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
        <div class="jumbotron bg-light">
            <h2>Votre panier</h2>
            <table id="panierContent" class="table">
            </table>
        </div>
    </div>
    <?php
    require "includes/footer.php";
    ?>
    <script src="script/panier.js"></script>
    <script>
    $(document).ready(function(){
      display_panier();
      displayPanierNumber();
    });
    </script>
  </body>
</html>
