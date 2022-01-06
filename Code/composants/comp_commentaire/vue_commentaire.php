<?php

class VueCommentaire extends VueGenerique
{

    public function __Construct()
    {
        parent::__Construct();
    }

    public static function affiche_liste($tableaux)
    {
        foreach ($tableaux as $row) {
          ?>
            Les commentaires s'afficheront ici
          <?php
        }
    }

    public static function form_ajout_commentaire(){
      ?>
        <form action="index.php?module=mod_article&action=ajout" method="post" class="form-example">
          <div class="form-example">
              <div class="control">
                  <textarea class="textarea" placeholder="laissez un commentaire :)"></textarea>
              </div>
          </div>
          <div class="form-example">
            <button type="submit" name="submit">Envoyer</button>
          </div>
        </form>
      <?php
    }

}