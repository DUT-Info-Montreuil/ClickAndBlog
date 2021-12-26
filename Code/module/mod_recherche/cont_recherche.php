<?php
include_once 'modele_recherche.php';
include_once 'vue_recherche.php';

class ControleurRecherche
{
    private $modele;
    private $vue;

    public function __construct()
    {
        $this->vue = new VueRecherche();
        $this->modele = new ModeleRecherche();
    }
    public function search(){
        $this->vue->affiche_moteur_recherche($this->modele->moteur_recherche());
    }
    public function getVue(): VueRecherche
    {
        return $this->vue;
    }
}

?>