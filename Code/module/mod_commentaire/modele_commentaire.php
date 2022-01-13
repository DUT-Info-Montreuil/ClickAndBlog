<?php
class ModeleCommentaire extends Connexion{

    public function getListe(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM commentaire');
        $selectPrep->execute();
        return $result = $selectPrep->fetchall();
    }

    public function ajout_commentaire(){
        $selectPrep = self::$bdd->prepare('INSERT INTO commentaire(contenu, idArticle, id_user) values(?, ?, ?)');
        $selectPrep->execute(array($_POST['comment'], $_GET['id'], $_SESSION['id']));
        return $result = $selectPrep->fetchall();
        $idArt = $_GET['id'];
        header("Location: index.php/moodule=mod_article&action=detail&id=$idArt");
    }

}
