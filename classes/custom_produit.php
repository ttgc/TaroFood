<?php
class custom_produit{

    public $id;
    public $produit;

    /**
     * Constructeur de la classe custom_produit
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM custom_produit WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->produit=$data['produit_id'];
    }

    /**
     * Renvoie toutes les produits commandés dans la commande $commande_id, avec comme produit de base $produit_id, et une valeur $valeur_id
     * @param $commande_id
     * @param $produit_id
     * @param $valeur_id
     * @return array
     */
    static function getProduitCustom($produit_id){
        global $db;
        
        $sql="SELECT * FROM custom_produit WHERE produit_id=$produit_id";

        $req=$db->query($sql);
        return $req->fetchAll();
    }
}
?>