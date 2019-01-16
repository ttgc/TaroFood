<!doctype html>
<html lang="en">


<?php
require "includes/head2.php";
require "includes/database.php";



?>

<body>


  <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropDown" aria-expanded="false" aria-label="Toggle navigation">
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


        <!--?php
        $db = Database::connect();
        ?-->

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

<br/>


<div class="container">
    <div id="carouselExample" class="carousel slide" data-ride="carousel" data-interval="9000">
        <div class="carousel-inner row w-100 mx-auto" role="listbox">
            <div class="carousel-item col-md-3  active">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 1" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="images/b1" alt="slide 1">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 3" class="thumb">
                     <img class="img-fluid mx-auto d-block" src="images/b2.png" alt="slide 2">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 4" class="thumb">
                     <img class="img-fluid mx-auto d-block" src="images/b3.png" alt="slide 3">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
                <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 5" class="thumb">
                     <img class="img-fluid mx-auto d-block" src="images/b4.png" alt="slide 4">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
              <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 6" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="images/b5.png" alt="slide 5">
                    </a>
                  </div>
                </div>
            </div>
            <div class="carousel-item col-md-3 ">
               <div class="panel panel-default">
                  <div class="panel-thumbnail">
                    <a href="#" title="image 7" class="thumb">
                      <img class="img-fluid mx-auto d-block" src="images.b6.png" alt="slide 6">
                    </a>
                  </div>
                </div>
            </div>

        </div>
        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next text-faded" href="#carouselExample" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
</div>



<?php
//  require "script/script.js";
require "includes/footer.php";
  ?>


  </body>


  </html>
