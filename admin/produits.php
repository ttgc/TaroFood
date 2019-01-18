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
        <table class="table table-striped" id="categories">
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
                        <td><button class ="btn" onclick="display_subtable('#sscategories-<?php echo $cat['id']?>')"><i class="fas fa-plus"></i></button></td>
                        <td><?php echo $cat['id']; ?></td>
                        <td><?php echo $cat['libelle']; ?></td>
                        <td>
                            <button type="button" class="btn btn-primary info"><i class="fas fa-pen"></i></button>
                            <a href="produits_process.php?mode=delete&type=categorie&id=<?php echo $cat['id']; ?>" class="btn btn-danger info"><i class="fas fa-trash"></i></a>
                        </td>
                </tr>
                <tr class="subtable" id="sscategories-<?php echo $cat['id']?>">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
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
                                    <td><button class ="btn" onclick="display_subtable('#produits-<?php echo $sscat['id']?>')"><i class="fas fa-plus"></i></button></td>
                                    <td><?php echo $sscat['id']; ?></td>
                                    <td><?php echo $sscat['libelle']; ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary info"><i class="fas fa-pen"></i></button>
                                        <a href="produits_process.php?mode=delete&type=sscategorie&id=<?php echo $sscat['id']; ?>" class="btn btn-danger info"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                <tr class="subtable" id="produits-<?php echo $sscat['id']?>">
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>
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
                                                    <td><button class ="btn" onclick="display_subtable('#options-<?php echo $prd['id']?>')"><i class="fas fa-plus"></i></button></td> 
                                                    <td><?php echo $prd['id']; ?></td>
                                                    <td><?php echo $prd['libelle']; ?></td>
                                                    <td><?php echo $prd['prix']; ?></td>
                                                    <td><?php echo $prd['image']; ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary info"><i class="fas fa-pen"></i></button>
                                                        <a href="produits_process.php?mode=delete&type=produit&id=<?php echo $prd['id']; ?>" class="btn btn-danger info"><i class="fas fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                <tr class="subtable" id="options-<?php echo $sscat['id']?>">
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td>
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
