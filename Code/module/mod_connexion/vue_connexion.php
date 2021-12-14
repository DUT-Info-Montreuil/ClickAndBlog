<?php
class VueConnexion{
    public function form_ajout_vue(){
        ?>
        <div>
        <h1 class="title">
        Créer un compte
        </h1>
        <p class="subtitle">
        Une fois votre compte créé, vous pourrez directement commencer à naviguer sur notre site
        </p>
        </div>
        <form action="index.php?module=mod_connexion&action=connexion&action=validation" method="post">
                <div class="field" style="width: 40%">
                  <p>
                    <input class="input" type="text" id="name" name="lastname" placeholder="Nom" required/>
                  </p>
                </div>

                <div class="field" style="width: 40%">
                  <p>
                    <input class="input" type="text" id="name" name="firstname" placeholder="Prenom" required/>
                  </p>
                </div>

           <div class="field" style="width: 40%">
          <p class="control has-icons-left has-icons-right">
            <input class="input" type="email" id="mail" name="mail" placeholder="mail@gmail.com" required/>
            <span class="icon is-small is-left">
              <i class="fas fa-envelope"></i>
            </span>
            <span class="icon is-small is-right">
              <i class="fas fa-check"></i>
            </span>
          </p>
        </div>
        <div class="field" style="width: 40%">
          <p class="control has-icons-left">
             <input class="input" type="password" id="pass" name="pass" onchange="check_pass()" required placeholder="**********" />
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field" style="width: 40%">
          <p class="control has-icons-left">
             <input class="input" type="password" id="confirm_pass" name="confirm_pass" onchange="check_pass()" required placeholder="Confirmer" />
            <span class="icon is-small is-left">
              <i class="fas fa-lock"></i>
            </span>
          </p>
        </div>
        <div class="field">
          <p class="control">
              <input class="button is-info" type="submit" name="submit"  value="S'inscrire"  id="submit" disabled/>
          </p>
        </div>
        </form>
        <h2>Vous avez déja un compte ?  <a class=" has-text-info"> Connectez-vous </a></h2>
<?php
    }

    public function form_failed(){
        echo "Mauvais mdp";
    }

    public function creation_failed(){
        echo "erreur creation";
    }
}