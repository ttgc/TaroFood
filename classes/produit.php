<?php
class produit{

    public $id;
    public $lib;
    public $prix;
    public $image;
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
        $this->image=$data['image'];
        $this->sscat=$data['sscategorie_id'];
    }

    /**
     * Renvoie tous les produits de la sous-categorie $sscat_id
     * @param $sscat_id
     * @return array
     */
    static function getProduitCat($sscat_id){
        global $db;
        
        $req=$db->query("SELECT * FROM produit WHERE sscategorie_id=$sscat_id");
        return $req->fetchAll();
    }

    /**
     * Renvoie toutes les produits du menu $menu_id
     * @param $menu_id
     * @return array
     */
    static function getProduitMenu($menu_id){
        global $db;
        
        $req=$db->query("SELECT * FROM compo_menu WHERE menu_id=$menu_id");
        return $req->fetchAll();
    }

    /**
     * Insère un produit
     * @param string $lib
     * @param int $prix
     * @param file $image
     * @param sscategorie $sscat
     */
    static function insertProduit($lib,$prix,$image,$sscat){
        global $db;
        $db->query("INSERT INTO produit VALUES(null, '$lib',$prix,'$image',$sscat)");
    }

    /**
     * Met a jour un produit à partir un objet prd
     * @param produit $prd
     */
    static function updateProduit($prd){
        global $db;
        $db->query("UPDATE produit SET libelle='$prd->lib',prix='$prd->prix',image='$prd->image',sscategorie_id='$prd->sscat' WHERE id=$prd->id");
    }

    /**
     * Supprime le produit qui a l'id $id
     * @param $id
     */
    static function deleteProduit($id){
        global $db;
        $db->query("DELETE FROM produit WHERE id=$id");
    }

    /**
     * Lie un produit à un menu avec une certaine quantité
     * @param int $menu_id
     * @param int $produit_id
     * @param int $qte
     */
    static function lierProduit($prd_id,$menu_id){
        global $db;
        $req=$db->query("INSERT INTO compo_menu VALUES('$menu_id','$prd_id')");
    }

    /**
     * Délie un produit d'un menu
     * @param int $menu_id
     * @param int $produit_id
     */
    static function delierProduit($prd_id,$menu_id){
        global $db;
        $req=$db->query("DELETE FROM compo_menu WHERE menu_id=$menu_id AND produit_id=$prd_id");
    }
}
?>