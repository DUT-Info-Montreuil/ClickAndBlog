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
            </ul>
        </div>
        <?php
    }

    public function vue_profil()
    {
        ?>
            <div class="field">
                <label class="label is-medium">Modifiez vos informations :</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="email" placeholder="Nom">
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
                <input class="input is-medium" type="email" placeholder="Prénom">
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
                <input class="input is-medium" type="email" placeholder="Nom d'utilisateur">
                <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
            </div>
        </div>
        <?php
    }

}
?>
