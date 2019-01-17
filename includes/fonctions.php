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
}
?>