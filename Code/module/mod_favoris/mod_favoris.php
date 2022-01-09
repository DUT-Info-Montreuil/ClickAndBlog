<?php
include_once 'cont_favoris.php';
require_once 'module/mod_generique.php';

class ModFavoris extends ModGenerique
{
    public function __construct()
    {
        $this->controlleur = new ContFavoris();
        if (isset($_GET['action'])) {
            $this->action = $_GET['action'];
        } else {
            $this->controlleur;
        }
        switch ($this->action) {
            case("ajout_favoris"):
                $this->controlleur->bookmark();
                break;
            case("supp_favoris"):
                $this->controlleur->delete_bookmark();
                break;
        }
    }

    public function getControlleur()
    {
        return $this->controlleur;
    }
}