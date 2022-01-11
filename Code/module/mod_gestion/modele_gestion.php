<?php

class ModeleGestion extends Connexion
{

    public function sauvegarde_profil()
    {
        $selectPrep = self::$bdd->prepare('UPDATE user_connect SET nom = ? where id = ?');
        $selectPrep->execute(array($_POST['nom'], $_SESSION['id']));
        header('Location: index.php?module=mod_gestion&action=profil');
    }
}

?>