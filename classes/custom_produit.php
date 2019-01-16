<?php
class custom_produit{

    public $id;
    public $produit;
    public $commande;
    public $valeur;
    public $qte;

    /**
     * Constructeur de la classe custom_produit
     * @param $id
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM custom_produit WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->produit=$data['produit_id'];
        $this->commande=$data['commande_id'];
        $this->valeur=$data['valeur_id'];
        $this->qte=$data['qte'];
    }

    /**
     * Renvoie toutes les produits commandés dans la commande $commande_id, avec comme produit de base $produit_id, et une valeur $valeur_id
     * @param $commande_id
     * @param $produit_id
     * @param $valeur_id
     * @return array
     */
    static function getProduitCustom($commande_id=null, $produit_id=null, $valeur_id=null){
        global $db;
        
        $sql = "";
        $arr=array("commande_id" => $commande_id,"produit_id" => $produit_id,"valeur_id" => $valeur_id);
        foreach($arr as $k => $a){
            if(!empty($a)){
                if(empty($sql)){
                    $sql=" WHERE $k=$a";
                }else{
                    $sql.=" AND $k=$a";
                }
            }
        }
        $sql="SELECT * FROM custom_produit".$sql;

        $req=$db->query($sql);
        return $req->fetchAll();
    }
}
?>