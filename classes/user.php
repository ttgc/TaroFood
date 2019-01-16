<?php
class user{

    public $id;
    public $login;
    public $mdp;
    public $groupe;

    /**
     * Constructeur de la classe user
     * @param $login
     */
     public function __construct($id){
        global $db;

        $req=$db->query("SELECT * FROM user WHERE id=$id");
        $data=$req->fetch();

        $this->id=$id;
        $this->login=$data['login'];
        $this->mdp=$data['mdp'];
        $this->groupe=$data['groupe_id'];
    }

    /**
     * Récupère l'utilisateur qui a pour login login
     * @param $login
     * @return user
     */
    static function getUser($login){
        global $db;

        $req=$db->query("SELECT id FROM user WHERE login='$login'");
        $data=$req->fetch();
        
        if($data!=false){
            $id=$data['id'];
            $user = new user($id);
            return $user;
        }else{
            return null;
        }
    }

    /**
     * Essaie de connecter l'utilisateur
     * @param $login
     * @param $mdp
     */
    static function login($login,$mdp){
        global $db;

        $user=user::getUser($login);
        if(empty($user)){
            return "Nom d'utilisateur inexistant";
        }else{
            if (!password_verify($mdp,$user->mdp)) {
                return "Mot de passe invalide";
            }else{
                $token = session_id();
                if ($token == ''){
                    session_start();
                }
                $_SESSION['login']=$user->login;
                return null;
            }
        }
    }
}
?>