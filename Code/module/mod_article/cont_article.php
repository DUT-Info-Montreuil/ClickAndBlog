<?php
include_once('modele_article.php');
include_once ('vue_article.php');
class ContArticle{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleArticle();
        $this->vue = new VueArticle();

    }
    public function liste(){
        $this->vue->affiche_liste($this->modele->getListe());
    }
    public function details(){
        $this->vue->affiche_detail($this->modele->getDetail());
    }
    public function bienvenue(){
        echo "Hello World ! ";
    }
}