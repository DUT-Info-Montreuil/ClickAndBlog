<?php
class VueRecherche extends VueGenerique
{
    public function affiche_moteur_recherche($val)

    {
        echo "<script type=\"text/javascript\">
            $(document).ready(function(){
                $('#productName').autocomplete({
                    source: $val

                });
            });
        </script>";
        ?>
        <div class="field has-addons">
  <div class="control">
    <input class="input" type="text" id="productName">
  </div>
  <div class="control">
    <a class="button is-info">
      Search
    </a>
  </div>
</div>
<?php
    }
}
?>