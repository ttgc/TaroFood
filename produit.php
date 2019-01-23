
<!doctype html>
<html lang="en">

<?php
require "includes/head2.php";
require "includes/database.php";
require "classes/menu.php";
require "classes/categorie.php";
require "classes/sscategorie.php";
require "classes/produit.php";
$db = Database::connect();

if(empty($_GET['id'])){
  header('Location:index.php');
}else{
  $cat=new categorie($_GET['id']);
}

?>

<body>
  <div class="container" id="idGeneral">
      <?php
      include 'includes/navbar_cat.php';
      $sscats=sscategorie::getSSCat($cat->id);
      foreach($sscats as $sscat){
      ?>
      <div class="jumbotron jumbotron-fluid bg-dark">
        <div class="container">
          <a class="display-4 nav-link" href="#"> <h2><?php echo $sscat['libelle']; ?></h2> </a>

          <!-- CAROUSEL INNER -->
          <?php
          $produits = produit::getProduitCat($sscat['id']);
          $cpt = 1;
          foreach ($produits as $produit) {
            if($cpt%3 == 1){
              ?>
              <div class="row">
                <?php
              }
              ?>
              <div class="col-md-4">
                <div class="card text-center bg-light border-dark mb-3" style="width: 18rem;">

                  <img src="<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h4 class="card-title"> <?php echo $produit['libelle']; ?> </h4>
                    <h5 class="card-text"> <?php echo $produit['prix']; ?>€</h5>
                    <a href="#" class="btn btn-primary"> Commander </a>
                  </div>
                </div>
              </div>
              <?php
              if($cpt%3 == 0) {
                ?>
              </div>
              <?php
            }
            $cpt++;
          }
          ?>
          </div>
    
      </div>
      <?php
      }
      require "script/script.js";
      require "includes/footer.php";
      ?>
    </div>
  </body>
  </html>
