<?php

class VueRecherche extends VueGenerique
{
    public function affiche_moteur_recherche($val)
    {
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#productName').autocomplete({
                search: function(event, ui){
                    $('.results ul').empty();        
                },
                source: <?=$val?>         
            }).data('ui-autocomplete')._renderItem = function(ul, item){
                return $('<li/>')
                .data('item.autocomplete', item)
                .append('<div class="card" id="card_article">'+'<div class="card-content">'+'<div class="media">'+
                        '<div class="media-content">'+
                            '<a href="index.php?module=mod_article&action=detail&id='+item.value+'">'+item.label+'</a>' + '<date> '+item.date+' </date>' + '</div>'+'</div>'+'</div>'+'</div>'
            ).appendTo($('.results ul'));  };
            });
        </script>
        <div class="field has-addons">
            <div class="control">
                <input class="input" type="text" id="productName">
            </div>
            <div class="control">
                <a class="button is-info">
                    Rechercher
                </a>
            </div>
        </div>
        <div class="results">
            <ul></ul>
        </div>
        <?php
    }

    public function recomendation_article($tab)
    {
        foreach ($tab as $row) {
            ?>
            <div class="card" id="card_article">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="<?= $row['image'] ?>" alt="<?= $row['alt_image'] ?>">
                    </figure>
                </div>

                <div id="subtile_article">
                    <a>
                        <hr>
                        <p class="subtitle"><?= $row['categorie'] ?></p>
                    </a>
                </div>

                <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                            <a href="index.php?module=mod_article&action=detail&id=<?= $row['id'] ?>">
                                <p class="title is-4"><?= $row['titre'] ?></p>
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
                        <time datetime="2016-1-1"><?= $row['date'] ?></time>
                        <i class="far fa-clock"></i>
                        <span><?= $row['time_read'] ?> min</span>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}

?>