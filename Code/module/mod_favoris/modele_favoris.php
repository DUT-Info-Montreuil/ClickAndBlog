<?php
class ModeleFavoris extends Connexion{
    public function add_bookmark(){
        $selectPrep = self::$bdd->prepare('INSERT INTO favoris(user_id, url) VALUES(?,?)');
        $selectPrep->execute(array($_SESSION['id'],$_GET['idArticle']));
        //return $result = $selectPrep->fetchall();
    }
    public function dell_bookmark(){

    }
    public function verifArticleFav($resp): bool
    {
        $selectPrep = self::$bdd->prepare('SELECT * FROM favoris INNER JOIN article ON favoris.url = article.id WHERE user_id = ? AND article.id = ?');
        $selectPrep->execute(array($_SESSION['id'],$resp));
        $result = $selectPrep->fetchall();
        if (count($result) == 1){
            return true;
        } else {
            return false;
        }

    }
}