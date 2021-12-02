<?php
class VueConnexion{
    public function form_ajout_vue(){
        echo '
        <form action="index.php?module=mod_connexion&action=connexion" method="post">
 <p>Votre email : <input type="email" id="mail" name="mail" placeholder="mail@gmail.com" required/></p>
 <p>Votre mot de passe : <input type="password" id="pass" name="pass" required /></p>
 <p><input type="submit" value="Envoyer"></p>
</form>
        ';
    }

    public function form_failed(){
        echo "Mauvais mdp";
    }
}