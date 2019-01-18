<?php
class categorie{

    public $id;
    public $lib;

    /**
     * Constructeur de la classe categorie
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM categorie WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
    }

    /**
     * Renvoie toutes les categories
     * @return array
     */
    static function getAllCat(){
        global $db;
        
        $req=$db->query("SELECT * FROM categorie");
        return $req->fetchAll();
    }

    /**
     * Update une categorie par rapport un objet $cat
     * @param categorie $cat
     */
    static function updateCategorie($cat){
        global $db;
        $db->query("UPDATE categorie SET libelle=$cat->lib WHERE id=$cat->id");
    }

    /**
     * Supprime la categorie avec l'id $id
     * @param $id
     */
    static function deleteCategorie($id){
        global $db;
        $db->query("DELETE FROM categorie WHERE id=$id");
    }
}
?>