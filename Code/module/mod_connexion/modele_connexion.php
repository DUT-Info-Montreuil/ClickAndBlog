<?php
class ModeleConnexion extends Connexion{
    public function verif_pwd(){
        $selectPrep = self::$bdd->prepare('SELECT * FROM user_connect WHERE login=? AND password=?');
        $selectPrep->execute(array($_POST['mail'],hash('sha256',$_POST['pass'])));
        $result = $selectPrep->fetchall();
        if (count($result) == 1){
            $_SESSION["login"]=$_POST['mail'];
            return true;
        } else {
            return false;
        }
    }
    public function decon_user(){
        session_destroy();
    }
}
?>