<?php
require '../classes/groupe.php';
require '../classes/user.php';
require '../classes/commande.php';
require '../includes/fonctions.php';
require '../includes/database.php';
$db = Database::connect();
$groupes=array(new groupe(1),new groupe(2));
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
        <div class="col-9">
          <h1>Gestion des commandes</h1>
        </div>
        <div class="col-3 text-right align-self-center">
          <button type="button" class="btn btn-success" onclick="location.reload();"><i class="fas fa-sync-alt"></i> Actualiser</button>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Date création</th>
                <th scope="col">Date livraison</th>
                <th scope="col">Type</th>
                <th scope="col">Paiement</th>
                <th scope="col">État</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $commandes=commande::getAllCommande();

                foreach($commandes as $cmd) {
              ?>
              <tr id=<?php echo "cmd-".$cmd['id']; ?>>
                <th scope="row"><?php echo $cmd['id']; ?></th>
                <td class="info"><?php echo $cmd['datetime_creation']; ?></td>
                <td class="info"><?php echo $cmd['datetime_livraison']; ?></td>
                <td class="info"><?php echo $cmd['type']; ?></td>
                <td class="info"><?php echo $cmd['paiement']; ?></td>
                <td class="info"><?php echo $cmd['etat']; ?></td>
                <td>
                  <a type="button" class="btn btn-info info" href=<?php echo 'commandview.php?id='.$cmd['id']; ?>><i class="fas fa-eye"></i> Détails</a>
                </td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php include '../includes/footer.php'; ?>
  </body>
</html>
