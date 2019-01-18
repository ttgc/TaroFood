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
  }
}
?>
<!DOCTYPE html>
<html>
  <?php include '../includes/head.php'; ?>
  <body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
      <div class="row">
        <div class="col-12">
          <form method="post">
            <div class="form-group">
              <label for="login">Login</label>
              <input type="text" class="form-control" id="login" value="">
            </div>
            <div class="form-group">
              <label for="group">Groupe</label>
              <select class="form-control" id="group">
                <?php
                  $groupes=groupe::getAllGroupes();
                  foreach($groupes as $groupe) {
                ?>
                  <option value=<?php echo $groupe['id']; ?>><?php echo $groupe['libelle']; ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
            <a href="users.php" class="btn btn-danger"><i class="fas fa-times"></i> Annuler</a>
          </form>
        </div>
      </div>
    </div>

    <?php include '../includes/footer.php'; ?>
  </body>
</html>
