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
        $selectPrep = self::$bdd->prepare('UPDATE user_connect SET bio = ? where id = ?');
        $selectPrep->execute(array($_POST['bio'], $_SESSION['id']));
        header('Location: index.php?module=mod_gestion&action=profil');
    }

    public function sauvegarde_securite()
    {
        $current = $_POST['current'];
        $password = $_POST['password'];
        $id = $_SESSION['id'];
        var_dump($current, $password, $id);
        $check_user_exist = self::$bdd->prepare('SELECT * FROM user_connect WHERE id = ? and password = ?');
        $check_user_exist->execute(array($id, $current));
        $result = $check_user_exist->fetchAll();
        if (count($result) < 1) {
            echo "mdp incorrect";
        } else {
            try {
                $requete = self::$bdd->prepare('UPDATE user_connect SET password = ? where id = ?');
                $requete->execute(array(hash('sha256', $password), $id));
            } catch (PDOException $p) {
                echo $p->getCode() . $p->getMessage();
            }
        }
        header('Location: index.php?module=mod_connexion&action=deconnexion');
    }

    public function get_infos()
    {
        $selectPrep = self::$bdd->prepare('SELECT * FROM user_connect WHERE id = ?');
        $selectPrep->execute(array($_SESSION['id']));
        while ($user = $selectPrep->fetch(PDO::FETCH_OBJ)) {
            $result[] = array('nom' => $user->nom, 'prenom' => $user->prenom, 'username' => $user->username, 'bio' => $user->bio);
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