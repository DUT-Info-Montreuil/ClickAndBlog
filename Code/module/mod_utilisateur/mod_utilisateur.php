<?php
include_once 'cont_utilisateur.php.php';
require_once 'module/mod_generique.php';
class ModUtilisateur extends ModGenerique{
    public function __construct() {
        $this->controlleur = new ContGestion();
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        } else {
            $this->controlleur;
        }
        switch($this->action){
            case "profil":
                $this->controlleur->vue_profil();
                break;
        }
    }
    public function getControlleur()
    {
        return $this->controlleur;
    }
}
?>