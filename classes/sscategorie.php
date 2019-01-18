<?php
class sscategorie{

    public $id;
    public $lib;
    public $cat;

    /**
     * Constructeur de la classe sscategorie
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM sscategorie WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
        $this->cat=$data['categorie_id'];
    }

    /**
     * Renvoie toutes les sous-categories de la categorie $cat_id
     * @param $cat_id
     * @return array
     */
    static function getSSCat($cat_id){
        global $db;
        
        $req=$db->query("SELECT * FROM sscategorie WHERE categorie_id=$cat_id");
        return $req->fetchAll();
    }

    /**
     * Update une sous-categorie par rapport un objet $sscat
     * @param sscategorie $sscat
     */
    static function updateSscategorie($sscat){
        global $db;
        $db->query("UPDATE sscategorie SET libelle=$sscat->lib WHERE id=$sscat->id");
    }

    /**
     * Supprime la sous-categorie avec l'id $id
     * @param $id
     */
    static function deleteSscategorie($id){
        global $db;
        $db->query("DELETE FROM sscategorie WHERE id=$id");
    }
}
?>