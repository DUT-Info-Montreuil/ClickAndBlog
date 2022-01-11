<?php
include_once('modele_article.php');
include_once ('vue_article.php');
include_once('module/mod_commentaire/cont_commentaire.php');
class ContArticle{
    private $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleArticle();
        $this->vue = new VueArticle();
    }
    public function liste(){
        foreach ($this->modele->getListe() as $value){
            if(isset($_SESSION['login'])){
                $this->vue->affiche_liste($value,$this->modele->verifArticleFav($value['id']));
            } else {
                $this->vue->affiche_liste($value,false);
            }
        }
    }
    public function details(){
        foreach ($this->modele->getDetail() as $row){
            if(isset($_SESSION['login'])){
                $this->vue->affiche_detail($row,$this->modele->verifLike($row['id']));
            } else {
                $this->vue->affiche_detail($row,false);
            }
            $this->vue->affiche_commentaire($this->modele->getCommentaires());
        }
    }
    public function ajout(){
        $this->modele->ajout_article();
    }
    public function ajout_fav(){
        $this->modele->add_bookmark();
    }
    public function supp_fav(){
        $this->modele->dell_bookmark();
    }
    public function ajt_like(){
        $this->modele->add_like();
    }
    public  function retir_like(){
        $this->modele->retirer_like();
    }

    public function categorie(){
        foreach ($this->modele->getArticleBYCateg() as $value){
            if(isset($_SESSION['login'])){
                $this->vue->affiche_liste($value,$this->modele->verifArticleFav($value['id']));
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