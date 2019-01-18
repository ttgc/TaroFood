<?php
class option{

    public $id;
    public $lib;

    /**
     * Constructeur de la classe option
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM option_produit WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
    }

    /**
     * Renvoie toutes les options
     * @return array
     */
    static function getAllOptions(){
        global $db;
        
        $req=$db->query("SELECT * FROM option_produit");
        return $req->fetchAll();
    }

    /**
     * Renvoie toutes les options pour le produit $prod_id
     * @param $prod_id
     * @return array
     */
    static function getOptions($prod_id){
        global $db;
        
        $req=$db->query("SELECT * FROM compo_produit WHERE produit_id=$prod_id");
        return $req->fetchAll();
    }

    /**
     * Lie l'option $opt_id au produit $prod_id
     * @param $prod_id
     * @param $opt_id
     */
    static function lierOption($opt_id,$prod_id){
        global $db;
        $db->query("INSERT INTO compo_produit VALUES ($prod_id,$opt_id)");
    }

    /**
     * Delie l'option $opt_id du produit $prod_id
     * @param $prod_id
     * @param $opt_id
     */
    static function delierOption($opt_id,$prod_id){
        global $db;
        $db->query("DELETE FROM compo_produit WHERE option_id=$opt_id AND produit_id=$prod_id");
    }
}
?>