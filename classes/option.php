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
     * Renvoie toutes les options pour le produit $prod_id
     * @param $prod_id
     * @return array
     */
    static function getOptions($prod_id){
        global $db;
        
        $req=$db->query("SELECT * FROM compo_produit WHERE produit_id=$prod_id");
        return $req->fetchAll();
    }
}
?>