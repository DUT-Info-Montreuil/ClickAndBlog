<?php
if(!defined('CONST_INCLUDE')){
    die('interdit !');
}
include_once 'cont_recherche.php';
require_once 'module/mod_generique.php';
class ModRecherche extends ModGenerique
{
    public function __construct()
    {
        $this->controlleur = new ControleurRecherche();
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
            switch ($this->action) {
                case "search":
                    $this->controlleur->search();
                    break;
                default:
                    echo 'Val inconnue';
                    break;
            }
        }
    }
    public function getControlleur()
    {
        return $this->controlleur;
    }
}

?>