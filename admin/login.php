<?php
require '../includes/database.php';
require '../classes/user.php';
$db = Database::connect();
session_start();
if(!empty($_SESSION['user'])){
  header("Location:admin.php");
}else{
  if (!empty($_POST)) {
    if (!empty($_POST['login']) && !empty($_POST['pwd'])) {
      $err=user::login($_POST['login'],$_POST['pwd']);
      if(empty($err) && session_status()==2){
        header("Location:admin.php");
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>
  <?php include '../includes/head.php' ?>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-6 offset-3">
          <div class="jumbotron">
            <h1 class="display-4 text-center">Connexion à l'administration</h1>
            <?php if (session_status()!=2 && !empty($_POST)) { ?>
            <div class="alert alert-danger text-center" role="alert">
              <?php if(isset($err)){
                echo $err;
              }else{
                echo "Login ou mot de passe incorrect !";
              } ?>
            </div>
            <?php } ?>
            <hr class="my-4">
            <form method="post">
              <div class="form-group">
                <label for="login">Login</label>
                <input type="text" class="form-control" name="login" placeholder="Enter login" required>
              </div>
              <div class="form-group">
                <label for="pwd">Password</label>
                <input type="password" class="form-control" name="pwd" required>
              </div>
              <div class="form-actions text-center">
              <button type="submit" class="btn btn-success">Connexion</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  include '../includes/footer.php';
  ?>
    </body>
</html>
