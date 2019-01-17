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
     * Récupère l'utilisateur qui a pour login $login
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
     * Récupère tous les utilisateurs
     * @return array
     */
    static function getAllUsers(){
        global $db;

        $req=$db->query("SELECT * FROM user ");
        return $req->fetchAll();
    }

    /**
     * Essaie de connecter l'utilisateur
     * @param $login
     * @param $mdp
     * @return $err Erreur de connexion ou null si la connexion a abouti
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
                $_SESSION['user']=$user;
                return null;
            }
        }
    }
}
?>