<?php
class paiement{

    public $id;
    public $lib;

    /**
     * Constructeur de la classe paiement
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM paiement WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
    }

    /**
     * Renvoie tous les paiements possibles
     * @return array
     */
    static function getAllPaiement(){
        global $db;
        
        $req=$db->query("SELECT * FROM paiement");
        return $req->fetchAll();
    }
}
?>