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
  <div class="container pb-3 pt-3" id="divGeneral">
    <div class="jumbotron bg-dark">
      <div class="container">
        <a class=" display-4 nav-link" href="#"><h2>Nos Menus </h2> </a>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <?php
            $menus = menu::getAllMenus();
            $cpt = 1;
            foreach ($menus as $menu) {
              if ($cpt%3 == 1) {
                ?>
                <div class=" carousel-item <?php if($cpt <= 3) {echo 'active';} ?>">
                  <div class="row">
                    <?php
                  }
                  ?>
                  <div class="col-md-4">
                    <div class="card text-center bg-light border-dark mb-3">
                      <img src="images/b1.png" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"> <?php echo $menu['libelle']; ?> </h5>
                        <p class="card-text"><?php echo $menu['prix']; ?> €</p>
                        <a href="#" class="btn btn-primary"> Commander </a>
                      </div>
                    </div>
                  </div>
                  <?php
                  if($cpt%3 == 0) {
                    ?>
                  </div>
                </div>
                <?php
              }
              $cpt++;
            }
            ?>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
    </div>
    <hr/>
    <h2> CATEGORIES</h2>
    <?php
    $categories=categorie::getAllCat();
    foreach($categories as $category) {
      $nbrCat = sizeof($categories);
      ?>
      <div class="jumbotron bg-dark">
        <div class="container">
          <h2> Nos <?php echo $category['libelle'] ?> </h2>
          <div id="<?php echo 'carouselExampleIndicators'.$category['id'] ?>" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="<?php echo '#carouselExampleIndicators'.$category['id'] ?>" data-slide-to="0" class="active"></li>
              <li data-target="<?php echo '#carouselExampleIndicators'.$category['id'] ?>" data-slide-to="1"></li>
              <li data-target="<?php echo '#carouselExampleIndicators'.$category['id'] ?>" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <?php
              $cpt = 1;
              $sscategories = sscategorie::getSSCat($category['id']);
              foreach ($sscategories as $sscategorie) {
                $nbSSCat = sizeof($sscategories);
                  if ($cpt%3 == 1) {
                    ?>
                    <div class=" carousel-item <?php if($cpt <= 3) {echo 'active';} ?>">
                      <div class="row">
                    <?php
                  }
                  ?>
                  <div class="col-md-4">
                    <div class="card text-center bg-light border-dark">
                      <img src="images/b1.png" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"> <?php echo $sscategorie['libelle']; ?> </h5>
                        <p class="card-text"> </p>
                        <a href="#" class="btn btn-primary"> Commander </a>
                      </div>
                    </div>
                  </div>
                  <?php
                    if($cpt%3 == 0 || $cpt==$nbSSCat) {
                    ?>
                    </div>
                  </div>
                  <?php
                  }
                  $cpt++;
                }
                ?>
                <a class="carousel-control-prev" href="<?php echo '#carouselExampleIndicators'.$category['id'] ?>" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="<?php echo '#carouselExampleIndicators'.$category['id'] ?>" role="button" data-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
            </div>
          </div>
        </div>
      </div>
      <?php
    }
    ?>
  </div>
    <?php
    require "includes/footer.php";
    require "script/script.js";
    ?>
</body>
</html>
