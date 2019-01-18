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
if($_GET['mode']=="delete"){
    $function=delete.ucfirst($_GET['type']);
    $_GET['type']::$function($_GET['id']);
    header('Location:produits.php');
}
if($_GET['mode']=="delier"){
    $function=delier.ucfirst($_GET['type']);
    $_GET['type']::$function($_GET['opt_id'],$_GET['id']);
    header('Location:produits.php');
}
?>