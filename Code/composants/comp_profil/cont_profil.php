<?php
include_once('modele_profil.php');
include_once ('vue_profil.php');
class ContProfil{
    protected $modele;
    protected $vue;
    public function __construct() {
        $this->modele = new ModeleProfil();
        $this->vue = new VueProfil();
    }
    public function affiche(){
        $var = $this->vue->affiche_icon($this->modele->getContent(), true);
        echo $var;
    }
}
