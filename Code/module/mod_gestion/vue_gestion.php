<?php
class VueGestion extends VueGenerique {

    public function vue_menu()
    {
        ?>
        <div id="vue_gestion" class="media">
            <div class="media-left">
                <figure class="image is-96x96">
                        <img class="is-rounded" src="public/image/photo-avatar-profil.png" alt="Placeholder image">
                </figure>
            </div>
            <div class="media-content">
                <p class="title is-4">Prénom Nom</p>
                <p class="subtitle is-6">@username</p>
            </div>
        </div>
        <div class="tabs is-centered">
            <ul>
                <li><a href="index.php?module=mod_gestion&action=profil">Profil</a></li>
                <li><a href="index.php?module=mod_gestion&action=compte">Compte</a></li>
                <li><a href="index.php?module=mod_gestion&action=securite">Sécurité</a></li>
                <li><a href="index.php?module=mod_gestion&action=article">Article</a></li>
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
            <p class="control">
                <button class="button is-info">
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
