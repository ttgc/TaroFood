<?php 
class fonctions{
    /**
     * Vérifie que l'utilisateur acctuellement connecté est dans un groupe parmis $groupes
     * @param array $groupes
     * @return boolean
     */
    static function access_check($groupes){
        require '../classes/user.php';
        session_start();
        if(session_status()!=2 or empty($_SESSION)){
            echo "test";
            header("Location:login.php");
        }else{
            $user=$_SESSION['user'];
            if(in_array($user->groupe,$groupes)){
                return true;
            }else{
                return false;
            }
        }
    }
}
?>