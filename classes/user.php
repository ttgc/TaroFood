<?php
class user{

    public $id;
    public $login;
    public $groupe;

    /**
     * Constructeur de la classe user
     * @param $login
     */
     function __construct($id){
        global $db;
        
        $req=$db->query("SELECT * FROM user WHERE login=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->login=$data['login'];
        $this->groupe=$data['groupe_id'];
    }

    /**
     * Essaie de connecter l'utilisateur
     * @param $login
     * @param $mdp
     */
    static function login($login,$mdp){
        global $db;
        
        $user=new user($login);
        if(empty($user)){
            trigger_error("Nom d'utilisateur inexistant");
        }else{
            if (!password_verify($mdp,$user['mdp'])) {
                trigger_error("Mot de passe invalide");
            }else{
                $token = session_id();
                if ($token == ''){
                    session_start();
                }
                $_SESSION['login']=$user->login;
            }
        }
    }
}
?>