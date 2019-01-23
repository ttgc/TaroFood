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
    public $client_id;

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
        $this->client_id=$data['client_id'];
    }

    function updateState($idstate) {
      global $db;

      $db->query("UPDATE commande SET etat_id = $idstate WHERE id = $this->id");
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
        $arr=array("client_id" => $client_id,"type_id" => $type_id,"etat_id" => $etat_id);
        foreach($arr as $k => $a){
            if(!empty($a)){
                if(empty($sql)){
                    $sql=" WHERE $k='$a'";
                }else{
                    $sql.=" AND $k='$a'";
                }
            }
        }

        $req=$db->query($sql);
        return $req->fetchAll();
    }

    static function getAllCommande() {
      global $db;

      $sql="SELECT commande.id AS id,adresse_rue,adresse_cp,adresse_ville,datetime_livraison,datetime_creation,total,commentaire,nom,prenom,email,telephone,etat_commande.libelle as etat,type_commande.libelle as type
            FROM ((commande INNER JOIN type_commande ON (type_commande.id = commande.type_id))
            INNER JOIN etat_commande ON (etat_commande.id = commande.etat_id))
            INNER JOIN client ON (client.id = commande.client_id)";

      $req=$db->query($sql);
      return $req->fetchAll();
    }
}
?>
