<?php

class ModeleUtilisateur extends Connexion
{

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