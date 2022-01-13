<?php
include_once('modele_commentaire.php');
include_once('vue_commentaire.php');
class ContCommentaire{
    private $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleCommentaire();
        $this->vue = new VueCommentaire();
    }

    public function affiche(){
        $this->vue->form_ajout_commentaire();
        $this->vue->affiche_liste($this->modele->getListe());
    }

    public function ajout(){
        $this->modele->ajout_commentaire();
    }

    /**
     * @return ModeleCommentaire
     */
    public function getModele(): ModeleCommentaire
    {
        return $this->modele;
    }

    /**
     * @return VueCommentaire
     */
    public function getVue(): VueCommentaire
    {
        return $this->vue;
    }

}