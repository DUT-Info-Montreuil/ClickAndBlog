<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="public/style/bulma.min.css">
</head>
<body>
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


