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
    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#" onclick="openNav()">TaroFood</a>               <!-- ouvre le menu a droite de la page -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropDown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <?php
          $statement = $db->query('SELECT * FROM categorie');
          $categories = $statement->fetchAll();
          foreach($categories as $category) {
            if($category['id'] == '1') {
              echo '<li role="presentation" class="active nav-item"><a class="nav-link" href="#'. $category['id'] . '"data-toggle="tab">' . $category['libelle'] . '</a></li>';
            }else {
              echo '<li role="presentation" class="nav-item"><a class="nav-link" href="#' . $category['id'] . '"data-toggle="tab">' . $category['libelle'] . '</a></li>';
            }
          }
          ?>
        </ul>

        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropleft ml-auto">
            <div>
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                0,00 € <i class="fas fa-shopping-cart"></i>
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="#">Canard boiteux</a>
                <a class="dropdown-item" href="#">Another giraffe</a>
                <a class="dropdown-item" href="#">A hord of platipus</a>
              </div>
            </div>
          </li>
        </ul>
          </div>
      </nav>

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

      <h2> TESTING OUT</h2>

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
        require "includes/footer.php";
        ?>

      </div>
    </body>


    </html>
