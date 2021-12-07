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

    public function ajout_article(){
        $selectPrep = self::$bdd->prepare("INSERT INTO article(titre, contenue, image, alt_image, date, time_read,etat) VALUES(?,?,?,?,?,?,?)");
        if($selectPrep->execute(array($_POST['titre'],$_POST['contenue'],$_POST['image'],$_POST['alt_image'],$_POST['date'],(strlen($_POST['contenue'])/250),$_POST['etat']))){
            echo "Ajour réussi dans la bd";
            echo strlen($_POST['contenue'])/250;
            // Remplacer par TRUE
        } else {
            echo "Erreur lors de l'ajout";
            // Remplacer par FALSE
        }
    }

    public function  getArticleBYCateg(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM article WHERE categorie = ? AND etat=TRUE');
        $selectPrep->execute(array($_GET['nom_categorie']));
        return $result = $selectPrep->fetchall();
    }
}
