<?php
class type{

    public $id;
    public $lib;

    /**
     * Constructeur de la classe type
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM type_commande WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
    }

    /**
     * Renvoie tous les types possibles
     * @return array
     */
    static function getAllTypes(){
        global $db;
        
        $req=$db->query("SELECT * FROM type_commande");
        return $req->fetchAll();
    }
}
?>