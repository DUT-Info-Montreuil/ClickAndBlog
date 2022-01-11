<?php
include_once 'modele_gestion.php';
include_once 'vue_gestion.php';
class ContGestion{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleGestion();
        $this->vue = new VueGestion();
        $this->vue->vue_menu($this->modele->get_infos());
    }

    public function vue_profil()
    {
        $this->vue->vue_profil();
    }
    public function affichage_form_art(){
        $this->vue->vue_article();
    }

    public function sauvegarde_profil()
    {
        $this->modele->sauvegarde_profil();
    }

    public function delete_compte()
    {
        $this->modele->delete_compte();
    }

    public function vue_compte()
    {
        $this->vue->vue_compte();
    }

     /**
     * @return ModeleGestion
     */
    public function getModele(): ModeleGestion
    {
        return $this->modele;
    }

    /**
     * @return VueGestion
     */
    public function getVue(): VueGestion
    {
        return $this->vue;
    }

}
?>