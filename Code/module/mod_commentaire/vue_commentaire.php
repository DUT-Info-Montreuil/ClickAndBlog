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
            <div class="card" id="card_article">
              <div class="card-content">
                <div class="content">
                <!-- TODO Mettre le debut de l'article -->
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris.
                  <a href="#">#hashtag</a> 
                  <a href="#">#hashtag2</a>
                  <br>
                    <i class="far fa-calendar"></i>
                  <time datetime="2016-1-1"><?=$row['date']?></time>
                    <i class="far fa-clock"></i>
                    <span><?=$row['time_read']?> min</span>
                </div>
              </div>
            </div>
          <?php
        }
    }

    public static function form_ajout_commentaire(){
      ?>
        <form action="index.php?module=mod_article&action=ajout" method="post"  enctype="multipart/form-data" class="form-example">
          <div class="form-example">
            <label for="titre">Entrer le nom du titre: </label>
            <input type="text" name="titre" id="titre" required>
          </div>
          <div class="form-example">
            <label for="contenue">Entrer un contenue: </label>
            <textarea id="contenue" cols="86" rows ="20" name="contenue"></textarea>
          </div>
          <div class="form-example">
                <label for="image">Image a envoyer : </label>
            <input type="file" name="image" id="image">
          </div>
          <div class="form-example">
                <label for="alt_image">Entrer la description de l\'image : </label>
            <input type="text" name="alt_image" id="alt_image">
          </div>
          <div class="form-example">
                <label for="date">Entrer la date : </label>
            <input type="date" name="date" id="date">
          </div>
          <div class="form-example">
                <label>Publiez l\'article : </label>
            <input type="radio" name="etat" id="checkTrue" value="1">
            <label for="checkTrue">OUI</label>
            <input type="radio" name="etat" id="checkFalse" value="0">
                <label for="checkFalse">NON</label>
          </div>
          <div class="form-example">
            <button type="submit" name="submit">Envoyer</button>
          </div>
        </form>
      <?php
    }

}