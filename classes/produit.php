<?php
class produit{

    public $id;
    public $lib;
    public $prix;
    public $sscat;

    /**
     * Constructeur de la classe produit
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM produit WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
        $this->prix=$data['prix'];
        $this->sscat=$data['sscategorie_id'];
    }

    /**
     * Renvoie toutes les produits de la sous-categorie $sscat_id
     * @param $sscat_id
     * @return array
     */
    static function getProduit($sscat_id){
        global $db;
        
        $req=$db->query("SELECT * FROM produit WHERE sscategorie_id=$sscat_id");
        return $req->fetchAll();
    }
}
?>