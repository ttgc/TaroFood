<?php
class groupe{

    public $id;
    public $lib;

    /**
     * Constructeur de la classe groupe
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM groupe WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->lib=$data['libelle'];
    }

    /**
     * Renvoie tous les groupes
     * @return array
     */
    static function getAllGroupes(){
        global $db;
        
        $req=$db->query("SELECT * FROM groupe");
        return $req->fetchAll();
    }
}
?>