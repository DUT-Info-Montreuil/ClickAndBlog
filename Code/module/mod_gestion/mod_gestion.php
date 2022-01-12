<?php
include_once 'cont_gestion.php';
require_once 'module/mod_generique.php';
class ModGestion extends ModGenerique{
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
            case "article":
                $this->controlleur->affichage_form_art();
                break;
            case "sauvegarde_profil":
                $this->controlleur->sauvegarde_profil();
                break;
            case "delete_compte":
                $this->controlleur->delete_compte();
                break;
            case "compte":
                $this->controlleur->gestion_compte();
                break;
            case "securite":
                $this->controlleur->gestion_securite();
                break;
            case "sauvegarde_securite":
                $this->controlleur->sauvegarde_securite();
                break;
        }
    }
    public function getControlleur()
    {
        return $this->controlleur;
    }
}
?>