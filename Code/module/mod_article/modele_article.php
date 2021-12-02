<?php
class ModeleArticle extends Connexion{
    public function getListe(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM article WHERE etat=TRUE');
        $selectPrep->execute();
        return $result = $selectPrep->fetchall();


    }
    public function getDetail(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM article WHERE id=? AND etat=TRUE ');
        $selectPrep->execute(array($_GET['id']));
        return $result = $selectPrep->fetchall();
    }
}
