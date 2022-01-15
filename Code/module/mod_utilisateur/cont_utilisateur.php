<?php
include_once 'modele_utilisateur.php';
include_once 'vue_utilisateur.php';
class ContUtilisateur{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleUtilisateur();
        $this->vue = new VueUtilisateur();
        $this->vue->vue_utilisateur($this->modele->get_infos());
    }

    public function vue_profil(){

    }

     /**
     * @return ModeleUtilisateur
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @return VueUtilisateur
     */
    public function getVue()
    {
        return $this->vue;
    }

}
?>