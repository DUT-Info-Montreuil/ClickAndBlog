<?php
if(!defined('CONST_INCLUDE')){
    die('interdit !');
}

class ModeleUtilisateur extends Connexion
{

    public function getListeArticles(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM article WHERE etat=TRUE and user_id = ?');
        $selectPrep->execute(array($_GET['id_user']));
        return $result = $selectPrep->fetchall();
    }

    public function verifSignalement($resp): bool{
        $selectPrep = self::$bdd->prepare('SELECT * FROM signalement WHERE user_id = ? AND url = ?');
        $selectPrep->execute(array($_SESSION['id'],$resp));
        $result = $selectPrep->fetchall();
        if (count($result) == 1){
            return true;
        } else {
            return false;
        }
    }

    public function verifArticleFav($resp): bool
    {
        $selectPrep = self::$bdd->prepare('SELECT * FROM favoris INNER JOIN article ON favoris.url = article.id WHERE favoris.user_id = ? AND article.id = ?');
        $selectPrep->execute(array($_SESSION['id'],$resp));
        $result = $selectPrep->fetchall();
        if (count($result) == 1){
            return true;
        } else {
            return false;
        }
    }

    public function get_infos()
    {
        $selectPrep = self::$bdd->prepare('SELECT * FROM user_connect WHERE id = ?');
        $selectPrep->execute(array($_GET['id_user']));
        while ($user = $selectPrep->fetch(PDO::FETCH_OBJ)) {
            $result[] = array('nom' => $user->nom, 'prenom' => $user->prenom, 'username' => $user->username, 'bio' => $user->bio);
        }
        return $result;
    }

    public static function getPhotoProfil(): array{
        $selectPrep = self::$bdd->prepare('SELECT user_connect.photoProfil FROM user_connect where user_connect.id = ?');
        $selectPrep->execute(array($_GET['id_user']));
        $result = $selectPrep->fetchall();
        return $result;
    }

    public function get_favoris(){
        $selectPrep = self::$bdd->prepare('SELECT * FROM article INNER JOIN favoris ON article.id=favoris.url WHERE favoris.user_id= ?');
        $selectPrep->execute(array($_SESSION['id']));
        return $selectPrep->fetchall();
    }


}

?>