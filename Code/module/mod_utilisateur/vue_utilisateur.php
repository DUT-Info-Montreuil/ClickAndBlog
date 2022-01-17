<?php
if(!defined('CONST_INCLUDE')){
    die('interdit !');
}
class VueUtilisateur extends VueGenerique {

    public function vue_utilisateur($infos, $abos)
    {

        $photo = ModeleUtilisateur::getPhotoProfil();
        ?>
        <div id="vue_gestion" class="media" xmlns="http://www.w3.org/1999/html">
            <div class="media-left">
                <figure class="image is-96x96">
                        <img class="is-rounded" src="<?=$photo[0]['photoProfil']?>" alt="Placeholder image">
                </figure>
            </div>
            <div class="media-content">
<!--                <p class="title is-4">--><?//=$_SESSION["prenom"]," ",$_SESSION["nom"]?><!--</p>-->
<!--                <p class="subtitle is-6">@--><?//=$_SESSION["username"]?><!--</p>-->
                <p class="title is-4"><?=$infos[0]['nom']," ",$infos[0]['prenom']?></p>
                <p class="subtitle is-6"><?=$infos[0]['username']?></p>
                <P class="subtitle is-6"><?=$infos[0]['bio']?></p>
            </div>
        </div>
        <hr style="margin:auto; margin-bottom: 2%; color:black; background-color:#70a1ff; height:5px; opacity: 0.7;">
        <h2>Abonnés : </h2> <?=$abos['nbAbonnes'][0]['count(abonnement_utilisateur.user_id_abonne)']?>
        <h2>Abonnements :</h2> <?=$abos['nbAbonnements'][0]['count(abonnement_utilisateur.user_id_abonne)']?>
        <?php
    }

    public function affiche_liste($row,$fav)
    {
        ?>
        <div class="card" id="card_article" xmlns:a="http://www.w3.org/1999/html">
            <div class="card-image">
                <figure class="image is-4by3">
                    <img src="<?=$row['image']?>" alt="<?=$row['alt_image']?>">
                </figure>
            </div>

            <div id="subtile_article">
                <a>
                    <hr>
                    <p class="subtitle"><?=$row['categorie']?></p>
                </a>
                <?php if(isset($_SESSION['login']) && $fav == true): ?>
                    <a href="index.php?module=mod_article&action=supp_favoris&idArticle=<?=$row['id']?>" class="is-pulled-right">
                        <i class="fas fa-bookmark"></i>
                    </a>
                <?php elseif(isset($_SESSION['login'])): ?>
                    <a href="index.php?module=mod_article&action=ajout_favoris&idArticle=<?=$row['id']?>" class="is-pulled-right">
                        <i class="far fa-bookmark subtitle"></i>
                    </a>
                <?php endif ?>
            </div>

            <div class="card-content">
                <div class="media">
                    <div class="media-content">
                        <a href="index.php?module=mod_article&action=detail&id=<?=$row['id']?>">
                            <p class="title is-5"><?=$row['titre']?></p>
                        </a>
                    </div>
                </div>
                <div class="content">
                    <!-- TODO Mettre le debut de l'article -->
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                    Phasellus nec iaculis mauris.
                    <a href="#">#hashtag</a>
                    <a href="#">#hashtag2</a>

                    <br>
                    <i class="far fa-calendar"></i>
                    <time datetime="2016-1-1"><?=$row['date']?></time>
                    <i class="far fa-clock"></i>
                    <span><?=$row['time_read']?> min</span>
                </div>
            </div>
        </div>
        <?php
    }

}
?>
