<?php
require '../classes/groupe.php';
require '../classes/user.php';
require '../classes/commande.php';
require '../classes/client.php';
require '../classes/etat.php';
require '../classes/type.php';
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
        <div class="col-8">
          <h1>Gestion des commandes</h1>
        </div>
        <div class="col-4 text-right align-self-center">
          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-filtre"><i class="fas fa-filter"></i> Filtrer</button>
          <button type="button" class="btn btn-success" onclick="location.reload();"><i class="fas fa-sync-alt"></i> Actualiser</button>
        </div>

        <!--modal-->
        <div class="modal fade" id="modal-filtre" tabindex="-1" role="dialog">
          <div class="modal-dialog" role="document">
            <form method="get">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Filtrer par...</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label for="client">Client</label>
                    <select class="form-control" id="client" name="client">
                      <?php
                        $clients = client::getAllClient();
                        foreach($clients as $cl) {
                      ?>
                        <option value=<?php echo $cl['id']; ?>><?php echo $cl['nom'].' '.$cl['prenom']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="etat">État de la commande</label>
                    <select class="form-control" id="etat" name="etat">
                      <?php
                        $etats = etat::getAllEtat();
                        foreach($etats as $e) {
                      ?>
                        <option value=<?php echo $e['id']; ?>><?php echo $e['libelle']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="type">Type de commande</label>
                    <select class="form-control" id="type" name="type">
                      <?php
                        $types = type::getAllTypes();
                        foreach($types as $t) {
                      ?>
                        <option value=<?php echo $t['id']; ?>><?php echo $t['libelle']; ?></option>
                      <?php
                        }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <a href="commandes.php" type="button" class="btn btn-dark"><i class="fas fa-undo-alt"></i> Reset filtres</a>
                  <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
                  <button type="submit" class="btn btn-success"><i class="fas fa-filter"></i> Filtrer</button>
                </div>
              </div>
            </form>
          </div>
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
                if (empty($_GET)) {
                  $commandes=commande::getAllCommande();
                } else {
                  $cli=null;
                  $state=null;
                  $typ=null;
                  if (!empty($_GET['client'])) {
                    $cli=$_GET['client'];
                  }
                  if (!empty($_GET['etat'])) {
                    $state=$_GET['etat'];
                  }
                  if (!empty($_GET['type'])) {
                    $typ=$_GET['type'];
                  }
                  $commandes=commande::getCommande($cli,$state,$typ);
                }

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
