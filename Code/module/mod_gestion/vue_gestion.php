<?php
if(!defined('CONST_INCLUDE')){
    die('interdit !');
}
class VueGestion extends VueGenerique
{

    public function vue_menu($infos)
    {
        ?>
        <div id="vue_gestion" class="media">
            <div class="media-left">
                <figure class="image is-96x96">
                    <img class="is-rounded" src="public/image/photo-avatar-profil.png" alt="Placeholder image">
                </figure>
            </div>
            <div class="media-content">
                <!--                <p class="title is-4">--><?//=$_SESSION["prenom"]," ",$_SESSION["nom"]
                ?><!--</p>-->
                <!--                <p class="subtitle is-6">@--><?//=$_SESSION["username"]
                ?><!--</p>-->
                <p class="title is-4"><?= $infos[0]['nom'], " ", $infos[0]['prenom'] ?></p>
                <p class="subtitle is-6"><?= $infos[0]['username'] ?></p>
                <P class="subtitle is-6"><?= $infos[0]['bio'] ?></p>
            </div>
        </div>
        <div class="tabs is-centered">
            <ul>
                <li><a href="index.php?module=mod_gestion&action=profil">Profil</a></li>
                <li><a href="index.php?module=mod_gestion&action=compte">Compte</a></li>
                <li><a href="index.php?module=mod_gestion&action=securite">Sécurité</a></li>
                <li><a href="index.php?module=mod_gestion&action=article">Article</a></li>
                <?php
                if ($infos[0]['admin'] == 1){
                 ?>
                  <li><a href="index.php?module=mod_gestion&action=admin_option">Admin</a></li>
                  <?php
                }
                ?>
            </ul>
        </div>
        <?php
    }

    public function vue_profil()
    {
        ?>
        <form action="index.php?module=mod_gestion&action=sauvegarde_profil" method="post">
            <div class="field">
                <label class="label is-medium">Modifiez vos informations :</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="text" id="nom" name="nom" placeholder="Nom">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="text" id="prenom" name="prenom" placeholder="Prénom">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="text" id="username" name="username"
                           placeholder="Nom d'utilisateur">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <div class="control has-icons-left has-icons-right">
                    <textarea class="textarea" id="bio" name="bio" placeholder="bio"></textarea>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <p class="control">
                    <button class="button is-info">
                        Sauvegarder
                    </button>
                </p>
            </div>
        </form>
        <?php
    }

    public function vue_compte($favoris, $signalement, $brouillon)
    {
        ?>
        <p class="title is-4">Vous retrouverez ici vos favoris ainsi que l'option pour supprimer votre compte</p>
        <div class="media-content">
            <p class="subtitle is-4">Mes Favoris : </p>
            <?php
            VueGestion::vue_article_gestion($favoris,0);
            ?>
            <p class="subtitle is-4">Mes Signalements : </p>
            <?php
            VueGestion::vue_article_gestion($signalement,999);
            ?>
            <P class="subtitle is-4">Mes brouillons : </p>
            <?php
            VueGestion::vue_article_gestion($brouillon,1)
            ?>
        </div>
        <a href="index.php?module=mod_gestion&action=delete_compte">
            <button class="button is-danger ">Supprimer compte</button>
        </a>
        <?php
    }

    public static function vue_article_gestion($articles,$type){
        foreach ($articles as $row) {
            ?>
            <div class="card" id="card_article" xmlns:a="http://www.w3.org/1999/html">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="<?= $row['image'] ?>" alt="<?= $row['alt_image'] ?>">
                    </figure>
                </div>

                <div id="subtile_article">
                    <a>
                        <hr>
                        <p class="subtitle"><?= $row['categorie'] ?></p>
                    </a>
                </div>

                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <?php if ($type==0) : ?>
                            <a href="index.php?module=mod_article&action=detail&id=<?= $row['url'] ?>">
                                <p class="title is-4"><?= $row['titre'] ?></p>
                            </a>
                            <a href="index.php?module=mod_gestion&action=delete_favori&url=<?=$row['url']?>"><button class="button is-success">retirer fav</button></a>
                            <?php elseif ($type==1) : ?>
                            <a href="index.php?module=mod_gestion&action=publier_art&idArticle=<?=$row['id']?>"><button class="button is-success">publier</button></a>
                            <?php else : ?>
                            <a href="index.php?module=mod_gestion&action=delete_signalement&id_signalement=<?= $row['id'] ?>"><button class="button is-success">désignaler</button></a>
                            <?php endif ?>
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
                        <time datetime="2016-1-1"><?= $row['date'] ?></time>
                        <i class="far fa-clock"></i>
                        <span><?= $row['time_read'] ?> min</span>
                    </div>
                </div>
            </div>
            <?php
        }
    }


    public function vue_securite()
    {
        ?>
        <form action="index.php?module=mod_gestion&action=sauvegarde_securite" method="post">
            <div class="field" style="width: 50%">
                <label class="label is-medium">Modifiez vos informations :</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="password" id="current" name="current"
                           placeholder="Mot de passe actuel">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field" style="width: 50%">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="password" id="password" name="password"
                           onchange="check_update_pass()" placeholder="Nouveau mot de passe">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field" style="width: 50%">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="password" id="confirm_update_pass" name="confirm_update_pass"
                           onchange="check_update_pass()" placeholder="Confirmer nouveau mot de passe">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <p class="control">
                    <button class="button is-info" id="submit_pw" name="submit" value="Sauvegarder">
                        Sauvegarder
                    </button>
                </p>
            </div>
        </form>
        <?php
    }

