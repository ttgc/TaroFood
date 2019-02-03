<?php
require '../classes/custom_produit.php';
require '../classes/produit.php';
require '../includes/database.php';
$db = Database::connect();
custom_produit::insertCustomProduit($_POST['produit']);
echo $db->lastInsertId();
?>