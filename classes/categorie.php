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
}
?>