<!doctype html>
<html lang="en">


<?php
require "includes/head.php";
?>
<body>




  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nos menus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nos burgers</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nos salades</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nos boissons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Nos desserts</a>
        </li>



      </ul>

      <ul class="navbar-nav ml-auto">

        <li class="nav-item dropdown ml-auto">
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

    </nav>



    <br/>

    <div class="container">
      <div class="row">
        <div class="column">

          <aside>
            <nav class="nav flex-column">
              <a class="nav-link active" href="#">Nos Pizzas</a>
              <a class="nav-link" href="#">Nos Sandwichs</a>
              <a class="nav-link" href="#">Nos Accompagnements</a>
              <a class="nav-link" href="#">Nos Boissons</a>
              <a class="nav-link" href="#">Nos Desserts</a>
            </nav>
          </aside>

        </div>


        <?php
        $db = Database::connect();
        ?>

        <div class="card w-75" style="width: 18rem;">
          <div class="row">
            <div class="col-sm-8">
              <img src="images/b1.png" class="card-img-top" alt="..." id="b1">
            </div>
            <div class="col-sm-4 description">
              Burger 1
               <footer class="blockquote-footer"> à emporter </footer>
            </div>
          </div>

          <div class="card-body">
            <ul class="list-group list-group-flush">
              <li class="list-group-item">Bleu <a href="#" class="btn btn-secondary"> <i class="fas fa-plus" style="text-align:right"></i> Ajouter </a></li>
              <li class="list-group-item">Saignant  <a href="#" class="btn btn-secondary"> <i class="fas fa-plus"></i> Ajouter </a></li>
              <li class="list-group-item">A point <a href="#" class="btn btn-secondary"> <i class="fas fa-plus"></i> Ajouter </a></li>
              <li class="list-group-item">Bien cuit <a href="#" class="btn btn-secondary"> <i class="fas fa-plus"></i> Ajouter </a></li>
              <li class="list-group-item"><i class="fas fa-share-alt" ></i> Partager </li>
            </ul>
          </div>
        </div>
      </div>
    </div>





<!--div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="images/b1.png" alt="First slide">
          <h5> burger 1</h5>
          <p> description inutile </p>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/b2.png" alt="Second slide">
          <h5> burger 2</h5>
          <p> description inutile </p>
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="images/b3.png" alt="Third slide">
          <h5> burger 3</h5>
          <p> description inutile </p>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
</div-->



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>


  </html>
