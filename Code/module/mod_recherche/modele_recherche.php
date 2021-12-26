<?php
class ModeleRecherche extends Connexion {
    public function moteur_recherche(){
        $selectPrep = self::$bdd->prepare('select * from article');
        $selectPrep->execute();
        $result = array();
        while($article = $selectPrep->fetch(PDO::FETCH_OBJ)) {
            $result[] = $article->titre;
        }
        return json_encode($result);
    }
}
?>