<?php
require '../classes/groupe.php';
require '../classes/user.php';
require '../classes/commande.php';
require '../classes/client.php';
require '../classes/type.php';
require '../classes/etat.php';
require '../includes/fonctions.php';
require '../includes/database.php';
$db = Database::connect();
$groupes=array(new groupe(1),new groupe(2));
if(!fonctions::access_check($groupes)){
  header('Location:admin.php');
}

if (empty($_GET) || empty($_GET['id'])) {
  header('Location:commandes.php');
}

$cmd = new commande($_GET['id']);
if (!empty($_POST)) {
  $cmd->updateState($_POST['state']);
  $cmd->etat_id = $_POST['state'];
}
$client = new client($cmd->client_id);
$type = new type($cmd->type_id);
$etat = new etat($cmd->etat_id);
?>

<!DOCTYPE html>
<html>
  <?php include '../includes/head.php'; ?>
  <body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
      <div class="jumbotron row" style="padding: 30px;">
        <div class="col-3 align-self-center">
          <a type="button" class="btn btn-success" href="commandes.php"><i class="fas fa-arrow-alt-circle-left"></i> Retour</a>
        </div>
        <div class="col-6 text-center">
          <h1>Gestion des commandes</h1>
        </div>
        <div class="col-3 text-right align-self-center">
          <button type="button" class="btn btn-success" onclick="location.reload();"><i class="fas fa-sync-alt"></i> Actualiser</button>
        </div>
      </div>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Détails de la commande</h5>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Date création</th>
                    <th scope="col">Date livraison</th>
                    <th scope="col">Total</th>
                    <th scope="col">Addresse</th>
                  </tr>
                </thead>
                <tbody class="table-valign-center">
                  <tr>
                    <th scope="row"><?php echo $_GET['id']; ?></th>
                    <td class="info"><?php echo $cmd->date_creation; ?></td>
                    <td class="info"><?php echo $cmd->date_livraison; ?></td>
                    <td class="info"><?php echo $cmd->total; ?></td>
                    <td class="info"><?php echo $cmd->rue.'<br/>'.$cmd->cp.' '.$cmd->ville; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Détails du client</h5>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Prénom</th>
                    <th scope="col">Email</th>
                    <th scope="col">Téléphone</th>
                    <th scope="col">Newsletter</th>
                  </tr>
                </thead>
                <tbody class="table-valign-center">
                  <tr>
                    <th scope="row"><?php echo $client->id; ?></th>
                    <td class="info"><?php echo $client->nom; ?></td>
                    <td class="info"><?php echo $client->prenom; ?></td>
                    <td class="info"><?php echo $client->email; ?></td>
                    <td class="info"><?php echo $client->tel; ?></td>
                    <td class="info"><?php if ($client->abo) {echo 'Oui';} else {echo 'Non';} ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Type de commande</h5>
              <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Libelle</th>
                  </tr>
                </thead>
                <tbody class="table-valign-center">
                  <tr>
                    <th scope="row"><?php echo $type->id; ?></th>
                    <td class="info"><?php echo $type->lib; ?></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="col-12 col-sm-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">État de la commande</h5>
              <form method="post">
                <table class="table">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Libelle</th>
                      <th scope="col">Mettre à jour</th>
                    </tr>
                  </thead>
                  <tbody class="table-valign-center">
                    <tr>
                      <th scope="row"><?php echo $etat->id; ?></th>
                      <td class="info">
                        <select name="state" class="form-control">
                          <?php
                            $states=etat::getAllEtat();
                            foreach ($states as $s) {
                          ?>
                          <option value="<?php echo $s['id'];?>" <?php if ($s['id'] == $etat->id) {echo 'selected';} ?>><?php echo $s['libelle']; ?></option>
                          <?php
                            }
                          ?>
                        </select>
                      <td class="info">
                        <button type="submit" class="btn btn-success"><i class="fas fa-sync-alt"></i> Mettre à jour</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php include '../includes/footer.php'; ?>
  </body>
</html>
