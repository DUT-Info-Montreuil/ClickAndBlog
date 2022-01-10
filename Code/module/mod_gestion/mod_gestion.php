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
            case "password":
                $this->controlleur->vue_password();
                break;
        }
    }
    public function getControlleur()
    {
        return $this->controlleur;
    }
}
?>