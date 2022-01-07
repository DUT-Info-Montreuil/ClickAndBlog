<?php
include_once('modele_article.php');
include_once ('vue_article.php');
include_once('module/mod_favoris/modele_favoris.php');
include_once('module/mod_commentaire/cont_commentaire.php');
class ContArticle{
    private $modele;
    private $vue;
    private $fav_verif;
    public function __construct() {
        $this->modele = new ModeleArticle();
        $this->fav_verif = new ModeleFavoris();
        $this->vue = new VueArticle();
    }
    public function liste(){
        foreach ($this->modele->getListe() as $value){
            if(isset($_SESSION['login'])){
                $this->vue->affiche_liste($value,$this->fav_verif->verifArticleFav($value['id']));
            } else {
                $this->vue->affiche_liste($value,false);
            }

        }
    }
    public function details(){
        $this->vue->affiche_detail($this->modele->getDetail());
        $this->vue->affiche_commentaire($this->modele->getCommentaires());
    }
    public function form_ajout(){
        $this->vue->form_ajout_article();
    }
    public function ajout(){
        $this->modele->ajout_article();
    }
    public function categorie(){
        foreach ($this->modele->getArticleBYCateg() as $value){
            if(isset($_SESSION['login'])){
                $this->vue->affiche_liste($value,$this->fav_verif->verifArticleFav($value['id']));
            } else {
                $this->vue->affiche_liste($value,false);
            }

        }
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