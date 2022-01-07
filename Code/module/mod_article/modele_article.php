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
        $messageRetour ="";
        $messageRetour;
        $dossier_destination = "public/image/";
        $fichier_destination =  $dossier_destination . basename($_FILES["image"]["name"]);
        $image_extension = strtolower(pathinfo($fichier_destination, PATHINFO_EXTENSION));
        // Mise en place des verification
        if (!empty($_FILES["image"]["tmp_name"])){
            $typeAutoriser = array('jpg','png','jpeg');
            if (in_array($image_extension,$typeAutoriser)){
                $selectPrep = self::$bdd->prepare("INSERT INTO article(titre, contenu, image, alt_image, date, time_read,etat) VALUES(?,?,?,?,?,?,?)");
                if($selectPrep->execute(array($_POST['titre'],$_POST['contenue'],$fichier_destination,$_POST['alt_image'],$_POST['date'], $this->temps_lecture($_POST['contenue']),$_POST['etat']))){
                    move_uploaded_file($_FILES["image"]["tmp_name"], $fichier_destination);
                } else {
                    // Return Code 1
                    $messageRetour = "Impossible d'envoyer le fichier sur le serveur\n";
                }
            } else {
                // Return Code 2
                $messageRetour = "Mauvais format de fichier seul les types de jpg et png ainsi que les types jpeg\n";
            }
        } else {
            // Return Code 3
            $messageRetour = "Veuillez choisir un fichier a envoyé\n";
        }
        // return Code 4
        return $messageRetour;
    }

    public function  getArticleBYCateg(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM article WHERE categorie = ? AND etat=TRUE');
        $selectPrep->execute(array($_GET['nom_categorie']));
        return $result = $selectPrep->fetchall();
    }

    public function getCommentaires(): array{
        $selectPrep = self::$bdd->prepare('SELECT * FROM commentaire where idArticle = ?');
        $selectPrep->execute(array($_GET['id']));
        return $result = $selectPrep->fetchall();
    }

    public function getPhotoProfil(): array{//TODO
        $selectPrep = self::$bdd->prepare('SELECT photoProfil FROM commentaire join user_connect on commentaire.id_user = user_connet.id where id_user = ?');
        $selectPrep->execute(array($_GET['id']));
        return $result = $selectPrep->fetchall();
    }

    public function env_img(){
        // Repertoire de destination du fichier
        $repertoire = "/public/image/";
        // Fichier envoyé
        $fichier = $repertoire . basename($_FILES['fichier_env']['nom']);
        $envOK  = 1;

    }
    private function temps_lecture($content)
    {
        $bbcode = $search = array (
            '/(\[b\])(.*?)(\[\/b\])/',
            '/(\[i\])(.*?)(\[\/i\])/',
            '/(\[u\])(.*?)(\[\/u\])/',
            '/(\[ul\])(.*?)(\[\/ul\])/',
            '/(\[li\])(.*?)(\[\/li\])/',
            '/(\[url=)(.*?)(\])(.*?)(\[\/url\])/',
            '/(\[url\])(.*?)(\[\/url\])/'
        );
        // Nettoie le elements BBcode pour avoir que le texte pur et ne pas etre biaisés lors du calcul.
        $clean_content_bbcode = preg_replace($bbcode,"$2",$content);
        $word_count = str_word_count( $clean_content_bbcode);
        return ceil( $word_count / 250);
    }
}
