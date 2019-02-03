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
     * jsp
     */
    static function getProduitCustom($produit_id){
        global $db;
        
        $sql="SELECT * FROM custom_produit WHERE produit_id=$produit_id";

        $req=$db->query($sql);
        return $req->fetchAll();
    }

    /**
     * Insère un custom_produit correspondant à un produit $produit
     * @param int $produit
     */
    static function insertCustomProduit($produit){
        global $db;
        $db->query("INSERT INTO custom_produit VALUES(null, '$produit')");
    }

    /**
     * Met a jour un custom_produit à partir un objet cprd
     * @param custom_produit $cprd
     */
    static function updateCustomProduit($cprd){
        global $db;
        $db->query("UPDATE custom_produit SET produit_id='$cprd->produit' WHERE id=$cprd->id");
    }

    /**
     * Supprime le custom_produit qui a l'id $id
     * @param $id
     */
    static function deleteCustomProduit($id){
        global $db;
        $db->query("DELETE FROM custom_produit WHERE id=$id");
    }
}
?>