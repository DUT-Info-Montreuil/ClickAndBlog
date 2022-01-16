<?php
if(!defined('CONST_INCLUDE')){
    die('interdit !');
}
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
        $this->vue->vue_article($this->modele->getCategorie());
    }

    public function sauvegarde_profil()
    {
        $this->modele->sauvegarde_profil();
    }

    public function sauvegarde_securite()
    {
        $this->modele->sauvegarde_securite();
    }

    public function delete_compte()
    {
        $this->modele->delete_compte();
    }

    public function gestion_compte()
    {
        $this->vue->vue_compte($this->modele->get_favoris(),$this->modele->get_signalements());
    }

    public function gestion_securite()
    {
        $this->vue->vue_securite();
    }

    public function delete_signalement()
    {
        $this->modele->delete_signalement();
    }

    public function admin_opt(){
        $this->vue->vue_admin();
    }

     /**
     * @return ModeleGestion
     */
    public function getModele()
    {
        return $this->modele;
    }

    /**
     * @return VueGestion
     */
    public function getVue()
    {
        return $this->vue;
    }

}
?>