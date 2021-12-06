<?php
session_start();
require_once 'header.php';
?>
<section class="container">
<?php
include_once 'connexion.php';
Connexion::initConnexion();
if(isset($_GET['module'])){
    switch ($_GET['module']){
        case "mod_article":
            include 'module/mod_article/mod_article.php';
            $main = new ModArticle();
            break;
        case "mod_connexion":
            include 'module/mod_connexion/mod_connexion.php';
            $main = new ModConnexion();
            break;
        default:
            echo "Erreur";
            break;
    }
} else {
    include 'module/mod_article/mod_article.php';
    $article = new ModArticle();
}
?>
</section>
</body>
</html>


