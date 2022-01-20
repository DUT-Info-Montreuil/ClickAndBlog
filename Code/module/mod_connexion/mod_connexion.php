<?php
include_once 'cont_connexion.php';
class ModConnexion{
    private $action;
    private $controlleur;
    public function __construct() {
        $this->controlleur = new ContConnexion();
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
        }
    }

}
?>