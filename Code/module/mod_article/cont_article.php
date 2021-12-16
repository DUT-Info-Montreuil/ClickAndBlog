<?php
include_once('modele_article.php');
include_once ('vue_article.php');
class ContArticle{
    private $modele;
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
    public function form_ajout(){
        $this->vue->form_ajout_article();
    }
    public function ajout(){
        $this->modele->ajout_article();
    }
    public function categorie(){
        $this->vue->affiche_liste($this->modele->getArticleBYCateg());
    }

    public function envoie_image(){
        $this->modele->env_img();
    }
    public function bienvenue(){
        echo "Hello World ! ";
    }

    /**
     * @return ModeleArticle
     */
    public function getModele(): ModeleArticle
    {
        return $this->modele;
    }

    /**
     * @return VueArticle
     */
    public function getVue(): VueArticle
    {
        return $this->vue;
    }
}