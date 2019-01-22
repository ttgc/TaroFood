<?php
require '../classes/groupe.php';
require '../classes/user.php';
require '../classes/categorie.php';
require '../classes/sscategorie.php';
require '../classes/produit.php';
require '../classes/menu.php';
require '../includes/fonctions.php';
require '../includes/database.php';
$db = Database::connect();
$groupes=array(new groupe(1));
if(!fonctions::access_check($groupes)){
  header('Location:admin.php');
}

if(!empty($_POST)){
    if(empty($_POST['id'])){
        menu::insertMenu($_POST['lib'],$_POST['prix']);
    }else{
        $menu=new menu($_POST['id']);
        $menu->lib=$_POST['lib'];
        $menu->prix=$_POST['prix'];
        menu::updateMenu($menu);
        if(!empty($_POST['produits'])){
            $prds=$_POST['produits'];
            foreach($prds as $prd){
                produit::lierProduit($prd,$menu->id);
            }
        }
    }
    header('Location:menus.php');
}


if(empty($_GET['mode']) || empty($_GET['type'])){
    header('Location:menus.php');
}
$type=$_GET['type'];
$function=$_GET['mode'].ucfirst($type);

if($_GET['mode']=="delete"){
    $_GET['type']::$function($_GET['id']);
    header('Location:menus.php');
}
if($_GET['mode']=="delier"){
    $_GET['type']::$function($_GET['prd_id'],$_GET['id']);
    header('Location:menus.php');
}
?>
<!DOCTYPE html>
<html>
  <?php include '../includes/head2.php'; ?>
  <body>
    <?php include '../includes/header.php'; ?>
    <div class="container">
      <div class="row">
        <div class="col-4 offset-4">
          <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="type" id="type" <?php echo "value='$type'"; ?>>
            <?php 
                if(!empty($_GET['id'])){
                    $menu=new menu($_GET['id']);
                }
            ?>
                <input type="hidden" name="id" id="id" <?php if(!empty($menu)){echo 'value='.$menu->id;} ?>>
                <div class="form-group">
                    <label for="lib">Libelle</label>
                    <input type="text" class="form-control" name="lib" id="lib" <?php if(!empty($menu)){echo "value='$menu->lib'";} ?>>
                </div>
                <div class="form-group">
                    <label for="prix">Prix</label>
                    <input type="text" class="form-control" name="prix" id="prix" <?php if(!empty($menu)){echo "value='$menu->prix'";} ?>>
                </div>
                <div class="form-group">
                    <label for="produits[]">Options</label>
                    <select class="form-control selectpicker" name="produits[]" id="produits" title="Choisissez les produits" multiple>
                        <?php
                            if(!empty($menu)){
                                $menu_prd=produit::getProduitMenu($menu->id);
                                $arr=array();
                                foreach($menu_prd as $mp){
                                    array_push($arr,$mp['produit_id']);
                                }
                            }
                            $cats=categorie::getAllCat();
                            foreach($cats as $cat) {
                                $sscats=sscategorie::getSSCat($cat['id']);
                                foreach($sscats as $sscat) {
                                ?>
                                    <optgroup label="<?php echo $cat['libelle'].' - '.$sscat['libelle']; ?>">
                                    <?php
                                        $prds=produit::getProduitCat($sscat['id']);
                                        foreach($prds as $prd) {
                                        ?>
                                            <option value=<?php echo $prd['id']; ?> <?php if(!empty($menu_prd)){if(in_array($prd['id'],$arr)){echo "selected";}} ?>><?php echo $prd['libelle']; ?></option>
                                        <?php 
                                        }
                                    ?>
                                    </optgroup>
                                <?php 
                                }
                            } 
                        ?>
                    </select>
                </div>
            <button type="submit" id="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
            <a href="menus.php" class="btn btn-danger"><i class="fas fa-times"></i> Annuler</a>
          </form>
        </div>
      </div>
    </div>

    <?php include '../includes/footer.php'; ?>
  </body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.2/js/bootstrap-select.min.js"></script>