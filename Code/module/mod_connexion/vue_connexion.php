<?php
class VueConnexion{
    public function form_ajout_vue(){
//        echo '
//        <form action="index.php?module=mod_connexion&action=connexion" method="post">
// <p>Votre email : <input type="email" id="mail" name="mail" placeholder="mail@gmail.com" required/></p>
// <p>Votre mot de passe : <input type="password" id="pass" name="pass" required /></p>
// <p><input type="submit" value="Envoyer"></p>
//</form>
//        ';
        echo'
<div>
<h1 class="title">
Créer un compte
</h1>
<p class="subtitle">
Une fois votre compte créé, vous pourrez directement commencer à naviguer sur notre site
</p>
</div>
<form action="index.php?module=mod_connexion&action=connexion" method="post">
        <div class="field" style="width: 40%">
          <p>
            <input class="input" type="text" id="name" name="name" placeholder="Nom" required/>
          </p>  
        </div>
   
        <div class="field" style="width: 40%">
          <p>
            <input class="input" type="text" id="name" name="name" placeholder="Prenom" required/>
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
     <input class="input" type="password" id="pass" name="pass" required placeholder="**********" />
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field" style="width: 40%">
  <p class="control has-icons-left">
     <input class="input" type="password" id="pass" name="pass" required placeholder="Confirmer" />
    <span class="icon is-small is-left">
      <i class="fas fa-lock"></i>
    </span>
  </p>
</div>
<div class="field">
  <p class="control">
    <button class="button is-info">
      S\'inscrire
    </button>
  </p>
</div>
</form>
<h2>Vous avez déja un compte ?  <a class=" has-text-info"> Connectez-vous </a></h2>
        ';
    }

    public function form_failed(){
        echo "Mauvais mdp";
    }
}