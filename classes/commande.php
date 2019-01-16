<?php
class commande{

    public $id;
    public $rue;
    public $cp;
    public $ville;
    public $date_livraison;
    public $date_creation;
    public $total;
    public $comm;
    public $etat_id;
    public $type_id;

    /**
     * Constructeur de la classe commande
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM commande WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->rue=$data['adresse_rue'];
        $this->cp=$data['adresse_cp'];
        $this->ville=$data['adresse_ville'];
        $this->date_livraison=$data['datetime_livraison'];
        $this->date_creation=$data['datetime_creation'];
        $this->total=$data['total'];
        $this->comm=$data['commentaire'];
        $this->etat_id=$data['etat_id'];
        $this->type_id=$data['type_id'];
    }

    /**
     * Renvoie toutes les commandes du client $client_id, avec le type $type_id, et l'etat $etat_id
     * @param $client_id
     * @param $type_id
     * @param $etat_id
     * @return array
     */
    static function getCommande($client_id=null, $type_id=null, $etat_id=null){
        global $db;
        
        $sql = "SELECT * FROM commande WHERE client_id=$client_id";
        $arr=array("type_id" => $type_id,"etat_id" => $etat_id);
        foreach($arr as $k => $a){
            if(isset($a) && !empty($a)){
                $sql.=" AND $k=$a";
            }
        }

        $req=$db->query($sql);
        return $req->fetchAll();
    }
}
?>