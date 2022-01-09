<?php
class ModeleRecherche extends Connexion {
    public function moteur_recherche(){
        $selectPrep = self::$bdd->prepare('select * from article WHERE etat=TRUE');
        $selectPrep->execute();
        $result = array();
        while($article = $selectPrep->fetch(PDO::FETCH_OBJ)) {
            $result[] = array('value' => $article->id,'label' => $article->titre,'date' => $article->date);
        }
        return json_encode($result);
    }
    public function getArticle(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM article WHERE titre=? AND etat=TRUE ');
        $selectPrep->execute(array($_GET['titre']));
        return $result = $selectPrep->fetchall();
    }
}
?>