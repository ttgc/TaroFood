<?php
require '../classes/groupe.php';
require '../classes/user.php';
require '../classes/produit.php';
require '../classes/menu.php';
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
            <?php
                $menus = menu::getAllMenus();
                foreach($menus as $menu){
            ?>
                <tr>
                        <td><button class ="btn subtable-btn" id="produits-<?php echo $menu['id']?>"><i class="fas fa-plus"></i></button></td>
                        <td><?php echo $menu['id']; ?></td>
                        <td><?php echo $menu['libelle']; ?></td>
                        <td><?php echo $menu['prix']; ?></td>
                        <td>
                            <a href="menus_process.php?mode=update&type=menu&id=<?php echo $menu['id']; ?>" class="btn btn-primary"><i class="fas fa-pen"></i></a>
                            <a href="menus_process.php?mode=delete&type=menu&id=<?php echo $menu['id']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        </td>
                </tr>
                <tr id="produits-<?php echo $menu['id']?>" style="display:none">
                    <td colspan="5">
                        <table class="table" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Produit du menu <?php echo $menu['libelle']; ?></th>
                                    <th>ID</th>
                                    <th>Libelle</th>
                                    <th>Prix</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                              $produits_menu = produit::getProduitMenu($menu['id']);
                              foreach($produits_menu as $prd_menu){
                                $prd=new produit($prd_menu['produit_id']);
                                ?>
                                  <tr>
                                      <td></td>
                                      <td><?php echo $prd->id; ?></td>
                                      <td><?php echo $prd->lib; ?></td>
                                      <td><?php echo $prd->prix; ?></td>
                                      <td><?php echo $prd->image; ?></td>
                                      <td>
                                          <a href="menus_process.php?mode=delier&type=produit&id=<?php echo $menu['id']; ?>&prd_id=<?php echo $prd->id; ?>" class="btn btn-danger"><i class="fas fa-unlink"></i></a>
                                      </td>
                                  </tr>
                                <?php
                                  }
                              ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            <?php
                }
            ?>
            </tbody>
        </table>
      </div>
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="../script/subtables.js"></script>
  </body>
</html>