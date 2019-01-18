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
?>
<!DOCTYPE html>
<html>
  <?php include '../includes/head.php'; ?>
  <body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
      <div class="row">
      </div>
      <div class="row">
        <div class="col-12">
          <table class="table">
            <thead class="thead-dark">
              <tr>
                <th scope="col">ID</th>
                <th scope="col">Login</th>
                <th scope="col">Groupe</th>
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
                  <button type="button" class="btn btn-warning info" onclick=<?php echo "update_user(".$user['id'].");"; ?>><i class="fas fa-users"></i> Modifier</button>
                  <button href=<?php echo "#modal".$user['id']; ?> type="button" class="btn btn-danger" data-toggle="modal"><i class="fas fa-user-minus"></i> Supprimer</button>
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
              				<h4 class="modal-title">Are you sure?</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              			</div>
              			<div class="modal-body">
              				<p>Do you really want to delete these records? This process cannot be undone.</p>
              			</div>
              			<div class="modal-footer">
              				<button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
              				<button type="button" class="btn btn-danger">Delete</button>
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
