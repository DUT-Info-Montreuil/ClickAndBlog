<?php
if (!defined('CONST_INCLUDE')) {
    die('interdit !');
}

class ModeleCommentaire extends Connexion
{
    public function ajout_commentaire()
    {
        $selectPrep = self::$bdd->prepare('INSERT INTO commentaire(contenu, idArticle, id_user) values(?, ?, ?)');
        $selectPrep->execute(array($_POST['comment'], $_GET['id'], $_SESSION['id']));
        $idArt = $_GET['id'];
        header("Location: index.php?module=mod_article&action=detail&id=$idArt"); //bug rechargement page après ajout commentaire résolu 
        return $result = $selectPrep->fetchall();
    }

}
