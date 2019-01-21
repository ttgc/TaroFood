
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
?>

<body>
  <div class="container" id="idGeneral">

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






      <div class="jumbotron jumbotron-fluid bg-dark">
        <div class="container">
          <a class="display-4 nav-link" href="#"> <h2> Nos Menus </h2> </a>

          <!-- CAROUSEL INNER -->
          <?php
          $produits = produit::getProduitCat(1);
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
                  <img src="images/b1.png" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title"> <?php echo $produit['libelle']; ?> </h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
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
      </div>

      <?php
      require "script/script.js";
      require "includes/footer.php";
      ?>

    </div>

  </body>

  </html>
