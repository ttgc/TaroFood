<?php 
class fonctions{
    /**
     * Vérifie que l'utilisateur acctuellement connecté est dans un groupe parmis $groupes
     * @param array $groupes
     * @return boolean
     */
    static function access_check($groupes){
        require_once '../classes/user.php';
        session_start();
        if(session_status()!=2 or empty($_SESSION)){
            header("Location:login.php");
        }else{
            require_once '../classes/groupe.php';
            $user=$_SESSION['user'];
            $groupe=new groupe($user->groupe);
            if(in_array($groupe,$groupes)){
                return true;
            }else{
                header("Location:../admin/admin.php");
            }
        }
    }

    /**
     * Vérifie l'existance du panier et le retourne s'il existe
     * @return array 
     */
    static function panier_check(){
        if(!isset($_COOKIE['panier'])){
            setcookie("panier",null,time()+3600);
            return null;
        }else{
            return json_decode($_COOKIE['panier'],true);
        }
    }

    /**
     * Met à jour le cookie 'panier' avec un array php $panier
     * @param array $panier
     */
    static function update_panier($panier){
        setcookie("panier",json_encode($panier),time()+3600);
    }

    /**
     * Ajoute le custom_produit $id au panier
     * @param int $panier
     */
    static function add_panier($id){
        $panier=$panier_check();
        $panier_push($id);
        update_panier($panier);
    }


}
?>