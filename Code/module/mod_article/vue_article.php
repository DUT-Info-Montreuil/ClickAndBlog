<?php

class VueArticle
{
    public static function affiche_liste($tableaux)
    {
        foreach ($tableaux as $row) {
            echo "
<div class=\"column is-4\">
<a href=\"index.php?module=mod_article&action=detail&id={$row['id']}\">
<div class=\"card large\">
<div class=\"card-image\">
<figure class=\"image is-4by3\">
<img src=\"{$row['image']}\" alt=\"{$row['alt_image']}\" width=\"200\" height=\"134\">
</figure>
</div>
 <div class=\"card-content\">
  <div class=\"media\">
        <p class=\"title is-4 no-padding\">{$row['titre']} </p>
</div>
</div>
</div>
</a>
</div>

";
        }
    }

    public static function affiche_detail($tableaux)
    {
        foreach ($tableaux as $row) {
            echo  "
            <div class=\"columns\">
            <div class=\"column is-8 is-offset-2\">
            <figure class=\"image is-16by9\">
              <img src=\"{$row['image']}\" alt=\"{$row['alt_image']}\">
            </figure>
              <div class=\"content is-medium\">
                <h2 class=\"subtitle is-4\">{$row['date']}</h2>
                <h1 class=\"title\">{$row['titre']}</h1>
                <p>{$row['contenue']}</p>
              </div>
            </div>
          </div>
            ";
        }
    }
}