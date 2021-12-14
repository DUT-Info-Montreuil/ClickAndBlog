<?php
include_once 'modele_connexion.php';
include_once 'vue_connexion.php';
class ContConnexion{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleConnexion();
        $this->vue = new VueConnexion();
    }
    public function connect(){
        if ($this->modele->verif_pwd()){
            header("Location: index.php");
        } else {
            $this->vue->form_failed();
        }
    }
    public function deconnect(){
        $this->modele->decon_user();
    }

    public function vue_creation(){
        $this->vue->form_ajout_vue();
    }

    public function create(){
        if ($this->modele->verif_creation()){
            header("Location: index.php");
        } else {
            $this->vue->creation_failed();
        }
    }

}
?>