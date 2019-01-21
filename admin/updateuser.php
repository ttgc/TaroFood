<?php
require '../classes/groupe.php';
require '../classes/user.php';
require '../includes/fonctions.php';
require '../includes/database.php';
$db = Database::connect();
$groupes=array(new groupe(1));
if(!fonctions::access_check($groupes)){
  header('Location:admin.php');
}

$update = false;
if (!empty($_GET['login'])) {
  $usr=user::getUser($_GET['login']);
  if ($usr != null) {
    $update = true;
  }else{
    header('Location:users.php');
  }
}

if (!empty($_POST)) {
  if ($update) {
    $user=user::getUser($_GET['login']);
    $user->login=$_POST['login'];
    $user->groupe=$_POST['groupe'];
    user::updateUser($user);
    if($user->id=$_SESSION['user']->id){
      user::login($user->login,$user->mdp);
    }
  }else{
    user::insertUser($_POST['login'],password_hash($_POST['pwd'],PASSWORD_DEFAULT),$_POST['groupe']);
  }
  header('Location:users.php');
}
?>
<!DOCTYPE html>
<html>
  <?php include '../includes/head.php'; ?>
  <body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
      <div class="row">
        <div class="col-4 offset-4">
          <form method="post">
            <div class="form-group">
              <label for="login">Login</label>
              <input type="text" class="form-control" name="login" id="login" <?php if ($update) {echo 'value='.$usr->login;} ?>>
            </div>
            <div class="form-group">
              <label for="group">Groupe</label>
              <select class="form-control" name="groupe" id="groupe" <?php if ($update) {echo 'value='.$usr->groupe;} ?>>
                <?php
                  $groupes=groupe::getAllGroupes();
                  foreach($groupes as $groupe) {
                ?>
                  <option value=<?php echo $groupe['id']; ?>><?php echo $groupe['libelle']; ?></option>
                <?php } ?>
              </select>
            </div>
            <?php if (!$update) { ?>
              <div class="alert alert-danger" id="alert" role="alert" style="display: none;">
                Les mots de passes ne correspondent pas !
              </div>
              <div class="form-group">
                <label for="pwd">Mot de passe</label>
                <input type="password" class="form-control" id="pwd" name="pwd">
              </div>
              <div class="form-group">
                <label for="confirm-pwd">Confirmation du mot de passe</label>
                <input type="password" class="form-control" id="confirm-pwd" name="confirm-pwd">
              </div>
            <?php } ?>
            <button type="submit" id="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
            <a href="users.php" class="btn btn-danger"><i class="fas fa-times"></i> Annuler</a>
          </form>
        </div>
      </div>
    </div>

    <?php include '../includes/footer.php'; ?>
    <script src="../script/checkpwduser.js"></script>
  </body>
</html>
