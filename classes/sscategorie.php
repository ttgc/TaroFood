<?php
class sscategorie{

    public $id;
    public $lib;

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
    }

    /**
     * Renvoie toutes les sous-categories de la categorie $cat_id
     * @param $cat_id
     * @return array
     */
    static function getSScat($cat_id){
        global $db;
        
        $req=$db->query("SELECT * FROM sscategorie WHERE categorie_id=$cat_id");
        return $req->fetchAll();
    }
}
?>