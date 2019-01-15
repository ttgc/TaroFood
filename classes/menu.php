<?php
class menu{

    public $id;
    public $lib;
    public $prix;

    /**
     * Constructeur de la classe menu
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM menu WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
        $this->prix=$data['prix'];
    }

    /**
     * Renvoie tous les menus
     * @return array
     */
    static function getAllMenus(){
        global $db;
        
        $req=$db->query("SELECT * FROM menu");
        return $req->fetchAll();
    }
}
?>