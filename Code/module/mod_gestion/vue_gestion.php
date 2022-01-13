<?php
class VueGestion extends VueGenerique {

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
<!--                <p class="title is-4">--><?//=$_SESSION["prenom"]," ",$_SESSION["nom"]?><!--</p>-->
<!--                <p class="subtitle is-6">@--><?//=$_SESSION["username"]?><!--</p>-->
                <p class="title is-4"><?=$infos[0]['nom']," ",$infos[0]['prenom']?></p>
                <p class="subtitle is-6"><?=$infos[0]['username']?></p>
                <P class="subtitle is-6"><?=$infos[0]['bio']?></p>
            </div>
        </div>
        <div class="tabs is-centered">
            <ul>
                <li><a href="index.php?module=mod_gestion&action=profil">Profil</a></li>
                <li><a href="index.php?module=mod_gestion&action=compte">Compte</a></li>
                <li><a href="index.php?module=mod_gestion&action=securite">Sécurité</a></li>
                <li><a href="index.php?module=mod_gestion&action=article">Article</a></li>
                <li><a href="index.php?module=mod_gestion&action=article">admin</a></li>
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
                <input class="input is-medium" type="text" id="username" name="username" placeholder="Nom d'utilisateur">
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

    public function vue_compte($favoris,$signalement)
    {
        ?>
        <p class="title is-4">Vous retrouverez ici vos favoris ainsi que l'option pour supprimer votre compte</p>
        <div class="media-content">
            <p class="subtitle is-4">Mes Favoris : </p>
            <?php
            foreach ($favoris as $row) {
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
                    </div>
                
                    <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                        <a href="index.php?module=mod_article&action=detail&id=<?=$row['url']?>">
                        <p class="title is-4"><?=$row['titre']?></p>
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
            ?>
            <p class="subtitle is-4">Mes Signalements : </p>
            <?php
            foreach($signalement as $row){
                ?>
                <div class="content">
                    <a href="index.php?module=mod_gestion&action=delete_signalement&id_signalement=<?=$row['id']?>">
                        <p class="subtitle"><?=$row['titre']?></p>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
            <a href="index.php?module=mod_gestion&action=delete_compte">         
                <button class="button is-danger ">Supprimer compte</button>
            </a>
        <?php
    }

    

    public function vue_securite()
    {
        ?>
        <form action="index.php?module=mod_gestion&action=sauvegarde_securite" method="post">
            <div class="field" style="width: 50%">
                <label class="label is-medium">Modifiez vos informations :</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="password" id="current" name="current" placeholder="Mot de passe actuel">
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
                    <input class="input is-medium" type="password" id="password" name="password" onchange="check_update_pass()" placeholder="Nouveau mot de passe">
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
                    <input class="input is-medium" type="password" id="confirm_update_pass" name="confirm_update_pass" onchange="check_update_pass()" placeholder="Confirmer nouveau mot de passe">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <h1>!!!!!! Changez pas de mot de passe, il me reste un truc à réger</h1>
                <p class="control">
                    <button class="button is-info" id="submit_pw" name="submit"  value="Sauvegarder">
                        Sauvegarder
                    </button>
                </p>
            </div>
        </form>
        <?php
    }

    public function vue_article()
    {
        ?>
        <form action="index.php?module=mod_article&action=ajout" method="post"  enctype="multipart/form-data" class="form-example">
            <div class="form-example">
                <label for="titre">Entrer le nom du titre: </label>
                <input type="text" name="titre" id="titre" required>
            </div>
            <div class="form-example">
                <label for="contenue">Entrer un contenue: </label>
                <textarea id="contenue" cols="86" rows ="20" name="contenue"></textarea>
            </div>
            <div class="form-example">
                <label for="categories_art">Entrer la catégorie de l'article : </label>
                <input type="text" name="categories_art" id="categories_art">
            </div>
            <div class="form-example">
                <label for="image">Image a envoyer : </label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-example">
                <label for="alt_image">Entrer la description de l'image : </label>
                <input type="text" name="alt_image" id="alt_image">
            </div>
            <div class="form-example">
                <label for="date">Entrer la date : </label>
                <input type="date" name="date" id="date">
            </div>
            <div class="form-example">
                <label>Publiez l'article : </label>
                <input type="radio" name="etat" id="checkTrue" value="1">
                <label for="checkTrue">OUI</label>
                <input type="radio" name="etat" id="checkFalse" value="0">
                <label for="checkFalse">NON</label>
            </div>
            <div class="form-example">
                <button type="submit" name="submit">Envoyer</button>
            </div>
        </form>
        <?php
    }
}
?>
