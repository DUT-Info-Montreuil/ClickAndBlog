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
        // Doit retourner un string qui va etre affiche dans la vue en fonction des valeurs de retour si succes affiche un message de succes sinon affiche un message d'erreur en fonction de la string renvoyer
        // Je le ferias demain 
        $dossier_destination = "public/image";
        $fichier_destination =  $dossier_destination . basename($_FILES["image"]["name"]);
        $image_extension = strtolower(pathinfo($fichier_destination, PATHINFO_EXTENSION));
        $selectPrep = self::$bdd->prepare("INSERT INTO article(titre, contenue, image, alt_image, date, time_read,etat) VALUES(?,?,?,?,?,?,?)");
        if($selectPrep->execute(array($_POST['titre'],$_POST['contenue'],$fichier_destination,$_POST['alt_image'],$_POST['date'],(strlen($_POST['contenue'])/250),$_POST['etat']))){
            move_uploaded_file($_FILES["image"]["tmp_name"], $fichier_destination);
        } else {
           return false;
        }
    }

    public function  getArticleBYCateg(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM article WHERE categorie = ? AND etat=TRUE');
        $selectPrep->execute(array($_GET['nom_categorie']));
        return $result = $selectPrep->fetchall();
    }

    public function env_img(){
        // Repertoire de destination du fichier
        $repertoire = "/public/image/";
        // Fichier envoyé
        $fichier = $repertoire . basename($_FILES['fichier_env']['nom']);
        $envOK  = 1;

    }
}
