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
      <div class="row">
        <div class="col-12">
            <div class="row">
                <table class="table table-striped table-bordered" id="categories">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Libelle</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $categories = categorie::getAllCat();
                        foreach($categories as $cat){
                    ?>
                        <tr>
                                <td><?php echo $cat['id']; ?></td>
                                <td><?php echo $cat['libelle']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-warning info" onclick="display_subtable('#sscategories-<?php echo $cat['id']?>')"><i class="fas fa-users"></i> Modifier</button>
                                    <button type="button" class="btn btn-danger info"><i class="fas fa-user-minus"></i> Supprimer</button>
                                </td>
                        </tr>
                        <tr class="subtable" id="sscategories-<?php echo $cat['id']?>">
                            <td></td>
                            <td></td>
                            <td>
                                <table class="table table-bordered" >
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>ID</th>
                                            <th>Libelle</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $sscategories = sscategorie::getSSCat($cat['id']);
                                        foreach($sscategories as $sscat){
                                    ?>
                                        <tr>
                                            <td><?php echo $sscat['id']; ?></td>
                                            <td><?php echo $sscat['libelle']; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning info" onclick="display_subtable('#produits-<?php echo $cat['id']?>')"><i class="fas fa-users"></i> Modifier</button>
                                                <button type="button" class="btn btn-danger info"><i class="fas fa-user-minus"></i> Supprimer</button>
                                            </td>
                                        </tr>
                                        <tr class="subtable" id="produits-<?php echo $sscat['id']?>">
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <table class="table table-bordered" >
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Libelle</th>
                                                            <th>Prix</th>
                                                            <th>Image</th>
                                                            <th>Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $produits = produit::getProduitCat($sscat['id']);
                                                        foreach($produits as $prd){
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $prd['id']; ?></td>
                                                            <td><?php echo $prd['libelle']; ?></td>
                                                            <td><?php echo $prd['prix']; ?></td>
                                                            <td><?php echo $prd['image']; ?></td>
                                                            <td>
                                                                <button type="button" class="btn btn-warning info"><i class="fas fa-users"></i> Modifier</button>
                                                                <button type="button" class="btn btn-danger info"><i class="fas fa-user-minus"></i> Supprimer</button>
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
    </div>
    <?php include '../includes/footer.php'; ?>
    <script src="../script/subtables.js"></script>
  </body>
</html>
