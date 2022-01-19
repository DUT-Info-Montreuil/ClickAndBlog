<?php
if(!defined('CONST_INCLUDE')){
    die('interdit !');
}
include_once 'modele_utilisateur.php';
include_once 'vue_utilisateur.php';
class ContUtilisateur{
    protected $modele;
    private $vue;
    public function __construct() {
        $this->modele = new ModeleUtilisateur();
        $this->vue = new VueUtilisateur();
        $this->vue->vue_utilisateur($this->modele->get_infos(), $this->modele->get_abonnements(), ContUtilisateur::estAbonne());
    }

    public function vue_profil(){
        $articles = $this->modele->getListeArticles();
        if(count($articles) > 0){
            ?>
                <h1><strong>Articles publiés :</strong></h1>
            <?php
            foreach ($articles as $value){
                if(isset($_SESSION['login'])){
                    if($this->modele->verifSignalement($value['id']) == FALSE){
                        $this->vue->affiche_liste($value,$this->modele->verifArticleFav($value['id']));
                    }
                } else {
                    $this->vue->affiche_liste($value,false);
                }
            }
        }
    }

    public function abonnement(){
        $this->modele->suivreOuPas($this->modele->estDejaAbonne());
    }

    public function estAbonne()
    {
        if(!$this->modele->estDejaAbonne())
        {
            return 'suivre';
        }
        else{
            return 'ne plus suivre';
        }
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