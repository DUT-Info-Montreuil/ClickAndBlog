<?php

class ModeleGestion extends Connexion
{

    public function sauvegarde_profil()
    {
        $selectPrep = self::$bdd->prepare('UPDATE user_connect SET nom = ? where id = ?');
        $selectPrep->execute(array($_POST['nom'], $_SESSION['id']));
        $selectPrep = self::$bdd->prepare('UPDATE user_connect SET prenom = ? where id = ?');
        $selectPrep->execute(array($_POST['prenom'], $_SESSION['id']));
        $selectPrep = self::$bdd->prepare('UPDATE user_connect SET username = ? where id = ?');
        $selectPrep->execute(array($_POST['username'], $_SESSION['id']));
        header('Location: index.php?module=mod_gestion&action=profil');
    }

    public function get_infos()
    {
        $selectPrep = self::$bdd->prepare('SELECT * FROM user_connect WHERE id = ?');
        $selectPrep->execute(array($_SESSION['id']));
        while ($user = $selectPrep->fetch(PDO::FETCH_OBJ)) {
            $result[] = array('nom' => $user->nom, 'prenom' => $user->prenom, 'username' => $user->username);
        }
        return $result;
    }

    public function delete_compte()
    {
        $selectPrep = self::$bdd->prepare('DELETE FROM user_connect where id = ?');
        $selectPrep->execute(array($_SESSION['id']));
        header('Location: index.php?module=mod_connexion&action=deconnexion');
    }

}

?>