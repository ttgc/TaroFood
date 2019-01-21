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
          <h1>Gestion des produits</h1>
        </div>
        <div class="col-7 text-right align-self-center">
          <a href="produits_process.php?mode=insert&type=categorie" class="btn btn-success"><i class="fas fa-plus"></i> Catégorie</a>
          <a href="produits_process.php?mode=insert&type=sscategorie" class="btn btn-success"><i class="fas fa-plus"></i> Sous-Catégorie</a>
          <a href="produits_process.php?mode=insert&type=produit" class="btn btn-success"><i class="fas fa-plus"></i> Produit</a>
          <a href="produits_process.php?mode=insert&type=option" class="btn btn-success"><i class="fas fa-plus"></i> Option</a>
        </div>
      </div>
      <div class="row">
        <table class="table table-striped table-bordered" id="categories">
            <thead class="thead-dark">
                <tr>
                    <th>Catégories</th>
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
                        <td><button class ="btn subtable-btn" id="sscategories-<?php echo $cat['id']?>"><i class="fas fa-plus"></i></button></td>
                        <td><?php echo $cat['id']; ?></td>
                        <td><?php echo $cat['libelle']; ?></td>
                        <td>
                            <a href="produits_process.php?mode=update&type=categorie&id=<?php echo $cat['id']; ?>" class="btn btn-primary info"><i class="fas fa-pen"></i></a>
                            <a href="produits_process.php?mode=delete&type=categorie&id=<?php echo $cat['id']; ?>" class="btn btn-danger info"><i class="fas fa-trash"></i></a>
                        </td>
                </tr>
                <tr id="sscategories-<?php echo $cat['id']?>" style="display:none">
                    <td colspan="4">
                        <table class="table" >
                            <thead class="thead-dark">
                                <tr>
                                    <th>Sous-catégories de <?php echo $cat['libelle']; ?></th>
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
                                    <td><button class="btn subtable-btn" id="produits-<?php echo $sscat['id']?>"><i class="fas fa-plus"></i></button></td>
                                    <td><?php echo $sscat['id']; ?></td>
                                    <td><?php echo $sscat['libelle']; ?></td>
                                    <td>
                                        <a href="produits_process.php?mode=update&type=sscategorie&id=<?php echo $sscat['id']; ?>" class="btn btn-primary info"><i class="fas fa-pen"></i></a>
                                        <a href="produits_process.php?mode=delete&type=sscategorie&id=<?php echo $sscat['id']; ?>" class="btn btn-danger info"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr id="produits-<?php echo $sscat['id']?>" style="display:none">
                                    <td colspan="4">
                                        <table class="table" >
                                            <thead class="thead-dark">
                                                <tr>
                                                    <th>Produits de type <?php echo $sscat['libelle']; ?></th>
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
                                                    <td><button class ="btn subtable-btn" id="options-<?php echo $prd['id']?>"><i class="fas fa-plus"></i></button></td> 
                                                    <td><?php echo $prd['id']; ?></td>
                                                    <td><?php echo $prd['libelle']; ?></td>
                                                    <td><?php echo $prd['prix']; ?></td>
                                                    <td><?php echo $prd['image']; ?></td>
                                                    <td>
                                                        <a href="produits_process.php?mode=update&type=produit&id=<?php echo $prd['id']; ?>" class="btn btn-primary info"><i class="fas fa-pen"></i></a>
                                                        <a href="produits_process.php?mode=delete&type=produit&id=<?php echo $prd['id']; ?>" class="btn btn-danger info"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <tr id="options-<?php echo $prd['id']?>" style="display:none">
                                                    <td colspan="6">
                                                        <table class="table" >
                                                            <thead class="thead-dark">
                                                                <tr>
                                                                    <th>Options du produit <?php echo $prd['libelle']; ?></th>
                                                                    <th>ID</th>
                                                                    <th>Libelle</th>
                                                                    <th>Actions</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            <?php
                                                                $options = option::getOptions($prd['id']);
                                                                foreach($options as $option){
                                                                $opt=new option($option['option_id']);
                                                            ?>
                                                                <tr>
                                                                    <td></td> 
                                                                    <td><?php echo $opt->id; ?></td>
                                                                    <td><?php echo $opt->lib; ?></td>
                                                                    <td>
                                                                        <a href="produits_process.php?mode=delier&type=option&id=<?php echo $prd['id']; ?>&opt_id=<?php echo $opt->id; ?>" class="btn btn-danger"><i class="fas fa-minus"></i></a>
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
