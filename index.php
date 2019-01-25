<!doctype html>
<html lang="en">
<meta charset="UTF-8">

<?php
require "includes/head2.php";
require "includes/database.php";
require "classes/menu.php";
require "classes/categorie.php";
require "classes/sscategorie.php";
require "classes/produit.php";



$db = Database::connect();
?>

<body>

  <div id="sidenav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Menus</a>
    <a href="#">Pizzas</a>
    <a href="#">Accompagnements</a>
    <a href="#">Salades</a>
    <a href="#">Desserts</a>
  </div>

  <div class="container" id="divGeneral">


    <!--  CATEGORIES NAVBAR -->

<?php
include "includes/navbar_cat.php";
 ?>
      <br/>

      <!--  MENU CATEGORY -->

      <div class="jumbotron jumbotron-fluid bg-dark">
        <div class="container">
          <a class=" display-4 nav-link" href="#"><h2>Nos Menus </h2> </a>
          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>

            </ol>

            <!-- CAROUSEL INNER -->
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
                      <div class="card text-center bg-light border-dark mb-3" style="width: 18rem;">
                        <img src="images/b1.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title"> <?php echo $menu['libelle']; ?> </h5>
                          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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

      <!--  TEST ALL CATEGORIES AT ONCE  -->

      <h2> CATEGORIES</h2>

      <?php
      $cpt2 = 1;
      $cptCarousel = 1;

      foreach($categories as $category) {
        $nbrCat = sizeof($categories);
        ?>
        <div class="jumbotron jumbotron-fluid bg-dark">
          <div class="container">
            <a class=" display-4 nav-link" href="#"><h2> Nos <?php echo $category['libelle'] ?> </h2> </a>
            <div id="<?php echo 'carouselExampleIndicators'.$cptCarousel ?>" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="<?php echo '#carouselExampleIndicators'.$cptCarousel ?>" data-slide-to="0" class="active"></li>
                <li data-target="<?php echo '#carouselExampleIndicators'.$cptCarousel ?>" data-slide-to="1"></li>
                <li data-target="<?php echo '#carouselExampleIndicators'.$cptCarousel ?>" data-slide-to="3"></li>
              </ol>

              <!-- CAROUSEL INNER -->
              <div class="carousel-inner">
                <?php
                $sscategories = sscategorie::getSSCat($cpt2);

                $cpt = 1;

                foreach ($sscategories as $sscategorie) {
                  $nbrSsCat = sizeof($sscategories);


                    if ($cpt%3 == 1) {
                      ?>
                      <div class=" carousel-item <?php if($cpt <= 3) {echo 'active';} ?>">
                        <div class="row">
                          <?php
                        }
                        ?>
                        <div class="col-md-4">
                          <div class="card text-center bg-light border-dark mb-3" style="width: 18rem;">
                            <img src="images/b1.png" class="card-img-top" alt="...">
                            <div class="card-body">
                              <h5 class="card-title"> <?php echo $sscategorie['libelle']; ?> </h5>
                              <p class="card-text"> </p>
                              <a class="<?php if(!empty($_GET['id'])){ if($sscategorie['categorie_id'] == $_GET['id']){echo "active" ;}}?> btn btn-primary" href="produit.php?sscat=<?php echo $sscategorie['id']; ?>"> Commander </a>

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

                  <a class="carousel-control-prev" href="<?php echo '#carouselExampleIndicators'.$cptCarousel ?>" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="<?php echo '#carouselExampleIndicators'.$cptCarousel ?>" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
                  <?php

                  ?>
                </div>
              </div>
            </div>
          </div>

          <?php
          $cptCarousel++;
          $cpt2++;
        }
        ?>


        <?php
        require "script/script.js";
        ?>

      </div>

      <?php
      require "includes/footer.php";
      ?>

    </body>

    </html>
