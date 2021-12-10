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

    public function verif_creation(){
        try{
            $nom = $_POST['lastname'];
            $prenom = $_POST['firstname'];
            $mail = $_POST['mail'];
            $mdp = $_POST['pass'];
            echo "<br>";
            $requete = self::$bdd->prepare('INSERT INTO user_connect(login, password) VALUES(?,?)');
            $requete->execute(array($mail,$mdp));
            // $result = $requete->fetchAll();
            return true;
        }catch(PDOException $p){
            echo $p->getCode().$p->getMessage();
            return false;
        }
    }

    public function decon_user(){
        session_destroy();
    }
}
?>