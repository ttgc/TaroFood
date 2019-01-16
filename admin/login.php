<?php
require 'includes/database.php';
require '../classes/user.php';
$db = Database::connect();
if (!empty($_POST)) {
  if (!empty($_POST['mail']) && !empty($_POST['pwd'])) {
    user::login($_POST['mail'],$_POST['pwd']);
  }
}

Database::disconnect();
?>

<!DOCTYPE html>
<html>
  <?php include 'includes/head.php' ?>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-6 offset-3">
          <div class="jumbotron">
            <h1 class="display-4 text-center">Connexion à l'administration</h1>
            <?php if (session_status()!=2) { ?>
            <div class="alert alert-danger text-center" role="alert">
              Login ou mot de passe incorrect !
            </div>
            <?php } ?>
            <hr class="my-4">
            <form method="post">
              <div class="form-group">
                <label for="mail">Email address</label>
                <input type="email" class="form-control" id="mail" placeholder="Enter email" required>
              </div>
              <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" id="pwd" placeholder="Password" required>
              </div>
              <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Connexion</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <!--JQuery-->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
