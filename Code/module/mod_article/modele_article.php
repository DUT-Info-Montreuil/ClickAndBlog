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
                $selectPrep = self::$bdd->prepare("INSERT INTO article(titre, contenu,categorie, image, alt_image, date, time_read,etat,user_id) VALUES(?,?,?,?,?,?,?,?,?)");
                if($selectPrep->execute(array($_POST['titre'],$_POST['contenue'],$_POST['categories_art'],$fichier_destination,$_POST['alt_image'],$_POST['date'], $this->temps_lecture($_POST['contenue']),$_POST['etat'],$_SESSION['id']))){
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

    public static function getPhotoProfil(): array{
        $selectPrep = self::$bdd->prepare('SELECT DISTINCT user_connect.photoProfil FROM user_connect JOIN commentaire on user_connect.id = commentaire.id_user where commentaire.idArticle = ?');
        $selectPrep->execute(array($_GET['id']));
        $result = $selectPrep->fetchall();
        return $result;
    }

    public static function getInfos(): array{
        $selectPrep = self::$bdd->prepare('SELECT DISTINCT user_connect.nom, user_connect.prenom FROM user_connect JOIN commentaire on user_connect.id = commentaire.id_user where commentaire.idArticle = ?');
        $selectPrep->execute(array($_GET['id']));
        $result = $selectPrep->fetchall();
        return $result;
    }

    public static function getCurrentPhotoProfil(): array{
        $selectPrep = self::$bdd->prepare('SELECT user_connect.photoProfil FROM user_connect where id = ?');
        $selectPrep->execute(array($_SESSION['id']));
        $result = $selectPrep->fetchall();
        return $result;
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
    public function add_like(){
        // Pour verif si utilisateur existe c'est ici !!!!
        $selectPrep = self::$bdd->prepare('INSERT INTO like_article(user_id, article_id) VALUES(?,?)');
        $selectPrep->execute(array($_SESSION['id'],$_GET['idArticle']));
        header('Location: index.php?module=mod_article&action=detail&id='.$_GET['idArticle']);
    }
    public function retirer_like(){
        $selectPrep = self::$bdd->prepare('DELETE FROM like_article WHERE like_article.user_id = ? AND like_article.article_id = ?');
        $selectPrep->execute(array($_SESSION['id'],$_GET['idArticle']));
        header('Location: index.php?module=mod_article&action=detail&id='.$_GET['idArticle']);
    }
    public function add_bookmark(){
        $selectPrep = self::$bdd->prepare('INSERT INTO favoris(user_id, url) VALUES(?,?)');
        $selectPrep->execute(array($_SESSION['id'],$_GET['idArticle']));
        header('Location: index.php');
    }
    public function dell_bookmark(){
        $selectPrep = self::$bdd->prepare('DELETE FROM favoris WHERE favoris.user_id = ? AND url = ?');
        $selectPrep->execute(array($_SESSION['id'],$_GET['idArticle']));
        header('Location: index.php');
    }
    public function verifArticleFav($resp): bool
    {
        $selectPrep = self::$bdd->prepare('SELECT * FROM favoris INNER JOIN article ON favoris.url = article.id WHERE favoris.user_id = ? AND article.id = ?');
        $selectPrep->execute(array($_SESSION['id'],$resp));
        $result = $selectPrep->fetchall();
        if (count($result) == 1){
            return true;
        } else {
            return false;
        }
    }
    public function add_articlePayant(){
            $selectPrepare = self::$bdd->prepare('INSERT INTO payant(user_id, article_id) VALUES(?,?)');
            $selectPrepare->execute(array($_SESSION['id'],$_GET['idArticle']));
        header('Location: index.php?module=mod_article&action=detail&id='.$_GET['idArticle']);
    }

    public function verifArticlePayant($resp){
        $selectPrep = self::$bdd->prepare('SELECT * FROM payant WHERE article_id = ?');
        $selectPrep->execute(array($resp));
        return $selectPrep->fetchAll();
    }
    public function verifLike($resp): bool
    {
        $selectPrep = self::$bdd->prepare('SELECT * FROM like_article WHERE user_id = ? AND article_id = ?');
        $selectPrep->execute(array($_SESSION['id'],$resp));
        $result = $selectPrep->fetchall();
        if (count($result) == 1){
            return true;
        } else {
            return false;
        }
    }
    public function verifSignalement($resp): bool{
        $selectPrep = self::$bdd->prepare('SELECT * FROM signalement WHERE user_id = ? AND article_id = ?');
        $selectPrep->execute(array($_SESSION['id'],$resp));
        $result = $selectPrep->fetchall();
        if (count($result) == 1){
            return true;
        } else {
            return false;
        }
    }
    public function ajt_signalement(){
        $selectPrep = self::$bdd->prepare('INSERT INTO signalement(user_id, article_id) VALUES(?,?)');
        $selectPrep->execute(array($_SESSION['id'],$_GET['idArticle']));
        header('Location: index.php');
    }

}
