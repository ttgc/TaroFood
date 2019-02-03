
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

if(empty($_GET)){
  header('Location:index.php');
}else{
  if(!empty($_GET['id'])){
    $cat=new categorie($_GET['id']);
  }
  if(!empty($_GET['sscat'])){
    $sscat=new sscategorie($_GET['sscat']);
  }
}

?>

<body>
  <div class="container" id="idGeneral">
      <?php
      include 'includes/navbar_cat.php';
      if(!empty($sscat)){
        $sscats=array($sscat);
      }else{
        $sscats=sscategorie::getSSCat($cat->id);
      }
      foreach($sscats as $ssc){
        if(empty($_GET['sscat'])){
          $sscat=new sscategorie($ssc['id']);
        }
      ?>
      <div class="jumbotron jumbotron-fluid bg-dark">
        <div class="container">
          <h2><?php echo $sscat->lib; ?></h2> </a>

          <!-- CAROUSEL INNER -->
          <?php
          $produits = produit::getProduitCat($sscat->id);
          $cpt = 1;
          foreach ($produits as $produit) {
            $nbProd = sizeof($produits);
            if($cpt%3 == 1){
              ?>

              <div class="row">
                <?php
              }
              ?>
              <div class="col-md-4">
                <div class="card text-center bg-light border-dark mb-3">
                  <img src="<?php echo $produit['image']; ?>" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h4 class="card-title"> <?php echo $produit['libelle']; ?> </h4>
                    <h5 class="card-text"> <?php echo $produit['prix']; ?>€</h5>
                    <a id="prd<?php echo $produit['id']?>" href="#" class="btn btn-primary btn-order"> Commander </a>
                  </div>
                </div>
              </div>
              <?php
              if($cpt%3 == 0 || $cpt == $nbProd) {
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
      <script src="script/panier.js"></script>
      <script>
      $(document).ready(function(){
        create_panier();
        var panier = getPanier();
        $("#panierItemNumber").html(panier.length);
        $('.btn-order').click(function(){
          alert('Produit ajouté au panier');
          var attr = $('.btn-order').attr('id');
          var id = attr.substr(3,attr.length-3);
          $.post("includes/cprd_check.php",
          {
            produit: id
          },
          function(data,status){
            addToPanier(data);
            displayPanierNumber();
          });
        });
      });
      </script>
    </div>
  </body>
  </html>
