<?php
include_once 'modele_connexion.php';
include_once 'vue_connexion.php';
class ContConnexion{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
        $this->vue->form_ajout_vue();
    }
    public function connect(){
        $this->modele->verif_pwd();
    }
    public function deconnect(){
        $this->modele->decon_user();
    }

}
?>