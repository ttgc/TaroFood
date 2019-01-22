<?php
require '../classes/groupe.php';
require '../classes/user.php';
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
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $users=user::getAllUsers();

                foreach($users as $user) {
                  $group=new groupe($user['groupe_id']);
              ?>
              <tr id=<?php echo "user-".$user['id']; ?>>
                <th scope="row"><?php echo $user['id']; ?></th>
                <td class="info"><?php echo $user['login']; ?></td>
                <td class="info"><?php echo $group->lib; ?></td>
                <td>
                  <?php if ($user['id'] == $_SESSION['user']->id) { ?>
                    <button type="button" class="btn btn-warning info" disabled><i class="fas fa-users"></i> Modifier</button>
                    <button type="button" class="btn btn-danger" disabled><i class="fas fa-user-minus"></i> Supprimer</button>
                  <?php } else { ?>
                    <a type="button" class="btn btn-warning info" href=<?php echo 'updateuser.php?login='.$user['login']; ?>><i class="fas fa-users"></i> Modifier</a>
                    <button href=<?php echo "#modal".$user['id']; ?> type="button" class="btn btn-danger" data-toggle="modal"><i class="fas fa-user-minus"></i> Supprimer</button>
                  <?php } ?>
                </td>
              </tr>

              <!-- Modal HTML -->
              <div id=<?php echo "modal".$user['id']; ?> class="modal fade">
              	<div class="modal-dialog modal-confirm">
              		<div class="modal-content">
              			<div class="modal-header">
              				<div class="icon-box">
              					<i class="material-icons">&#xE5CD;</i>
              				</div>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              			</div>
                    <br/>
              			<div class="modal-body">
                      <h4 class="modal-title">Êtes vous sûr ?</h4>
                      <br/>
              				<p>Voulez vous vraiment supprimer <?php echo $user['login'];?> ? Cette action ne pourra pas être annulée</p>
              			</div>
                    <br/>
              			<div class="modal-footer" style="justify-content: center;">
              				<button type="button" class="btn btn-info" data-dismiss="modal"><i class="fas fa-times"></i> Annuler</button>
              				<button type="submit" class="btn btn-danger" data-dismiss="modal" onclick=<?php echo "$.post('users.php',{delete:".$user['id']."},function(){location.reload();});"; ?>><i class="fas fa-trash-alt"></i> Supprimer</button>
              			</div>
              		</div>
              	</div>
              </div>
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
