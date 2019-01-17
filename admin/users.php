<?php
require '../includes/fonctions.php';
$groupes=array(1);
if(!fonctions::access_check($groupes)){
  header('Location:admin.php');
}
?>
<!DOCTYPE html>
<html>
  <?php require '../includes/head.php'; ?>
  <body>
    <?php require '../includes/header.php'; ?>

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
                require '../includes/database.php';

                $db = Database::connect();
                $statement = $db->query("SELECT user.id AS idusr,login,libelle FROM user INNER JOIN groupe ON (groupe.id = user.groupe_id) ORDER BY user.id");
                while ($item = $statement->fetch()) {
              ?>
              <tr id=<?php echo "user-".$item['idusr']; ?>>
                <th scope="row"><?php echo $item['idusr']; ?></th>
                <td class="info"><?php echo $item['login']; ?></td>
                <td class="update update-login" style="display: none;"><input type="text" value=<?php echo $item['login']; ?>></td>
                <td class="info"><?php echo $item['libelle']; ?></td>
                <td class="update update-group" style="display: none;">
                  <select>
                    <?php
                      $statement2 = $db->query("SELECT * FROM groupe");
                      while ($grp = $statement2->fetch()) {
                    ?>
                      <option value=<?php echo $grp['id']; ?>><?php echo $grp['libelle']; ?></option>
                    <?php } ?>
                  </select>
                </td>
                <td>
                  <button type="button" class="btn btn-warning info" onclick=<?php echo "update_user(".$item['idusr'].");"; ?>><i class="fas fa-users"></i> Modifier</button>
                  <button href=<?php echo "#modal".$item['idusr']; ?> type="button" class="btn btn-danger" data-toggle="modal"><i class="fas fa-user-minus"></i> Supprimer</button>
                </td>
              </tr>

              <!-- Modal HTML -->
              <div id=<?php echo "modal".$item['idusr']; ?> class="modal fade">
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
                Database::disconnect();
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    <?php require '../includes/footer.php'; ?>
    <script src="../script/updateuser.js"></script>
  </body>
</html>