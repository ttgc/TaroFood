<?php
class client{

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $tel;
    public $abo;

    /**
     * Constructeur de la classe client
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM client WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->nom=$data['nom'];
        $this->prenom=$data['prenom'];
        $this->email=$data['email'];
        $this->tel=$data['telephone'];
        $this->abo=$data['abo'];
    }

    /**
     * Renvoie tous les clients possibles
     * @return array
     */
    static function getAllClient(){
        global $db;
        
        $req=$db->query("SELECT * FROM client");
        return $req->fetchAll();
    }
}
?>