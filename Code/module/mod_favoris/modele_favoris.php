<?php
class ModeleFavoris extends Connexion{
    public function add_bookmark(){
        $selectPrep = self::$bdd->prepare('INSERT INTO favoris(user_id, url) VALUES(?,?)');
        $selectPrep->execute(array($_SESSION['id'],$_GET['idArticle']));
        //return $result = $selectPrep->fetchall();
    }
    public function dell_bookmark(){

    }
}