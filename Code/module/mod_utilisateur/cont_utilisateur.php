<?php
include_once 'modele_utilisateur.php';
include_once 'vue_utilisateur.phps.php';
class ContUtilisateur{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleGestion();
        $this->vue = new VueGestion();
        $this->vue->vue_menu($this->modele->get_infos());
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