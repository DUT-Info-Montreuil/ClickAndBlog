<?php
include_once 'cont_connexion.php';
require_once 'module/mod_generique.php';
class ModConnexion extends ModGenerique{
    public function __construct() {
        $this->controlleur = new ContConnexion();
//        parent::__Construct();
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        } else {
            $this->controlleur;
        }
        switch($this->action){
            case "connexion":
                $this->controlleur->connect();
                break;
            case "deconnexion":
                $this->controlleur->deconnect();
                break;
            case "creation":
                $this->controlleur->vue_creation();
                break;
            case "validation":
                $this->controlleur->create();
                break;
        }
    }
    public function getControlleur()
    {
        return $this->controlleur;
    }
}
?>