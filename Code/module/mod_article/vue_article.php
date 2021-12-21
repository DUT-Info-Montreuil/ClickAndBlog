
<?php

class VueArticle extends VueGenerique
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
              <div class="card-image">
                <figure class="image is-4by3">
                  <img src="<?=$row['image']?>" alt="<?=$row['alt_image']?>">
                </figure>
              </div>
            
                <div id="subtile_article">
                    <a>
                        <hr>
                        <p class="subtitle"><?=$row['categorie']?></p>
                    </a>
                </div>
            
              <div class="card-content">
                <div class="media">
                  <div class="media-content">
                  <a href="index.php?module=mod_article&action=detail&id=<?=$row['id']?>">
                    <p class="title is-4"><?=$row['titre']?></p>
                    </a>
                  </div>
                </div>
                <div class="content">
                <!-- TODO Mettre le debut de l'article -->
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                        Phasellus nec iaculis mauris.
                  <a href="#">#hashtag</a> 
                  <a href="#">#hashtag2</a>
                  <br>
                  <time datetime="2016-1-1"><?=$row['date']?></time>
                </div>
              </div>
            </div>
          <?php
        }
    }

    public static function affiche_detail($tableaux)
    {
        foreach ($tableaux as $row) {
          ?>
            <div class="columns">
            <div class="column is-8 is-offset-2">
            <figure class="image is-16by9">
              <img src="<?=$row['image']?>" alt="<?=$row['alt_image']?>">
            </figure>
              <div class="content is-medium">
                <h2 class="subtitle is-4"><?=$row['date']?></h2>
                <h1 class="title"><?=$row['titre']?></h1>
                <p><?= self::bbc2html($row['contenu']) ?></p>
              </div>
            </div>
          </div>
        <?php
        }
    }
    public static function form_ajout_article(){
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

    private static function bbc2html($contenu)
    {
        $search = array (
            '/(\[b\])(.*?)(\[\/b\])/',
            '/(\[i\])(.*?)(\[\/i\])/',
            '/(\[u\])(.*?)(\[\/u\])/',
            '/(\[ul\])(.*?)(\[\/ul\])/',
            '/(\[li\])(.*?)(\[\/li\])/',
            '/(\[url=)(.*?)(\])(.*?)(\[\/url\])/',
            '/(\[url\])(.*?)(\[\/url\])/'
        );

        $replace = array (
            '<strong>$2</strong>',
            '<em>$2</em>',
            '<u>$2</u>',
            '<ul>$2</ul>',
            '<li>$2</li>',
            '<a href="$2" target="_blank">$4</a>',
            '<a href="$2" target="_blank">$2</a>'
        );

        return preg_replace($search, $replace, $contenu);
    }

}