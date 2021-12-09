<?php
include_once('cont_article.php');
class ModArticle{
    private $action;
    private $controlleur;
    public function __construct() {
        $this->controlleur = new ContArticle();
        if(isset($_GET['action'])){
            $this->action = $_GET['action'];
        } else {
            $this->action = "liste";
        }
        switch($this->action){
            case "bienvenue":
                $this->controlleur->bienvenue();
                break;
            case "liste":
                $this->controlleur->liste();
                break;
            case "detail":
                $this->controlleur->details();
                break;
            case "form":
                $this->controlleur->form_ajout();
                break;
            case "ajout":
                $this->controlleur->ajout();
                break;
            case "categorie":
                $this->controlleur->categorie();
                break;
            default:
                echo "Valeur inconnue ";
                break;
        }

    }
}