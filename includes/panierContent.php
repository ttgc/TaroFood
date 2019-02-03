<?php
require_once "database.php";
require_once "../classes/menu.php";
require_once "../classes/categorie.php";
require_once "../classes/sscategorie.php";
require_once "../classes/produit.php";
require_once "../classes/custom_produit.php";
$db = Database::connect();

?>
<tr>
    <th>Produit</th>
    <th>Quantité</th>
    <th>Prix</th>
    <th></th>
</tr>
<?php

if(!empty($_POST['panier'])){
    $total=0;
    foreach($_POST['panier'] as $cpid){
        $cp=new custom_produit($cpid);
        $prd=new produit($cp->produit);
        $total+=$prd->prix;
        ?>
        <tr>
            <td><?php echo $prd->lib; ?></td>
            <td><input type="number" step="1" min="1" max="10" value="1"></td>
            <td><?php echo $prd->prix." €"; ?></td>
            <td>
                <button class="btn btn-primary"><i class="fas fa-pen"></i></button>
                <button class="btn btn-danger" onclick="supprPanier('<?php echo $cp->id; ?>')"><i class="fas fa-times"></i></button>
            </td>
        </tr>
        <?php
    }
    ?>
    <tr>
        <th colspan="2">Total</th>
        <th><?php echo $total." €"; ?></th>
    </tr>
    <?php
}else{
    ?>
    <tr>
        <th colspan="2">Total</th>
        <th>0.00 €</th>
    </tr>
    <?php
}
?>
