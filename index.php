<!doctype html>
<html lang="en">


<?php
require "includes/head2.php";
require "includes/database.php";


?>

<body>


  <div id="sideNavigation" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#">Menus</a>
    <a href="#">Pizzas</a>
    <a href="#">Accompagnements</a>
    <a href="#">Salades</a>
    <a href="#">Desserts</a>

  </div>

  <nav class="topnav">
    <a href="#" onclick="openNav()">
      <svg width="30" height="30" id="icoOpen">
          <path d="M0,5 30,5" stroke="#000" stroke-width="5"/>
          <path d="M0,14 30,14" stroke="#000" stroke-width="5"/>
          <path d="M0,23 30,23" stroke="#000" stroke-width="5"/>
      </svg>
    </a>
  </nav>

  <div id="main">
  <!-- Add all your websites page content here  -->
  </div>



  <div class="container" id="divGeneral">

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

      <!--  MENU CATEGORY -->
      <a class="nav-link" href="#"><h2>Nos Menus </h2> </a>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-4">
                <img class="d-block w-100" src="images/b1.png" alt="">
              </div>
              <div class="col-md-4">
                <img class="d-block w-100" src="images/b2.png" alt="">
              </div>
              <div class="col-md-4">
                <img class="d-block w-100" src="images/b3.png" alt="">
              </div>
            </div>  </div>
            <div class="carousel-item">
              <div class="row">
                <div class="col-md-4">
                  <img class="d-block w-100" src="images/b4.png" alt="">
                </div>
                <div class="col-md-4">
                  <img class="d-block w-100" src="images/b5.png" alt="">
                </div>
                <div class="col-md-4">
                  <img class="d-block w-100" src="images/b6.png" alt="">
                </div>
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
        </div>


        <br/>
        <hr/>

        <!--  SIDES CATEGORY -->
        <a class="nav-link" href="#"><h2>Nos Accompagnements </h2> </a>

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="row">
                <div class="col-md-4">
                  <img class="d-block w-100" src="images/b1.png" alt="">
                </div>
                <div class="col-md-4">
                  <img class="d-block w-100" src="images/b2.png" alt="">
                </div>
                <div class="col-md-4">
                  <img class="d-block w-100" src="images/b3.png" alt="">
                </div>
              </div>  </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-md-4">
                    <img class="d-block w-100" src="images/b4.png" alt="">
                  </div>
                  <div class="col-md-4">
                    <img class="d-block w-100" src="images/b5.png" alt="">
                  </div>
                  <div class="col-md-4">
                    <img class="d-block w-100" src="images/b6.png" alt="">
                  </div>
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
          </div>

          <br/>
          <hr/>

          <!--  DRINK CATEGORY -->
          <a class="nav-link" href="#"><h2>Nos Boissons </h2> </a>

          <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-md-4">
                    <img class="d-block w-100" src="images/b1.png" alt="">
                  </div>
                  <div class="col-md-4">
                    <img class="d-block w-100" src="images/b2.png" alt="">
                  </div>
                  <div class="col-md-4">
                    <img class="d-block w-100" src="images/b3.png" alt="">
                  </div>
                </div>  </div>
                <div class="carousel-item">
                  <div class="row">
                    <div class="col-md-4">
                      <img class="d-block w-100" src="images/b4.png" alt="">
                    </div>
                    <div class="col-md-4">
                      <img class="d-block w-100" src="images/b5.png" alt="">
                    </div>
                    <div class="col-md-4">
                      <img class="d-block w-100" src="images/b6.png" alt="">
                    </div>
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
            </div>

            <br/>
            <hr/>

            <!--  DESSERT CATEGORY -->
            <a class="nav-link" href="#"><h2>Nos Desserts </h2> </a>

            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <div class="row">
                    <div class="col-md-4">
                      <img class="d-block w-100" src="images/b1.png" alt="">
                    </div>
                    <div class="col-md-4">
                      <img class="d-block w-100" src="images/b2.png" alt="">
                    </div>
                    <div class="col-md-4">
                      <img class="d-block w-100" src="images/b3.png" alt="">
                    </div>
                  </div>  </div>
                  <div class="carousel-item">
                    <div class="row">
                      <div class="col-md-4">
                        <img class="d-block w-100" src="images/b4.png" alt="">
                      </div>
                      <div class="col-md-4">
                        <img class="d-block w-100" src="images/b5.png" alt="">
                      </div>
                      <div class="col-md-4">
                        <img class="d-block w-100" src="images/b6.png" alt="">
                      </div>
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
              </div>

              <hr/>
              <br/>

              <!--  PIZZA CATEGORY -->
              <a class="nav-link" href="#"><h2>Nos Pizzas </h2> </a>

              <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <div class="row">
                      <div class="col-md-4">
                        <img class="d-block w-100" src="images/b1.png" alt="">
                      </div>
                      <div class="col-md-4">
                        <img class="d-block w-100" src="images/b2.png" alt="">
                      </div>
                      <div class="col-md-4">
                        <img class="d-block w-100" src="images/b3.png" alt="">
                      </div>
                    </div>  </div>
                    <div class="carousel-item">
                      <div class="row">
                        <div class="col-md-4">
                          <img class="d-block w-100" src="images/b4.png" alt="">
                        </div>
                        <div class="col-md-4">
                          <img class="d-block w-100" src="images/b5.png" alt="">
                        </div>
                        <div class="col-md-4">
                          <img class="d-block w-100" src="images/b6.png" alt="">
                        </div>
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
                </div>


                <?php
                require "script/script.js";
                require "includes/footer.php";
                ?>

              </div>
            </body>


            </html>
