<?php
require '../classes/groupe.php';
require '../classes/user.php';
require '../classes/categorie.php';
require '../classes/sscategorie.php';
require '../classes/produit.php';
require '../classes/option.php';
require '../includes/fonctions.php';
require '../includes/database.php';
$db = Database::connect();
$groupes=array(new groupe(1));
if(!fonctions::access_check($groupes)){
  header('Location:admin.php');
}
?>
<!DOCTYPE html>
<html>
  <?php include '../includes/head.php'; ?>
  <body>
    <?php include '../includes/header.php'; ?>
    <div class="container">
      <div class="jumbotron row" style="padding: 30px;">
        <div class="col-5">
          <h1>Gestion des menus</h1>
        </div>
        <div class="col-7 text-right align-self-center">
          <a href="" class="btn btn-success"><i class="fas fa-plus"></i> Menu</a>
        </div>
      </div>
      <div class="row">
        <table class="table table-striped table-bordered" id="menus">
            <thead class="thead-dark">
                <tr>
                    <th>Menus</th>
                    <th>ID</th>
                    <th>Libelle</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
      </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="../script/subtables.js"></script>
  </body>
</html>