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

    /**
     * Insère un menu
     * @param string $lib
     * @param int $prix
     */
    static function insertMenu($lib,$prix){
        global $db;
        $db->query("INSERT INTO menu VALUES(null, '$lib','$prix')");
    }

    /**
     * Met a jour un menu à partir un objet menu
     * @param menu $menu
     */
    static function updateMenu($menu){
        global $db;
        $db->query("UPDATE menu SET libelle='$menu->lib',prix='$menu->prix' WHERE id=$menu->id");
    }

    /**
     * Supprime le menu qui a l'id $id
     * @param $id
     */
    static function deleteMenu($id){
        global $db;
        $db->query("DELETE FROM menu WHERE id=$id");
    }
}
?>