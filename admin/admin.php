<?php
require_once '../classes/user.php';
session_start();
if(empty($_SESSION['user'])){
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html>
  <?php include '../includes/head.php'; ?>
  <body>
    <?php include '../includes/header.php'; ?>

    <section class="container">
      <div class="row">
        <div class="col-12 col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Commandes en cours</h5>
              <p class="card-text">Accéder au panel de gestion des commandes en cours</p>
              <div class="text-center">
                <a href="commandes.php" class="btn btn-primary">Pannel commande</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Produits & Catégories</h5>
              <p class="card-text">Accéder au panel de gestion des produits et catégories</p>
              <div class="text-center">
                <a href="produits.php" class="btn btn-primary">Pannel produit</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Menus</h5>
              <p class="card-text">Accéder au panel de gestion des menus</p>
              <div class="text-center">
                <a href="menus.php" class="btn btn-primary">Pannel menu</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Utilisateurs</h5>
              <p class="card-text">Accéder au panel de gestion des utilisateurs</p>
              <div class="text-center">
                <a href="users.php" class="btn btn-primary">Pannel utilisateurs</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php require '../includes/footer.php'; ?>
  </body>
</html>
