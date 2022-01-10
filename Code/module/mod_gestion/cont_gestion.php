<?php
include_once 'modele_gestion.php';
include_once 'vue_gestion.php';
class ContGestion{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleGestion();
        $this->vue = new VueGestion();
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