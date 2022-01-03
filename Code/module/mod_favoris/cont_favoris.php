<?php
include_once 'modele_favoris.php';
include_once 'vue_favoris.php';
class ContFavoris{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleFavoris();
        $this->vue = new VueFavoris();
    }
    public function bookmark(){
        $this->modele->add_bookmark();
    }
    public function getModele(): ModeleConnexion
    {
        return $this->modele;
    }


    public function getVue(): VueConnexion
    {
        return $this->vue;
    }
}
