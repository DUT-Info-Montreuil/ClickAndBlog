<?php
class ModeleCommentaire extends Connexion{
    public function getListe(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM commentaire');
        $selectPrep->execute();
        return $result = $selectPrep->fetchall();
    }

    public function ajout_commentaire(){

    }

}
