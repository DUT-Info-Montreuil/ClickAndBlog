<?php
class ModeleFavoris extends Connexion{
    public function add_bookmark(){
        $selectPrep = self::$bdd->prepare('');
        $selectPrep->execute();
        return $result = $selectPrep->fetchall();
    }
}