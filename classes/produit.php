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
     * Met a jour un user avec un objet user
     * @param user $user
     */
    static function updateProduit($user){
        global $db;
        $db->query("UPDATE produit SET libelle='$user->lib',prix='$user->prix',image='$user->image',sscategorie_id='$user->sscat' WHERE id=$id");
    }

    /**
     * Supprime le produit qui a l'id $id
     * @param $id
     */
    static function deleteProduit($id){
        global $db;
        $db->query("DELETE FROM produit WHERE id=$id");
    }
}
?>