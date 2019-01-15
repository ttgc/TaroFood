<?php
class valeur{

    public $id;
    public $valeur;
    public $opt_id;

    /**
     * Constructeur de la classe valeur
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM valeur_option WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->valeur=$data['valeur'];
        $this->opt_id=$data['option_id'];
    }

    /**
     * Renvoie toutes les valeurs possibles pour l'option $opt_id
     * @param $opt_id
     * @return array
     */
    static function getValeur($opt_id){
        global $db;
        
        $req=$db->query("SELECT * FROM valeur_option WHERE option_id=$opt_id");
        return $req->fetchAll();
    }
}
?>