
<?php
class VueArticle extends VueGenerique
{

    public function __Construct()
    {
        parent::__Construct();
    }

    public static function affiche_liste($row,$fav)
    {
        //foreach ($tableaux as $row) {
          ?>
            <div class="card" id="card_article" xmlns:a="http://www.w3.org/1999/html">
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
                    <?php if(isset($_SESSION['login']) && $fav == true): ?>
                    <a href="index.php?module=mod_article&action=supp_favoris&idArticle=<?=$row['id']?>" class="is-pulled-right">
                        <i class="fas fa-bookmark"></i>
                    </a>
                    <?php elseif(isset($_SESSION['login'])): ?>
                    <a href="index.php?module=mod_article&action=ajout_favoris&idArticle=<?=$row['id']?>" class="is-pulled-right">
                        <i class="far fa-bookmark subtitle"></i>
                    </a>
                    <?php endif ?>
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
                    <i class="far fa-calendar"></i>
                  <time datetime="2016-1-1"><?=$row['date']?></time>
                    <i class="far fa-clock"></i>
                    <span><?=$row['time_read']?> min</span>
                </div>
              </div>
            </div>
          <?php
        //}
    }

    public static function affiche_detail($row,$like) //page article
    {
        //foreach ($tableaux as $row) {
          ?>
            <div class="columns">
                <div class="column is-8 is-offset-2">
                <figure class="image is-16by9">
                  <img src="<?=$row['image']?>" alt="<?=$row['alt_image']?>">
                </figure>
                  <div class="content is-medium">
                      <!-- Button Likes -->
                      <?php if(isset($_SESSION['login']) && $like == true):?>
                      <a href="index.php?module=mod_article&action=supp_like&idArticle=<?=$row['id']?>">
                          <button class="button is-danger">
                              <i class="fas fa-heart">
                                  <span><?=$row['nbLikes']?></span>
                              </i>
                          </button>
                      </a>
                    <?php elseif(isset($_SESSION['login'])):?>
                      <a href="index.php?module=mod_article&action=ajout_like&idArticle=<?=$row['id']?>">
                      <button class="button is-danger">
                          <i class="far fa-heart">
                          <span><?=$row['nbLikes']?></span>
                          </i>
                      </button>
                      </a>
            <?php else: ?>
                <span>
                    <i class="far fa-heart">
                        <span><?=$row['nbLikes']?></span>
                    </i>
                </span>
                    <?php endif ?>
                      <a href="index.php?module=mod_article&action=ajout_signalement&idArticle=<?=$row['id']?>">
                      <button class="button is-warning">
                          <i class="fas fa-exclamation-triangle"></i>
                      </button>
                      </a>
                      <h2 class="subtitle is-4"><?=$row['date']?></h2>
                      <h1 class="title"><?=$row['titre']?></h1>
                      <p><?= self::bbc2html($row['contenu']) ?></p>
                  </div>
                </div>
            </div>
            <div class="container">
<!--            <a href="index.php?module=mod_commentaire&action=liste&id=--><?//=$row['id']?><!--">-->
            <h1 class="has-text-centered"><strong>Commentaires</strong></h1>
<!--            </a>-->
            <hr style="margin:auto; margin-bottom: 2%; color:black; background-color:#70a1ff; height:5px; opacity: 0.7;">
            <!--
            <p class="has-text-centered" style="margin-bottom: 2%">Aucun commentaires</p>
            </div>
            -->
            <?php
        //}
    }
    public function affiche_commentaire($tableaux)
    {
      if(count($tableaux)==0){
        echo"Soyez le premier à commenter !";
      }
      else{
        ?>
        <div class="column is-8 is-offset-2">
        <?php
        foreach ($tableaux as $row) {
          ?>
          <article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
               <?php
                if(isset($_SESSION)){
                    $photo = ModeleArticle::getPhotoProfil();
                }else{
                    $photo = 'public/image/photo-avatar-profil.png';
                }
              ?>
              <img class="is-rounded" src="<?=$photo[0]['photoProfil']?>" alt="logo">
            </p>
          </figure>
          <div class="media-content">
              <div class="content">
                <p>
                  <strong>Barbara Middleton</strong>
                  <br>
                  <?=$row['contenu']?>
                  <br>
                  <small><a>Like</a> · <a>Reply</a> · 3 hrs</small>
                </p>
          </div>
        </article>
        <br>
        <?php
        }
        ?>
        </article>
        <article class="media">
          <figure class="media-left">
            <p class="image is-64x64">
              <?php
              if(isset($_SESSION)){
                  $photo = ModeleArticle::getPhotoProfil();
              }else{
                  $photo = 'public/image/photo-avatar-profil.png';
              }
              ?>
              <img class="is-rounded" src="<?=$photo[0]['photoProfil']?>" alt="logo">
            </p>
          </figure>
          <div class="media-content">
            <div class="field">
              <p class="control">
                <input class="textarea" id="comment" name="comment" placeholder="Add a comment..."></input>
              </p>
            </div>
            <div class="field">
              <form action="index.php?module=mod_commentaire&action=ajout" method="post">
                  <div class="field">
                      <p class="control">
                          <input class="button is-info" type="submit" name="submit"  value="Publier"  id="submit"/>
                      </p>
                  </div>
            </div>

          </div>
            </article>
          </div>
        </article>
         </div>
        <?php
      }
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
    public function afficheArtIndiponible(){
        ?>
        <div class="notification is-danger">
            Vous n'êtes pas en capacité d'accéder a cet article, car vous l'avez signalé si jamais il s'agit d'une erreur n'hésitez pas à nous contacter.
        </div>
<?php
    }

}