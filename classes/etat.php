<?php
class etat{

    public $id;
    public $lib;

    /**
     * Constructeur de la classe type
     * @param $id
     */
     function __construct($id){
        global $db;

        $req=$db->query("SELECT * FROM etat_commande WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
    }

    /**
     * Renvoie tous les types possibles
     * @return array
     */
    static function getAllEtat(){
        global $db;

        $req=$db->query("SELECT * FROM etat_commande");
        return $req->fetchAll();
    }
}
?>
