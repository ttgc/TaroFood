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

if(!empty($_POST)){
    switch($_POST['type']){
        case 'produit':
            if(empty($_POST['id'])){
                produit::insertProduit($_POST['lib'],$_POST['prix'],$_POST['image'],$_POST['sscat']);
            }else{
                if(!empty($_FILES)){
                    $file_url="images/".basename($_FILES['image']['name']);
                    move_uploaded_file($_FILES['image']['tmp_name'], "../".$file_url);
                }else{
                    $file_url=null;
                }
                $prd=new produit($_POST['id']);
                $prd->lib=$_POST['lib'];
                $prd->prix=$_POST['prix'];
                $prd->image=$file_url;
                $prd->sscat=$_POST['sscat'];
                produit::updateProduit($prd);
            }
        break;
        case 'sscategorie':
            if(empty($_POST['id'])){
                sscategorie::insertSSCat($_POST['lib'],$_POST['cat']);
            }else{
                $sscat=new sscategorie($_POST['id']);
                $sscat->lib=$_POST['lib'];
                $sscat->cat=$_POST['cat'];
                sscategorie::updateSSCat($sscat);
            }
        break;
        case 'categorie':
            if(empty($_POST['id'])){
                categorie::insertCat($_POST['lib']);
            }else{
                $cat=new categorie($_POST['id']);
                $cat->lib=$_POST['lib'];
                categorie::updateCat($cat);
            }
        break;
        case 'option':
            if(empty($_POST['id'])){
                option::insertOption($_POST['lib']);
            }else{
                $opt=new option($_POST['id']);
                $opt->lib=$_POST['lib'];
                option::updateOption($opt);
            }
        break;
    }
    header('Location:produits.php');
}

$type=$_GET['type'];
$function=$_GET['mode'].ucfirst($type);

if($_GET['mode']=="delete"){
    $_GET['type']::$function($_GET['id']);
    header('Location:produits.php');
}
if($_GET['mode']=="delier"){
    $_GET['type']::$function($_GET['opt_id'],$_GET['id']);
    header('Location:produits.php');
}
?>
<!DOCTYPE html>
<html>
  <?php include '../includes/head.php'; ?>
  <body>
    <?php include '../includes/header.php'; ?>

    <div class="container">
      <div class="row">
        <div class="col-4 offset-4">
          <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="type" id="type" <?php echo "value='$type'"; ?>>
            <?php 
            switch($_GET['type']){
                case 'categorie':
                    if(!empty($_GET['id'])){
                        $cat=new categorie($_GET['id']);
                    }
                    ?>
                        <input type="hidden" name="id" id="id" <?php if(!empty($cat)){echo 'value='.$cat->id;} ?>>
                        <div class="form-group">
                            <label for="lib">Libelle</label>
                            <input type="text" class="form-control" name="lib" id="lib" <?php if(!empty($cat)){echo "value='$cat->lib'";} ?>>
                        </div>
                    <?php
                break;
                case 'sscategorie':
                    if(!empty($_GET['id'])){
                        $sscat=new sscategorie($_GET['id']);
                    }
                    ?>
                        <input type="hidden" name="id" id="id" <?php if(!empty($sscat)){echo 'value='.$sscat->id;} ?>>
                        <div class="form-group">
                            <label for="lib">Libelle</label>
                            <input type="text" class="form-control" name="lib" id="lib" <?php if(!empty($sscat)){echo "value='$sscat->lib'";} ?>>
                        </div>
                        <div class="form-group">
                            <label for="cat">Categorie</label>
                            <select class="form-control" name="cat" id="cat">
                                <?php
                                    $cats=categorie::getAllCat();
                                    foreach($cats as $cat) {
                                ?>
                                        <option value=<?php echo $cat['id']; ?> <?php if(!empty($sscat)){if($sscat->cat==$cat['id']){echo "selected";}} ?>><?php echo $cat['libelle']; ?></option>
                                <?php 
                                    } 
                                ?>
                            </select>
                        </div>
                    <?php
                break;
                case 'produit':
                    if(!empty($_GET['id'])){
                        $prd=new produit($_GET['id']);
                    }
                    ?>
                        <input type="hidden" name="id" id="id" <?php if(!empty($prd)){echo 'value='.$prd->id;} ?>>
                        <div class="form-group">
                            <label for="lib">Libelle</label>
                            <input type="text" class="form-control" name="lib" id="lib" <?php if(!empty($prd)){echo "value='$prd->lib'";} ?>>
                        </div>
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="number" step="0.01" class="form-control" name="prix" id="prix" <?php if(!empty($prd)){echo "value='$prd->prix'";} ?>>
                        </div>
                        <div class="form-group">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="form-group">
                            <label for="sscat">Sous-Categorie</label>
                            <select class="form-control" name="sscat" id="sscat">
                                <?php
                                    $cats=categorie::getAllCat();
                                    foreach($cats as $cat) {
                                    ?>
                                    <optgroup label="<?php echo $cat['libelle']?>"></optgroup>
                                    <?php
                                        $sscats=sscategorie::getSSCat($cat['id']);
                                        foreach($sscats as $sscat) {
                                ?>
                                            <option value=<?php echo $sscat['id']; ?> <?php if(!empty($prd)){if($prd->sscat==$sscat['id']){echo "selected";}} ?>><?php echo $sscat['libelle']; ?></option>
                                <?php 
                                        }
                                    } 
                                ?>
                            </select>
                        </div>
                    <?php
                break;
                case 'option':
                    if(!empty($_GET['id'])){
                        $opt=new option($_GET['id']);
                    }
                    ?>
                        <input type="hidden" name="id" id="id" <?php if(!empty($opt)){echo 'value='.$opt->id;} ?>>
                        <div class="form-group">
                            <label for="lib">Libelle</label>
                            <input type="text" class="form-control" name="lib" id="lib" <?php if(!empty($opt)){echo 'value='.$opt->lib;} ?>>
                        </div>
                    <?php
                break;
            }
            ?>
            
            <button type="submit" id="submit" class="btn btn-success"><i class="fas fa-check"></i> Valider</button>
            <a href="produits.php" class="btn btn-danger"><i class="fas fa-times"></i> Annuler</a>
          </form>
        </div>
      </div>
    </div>

    <?php include '../includes/footer.php'; ?>
    <script src="../script/checkpwduser.js"></script>
  </body>
</html>

