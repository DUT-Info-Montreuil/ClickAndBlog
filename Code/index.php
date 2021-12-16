<?php
session_start();
define('CONST_INCLUDE', NULL);
require_once 'connexion.php';
require_once 'vue_generique.php';
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
    $main = new ModArticle();
}
$contenuTampon = $main->getControlleur()->getVue()->getAffichage();
require_once 'template/header.php';
?>
<section class="container">
<?php
echo $contenuTampon;
require_once 'template/footer.php';