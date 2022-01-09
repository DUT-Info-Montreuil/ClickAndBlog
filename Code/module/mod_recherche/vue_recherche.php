<?php

class VueRecherche extends VueGenerique
{
    public function affiche_moteur_recherche()
    {
        ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('#productName').autocomplete({
                search: function(event, ui){
                    $('.results ul').empty();        
                },
                source: "search.php"
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
                <input class="input is-rounded" type="text" id="productName" name="term">
            </div>
            <div class="control">
                <a class="button is-info is-rounded">
                    Rechercher
                </a>
            </div>
        </div>
        <div class="results">
            <ul></ul>
        </div>
        <?php
    }
}

?>