<?php
if(!defined('CONST_INCLUDE')){
    die('interdit !');
}
include_once 'vue_recherche.php';

class ControleurRecherche
{

    private $vue;

    public function __construct()
    {
        $this->vue = new VueRecherche();
    }
    public function search(){
        $this->vue->affiche_moteur_recherche();
    }
    public function getVue(): VueRecherche
    {
        return $this->vue;
    }
}

?>