    public function vue_article($categorie)
    {
        ?>
        <h1 class="title is-2">Publier un article :</h1>
        <br>
        <form action="index.php?module=mod_article&action=ajout" method="post" enctype="multipart/form-data">
            <div class="field">
                <label for="titre">Entrer le nom du titre: </label>
                <input class="input" type="text" name="titre" id="titre" required>
            </div>
            <div class="field">
                <label for="contenue">Entrer un contenue: </label>
                <textarea id="contenue" cols="86" rows="20" name="contenue"></textarea>
            </div>
            <div class="field">
                <label>Entrer la catégorie de l'article : </label>
                <div class="select">
                    <select name="categories_art" id="categories_art">
                            <?php
                            foreach ($categorie as $display_cat) {
                                ?>
                                <option>
                                <?= $display_cat['titre'] ?>
                            </option>
                                <?php
                            }
                            ?>
                    </select>
                </div>
            </div>
            <div class="field">
                <label for="image">Image a envoyer : </label>
                <div class="file is-boxed">
                    <label class="file-label">
                        <input class="file-input" type="file" name="image" id="image">
                        <span class="file-cta">
                            <span class="file-icon">
                                <i class="fas fa-upload"></i>
                            </span>
                        <span class="file-label">
                        Choisissez un fichier...
                        </span>
                    </span>
                    </label>
                </div>
            </div>
            <div class="field">
                <label for="alt_image">Entrer la description de l'image : </label>
                <input class="input" type="text" name="alt_image" id="alt_image">
            </div>
            <div class="field">
                <label for="date">Entrer la date : </label>
                <input type="date" name="date" id="date">
            </div>
            <div class="field">
                <label>Publiez l'article : </label>
                <input type="radio" name="etat" id="checkTrue" value="1">
                <label for="checkTrue">OUI</label>
                <input type="radio" name="etat" id="checkFalse" value="0">
                <label for="checkFalse">NON</label>
            </div>
            <div class="field">
                <button class="button" type="submit" name="submit">Envoyer</button>
            </div>
        </form>
        <?php
    }
    public function vue_admin($resp,$listeUsr){
        ?>
            <h1 class="title">Administration des articles :</h1>
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>Signalement</th>
                <th>Like</th>
                <th>Categorie</th>
                <th>Archive</th>
                <th>Publier</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($resp as $rep){
            ?>
            <tr>
                <th><?=$rep['id']?></th>
                <td><a href="index.php?module=mod_article&action=detail&id=<?=$rep['id']?>"><?=$rep['titre']?></a>
                </td>
                <td><?=$rep['user_id']?></td>
                <?php if ($rep['nbSignalements'] >= 7):?>
                <td class="is-danger"><?=$rep['nbSignalements']?></td>
                <?php else: ?>
                    <td><?=$rep['nbSignalements']?></td>
                <?php endif ?>
                <td><?=$rep['nbLikes']?></td>
                <td><?=$rep['categorie']?></td>
                <?php if ($rep['archive'] == 0):?>
                <td><a href="index.php?module=mod_gestion&action=archiver_art&idArticle=<?=$rep['id']?>"><button class="button is-danger">Archiver</button></a></td>
                <?php else: ?>
                    <td><a href="index.php?module=mod_gestion&action=retirer_archive&idArticle=<?=$rep['id']?>"><button class="button is-danger">Retirer Archive</button></a></td>
                <?php endif ?>
                <?php if ($rep['etat'] == 0):?>
                    <td><a href="index.php?module=mod_gestion&action=publier_art&idArticle=<?=$rep['id']?>"><button class="button is-success">OUI</button></a></td>
                <?php else: ?>
                    <td>Article deja publier</td>
                    <?php endif ?>
                <td><button class="button is-success">Modifier</button><a href="index.php?module=mod_gestion&action=supprimer_art&idArticle=<?=$rep['id']?>"><button class="button is-danger">Supprimer</button></a></td>
            </tr>
            <?php
            }
?>
            </tbody>
        </table>
        <h1 class="title">Administration des utilisateurs :</h1>
        <table class="table">
            <thead>
            <tr>
                <th>id</th>
                <th>Nom d'utilisateur :</th>
                <th>Email</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Bio</th>
                <th>Signalement</th>
                <th>Favoris</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($listeUsr as $usr){
                ?>
                <tr>
                    <th><?=$usr['id']?></th>
                    <td><a href="index.php?module=mod_utilisateur&action=profil&id_user=<?=$usr['id']?>"><?=$usr['username']?></a>
                    </td>
                    <td><?=$usr['email']?></td>
                    <td><?=$usr['nom']?></td>
                    <td><?=$usr['prenom']?></td>
                    <td><?=$usr['bio']?></td>
                    <td><?=$usr['nbSignalements']?></td>
                    <td><?=$usr['articles_favoris']?></td>
                    <td><button class="button is-success">Modifier</button><a href="index.php?module=mod_gestion&action=delete_compte_adm&idUser=<?=$usr['id']?>"><button class="button is-danger">Supprimer</button></a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
<?php
    }
}

?>
