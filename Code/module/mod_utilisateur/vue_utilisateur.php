<?php
if(!defined('CONST_INCLUDE')){
    die('interdit !');
}
class VueUtilisateur extends VueGenerique {

    public function vue_utilisateur($infos)
    {

        $photo = ModeleUtilisateur::getPhotoProfil();
        ?>
        <div id="vue_gestion" class="media" xmlns="http://www.w3.org/1999/html">
            <div class="media-left">
                <figure class="image is-96x96">
                        <img class="is-rounded" src="<?=$photo[0]['photoProfil']?>" alt="Placeholder image">
                </figure>
            </div>
            <div class="media-content">
<!--                <p class="title is-4">--><?//=$_SESSION["prenom"]," ",$_SESSION["nom"]?><!--</p>-->
<!--                <p class="subtitle is-6">@--><?//=$_SESSION["username"]?><!--</p>-->
                <p class="title is-4"><?=$infos[0]['nom']," ",$infos[0]['prenom']?></p>
                <p class="subtitle is-6"><?=$infos[0]['username']?></p>
                <P class="subtitle is-6"><?=$infos[0]['bio']?></p>
            </div>
        </div>
        <hr style="margin:auto; margin-bottom: 2%; color:black; background-color:#70a1ff; height:5px; opacity: 0.7;">
        <?php
    }

    public function vue_profil()
    {
        ?>
        <h1>Articles publiés :</h1>
        <table class="table">
            <thead>
            <tr>
                <th><abbr title="Position">Pos</abbr></th>
                <th>Team</th>
                <th><abbr title="Played">Pld</abbr></th>
                <th><abbr title="Won">W</abbr></th>
                <th><abbr title="Drawn">D</abbr></th>
                <th><abbr title="Lost">L</abbr></th>
                <th><abbr title="Goals for">GF</abbr></th>
                <th><abbr title="Goals against">GA</abbr></th>
                <th><abbr title="Goal difference">GD</abbr></th>
                <th><abbr title="Points">Pts</abbr></th>
                <th>Qualification or relegation</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th><abbr title="Position">Pos</abbr></th>
                <th>Team</th>
                <th><abbr title="Played">Pld</abbr></th>
                <th><abbr title="Won">W</abbr></th>
                <th><abbr title="Drawn">D</abbr></th>
                <th><abbr title="Lost">L</abbr></th>
                <th><abbr title="Goals for">GF</abbr></th>
                <th><abbr title="Goals against">GA</abbr></th>
                <th><abbr title="Goal difference">GD</abbr></th>
                <th><abbr title="Points">Pts</abbr></th>
                <th>Qualification or relegation</th>
            </tr>
            </tfoot>
            <tbody>
            <tr>
                <th>1</th>
                <td><a href="https://en.wikipedia.org/wiki/Leicester_City_F.C." title="Leicester City F.C.">Leicester City</a> <strong>(C)</strong>
                </td>
                <td>38</td>
                <td>23</td>
                <td>12</td>
                <td>3</td>
                <td>68</td>
                <td>36</td>
                <td>+32</td>
                <td>81</td>
                <td>Qualification for the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Group_stage" title="2016–17 UEFA Champions League">Champions League group stage</a></td>
            </tr>
            <tr>
                <th>2</th>
                <td><a href="https://en.wikipedia.org/wiki/Arsenal_F.C." title="Arsenal F.C.">Arsenal</a></td>
                <td>38</td>
                <td>20</td>
                <td>11</td>
                <td>7</td>
                <td>65</td>
                <td>36</td>
                <td>+29</td>
                <td>71</td>
                <td>Qualification for the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Group_stage" title="2016–17 UEFA Champions League">Champions League group stage</a></td>
            </tr>
            <tr>
                <th>3</th>
                <td><a href="https://en.wikipedia.org/wiki/Tottenham_Hotspur_F.C." title="Tottenham Hotspur F.C.">Tottenham Hotspur</a></td>
                <td>38</td>
                <td>19</td>
                <td>13</td>
                <td>6</td>
                <td>69</td>
                <td>35</td>
                <td>+34</td>
                <td>70</td>
                <td>Qualification for the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Group_stage" title="2016–17 UEFA Champions League">Champions League group stage</a></td>
            </tr>
            <tr class="is-selected">
                <th>4</th>
                <td><a href="https://en.wikipedia.org/wiki/Manchester_City_F.C." title="Manchester City F.C.">Manchester City</a></td>
                <td>38</td>
                <td>19</td>
                <td>9</td>
                <td>10</td>
                <td>71</td>
                <td>41</td>
                <td>+30</td>
                <td>66</td>
                <td>Qualification for the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Champions_League#Play-off_round" title="2016–17 UEFA Champions League">Champions League play-off round</a></td>
            </tr>
            <tr>
                <th>5</th>
                <td><a href="https://en.wikipedia.org/wiki/Manchester_United_F.C." title="Manchester United F.C.">Manchester United</a></td>
                <td>38</td>
                <td>19</td>
                <td>9</td>
                <td>10</td>
                <td>49</td>
                <td>35</td>
                <td>+14</td>
                <td>66</td>
                <td>Qualification for the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Europa_League#Group_stage" title="2016–17 UEFA Europa League">Europa League group stage</a></td>
            </tr>
            <tr>
                <th>6</th>
                <td><a href="https://en.wikipedia.org/wiki/Southampton_F.C." title="Southampton F.C.">Southampton</a></td>
                <td>38</td>
                <td>18</td>
                <td>9</td>
                <td>11</td>
                <td>59</td>
                <td>41</td>
                <td>+18</td>
                <td>63</td>
                <td>Qualification for the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Europa_League#Group_stage" title="2016–17 UEFA Europa League">Europa League group stage</a></td>
            </tr>
            <tr>
                <th>7</th>
                <td><a href="https://en.wikipedia.org/wiki/West_Ham_United_F.C." title="West Ham United F.C.">West Ham United</a></td>
                <td>38</td>
                <td>16</td>
                <td>14</td>
                <td>8</td>
                <td>65</td>
                <td>51</td>
                <td>+14</td>
                <td>62</td>
                <td>Qualification for the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_UEFA_Europa_League#Third_qualifying_round" title="2016–17 UEFA Europa League">Europa League third qualifying round</a></td>
            </tr>
            <tr>
                <th>8</th>
                <td><a href="https://en.wikipedia.org/wiki/Liverpool_F.C." title="Liverpool F.C.">Liverpool</a></td>
                <td>38</td>
                <td>16</td>
                <td>12</td>
                <td>10</td>
                <td>63</td>
                <td>50</td>
                <td>+13</td>
                <td>60</td>
                <td></td>
            </tr>
            <tr>
                <th>9</th>
                <td><a href="https://en.wikipedia.org/wiki/Stoke_City_F.C." title="Stoke City F.C.">Stoke City</a></td>
                <td>38</td>
                <td>14</td>
                <td>9</td>
                <td>15</td>
                <td>41</td>
                <td>55</td>
                <td>−14</td>
                <td>51</td>
                <td></td>
            </tr>
            <tr>
                <th>10</th>
                <td><a href="https://en.wikipedia.org/wiki/Chelsea_F.C." title="Chelsea F.C.">Chelsea</a></td>
                <td>38</td>
                <td>12</td>
                <td>14</td>
                <td>12</td>
                <td>59</td>
                <td>53</td>
                <td>+6</td>
                <td>50</td>
                <td></td>
            </tr>
            <tr>
                <th>11</th>
                <td><a href="https://en.wikipedia.org/wiki/Everton_F.C." title="Everton F.C.">Everton</a></td>
                <td>38</td>
                <td>11</td>
                <td>14</td>
                <td>13</td>
                <td>59</td>
                <td>55</td>
                <td>+4</td>
                <td>47</td>
                <td></td>
            </tr>
            <tr>
                <th>12</th>
                <td><a href="https://en.wikipedia.org/wiki/Swansea_City_A.F.C." title="Swansea City A.F.C.">Swansea City</a></td>
                <td>38</td>
                <td>12</td>
                <td>11</td>
                <td>15</td>
                <td>42</td>
                <td>52</td>
                <td>−10</td>
                <td>47</td>
                <td></td>
            </tr>
            <tr>
                <th>13</th>
                <td><a href="https://en.wikipedia.org/wiki/Watford_F.C." title="Watford F.C.">Watford</a></td>
                <td>38</td>
                <td>12</td>
                <td>9</td>
                <td>17</td>
                <td>40</td>
                <td>50</td>
                <td>−10</td>
                <td>45</td>
                <td></td>
            </tr>
            <tr>
                <th>14</th>
                <td><a href="https://en.wikipedia.org/wiki/West_Bromwich_Albion_F.C." title="West Bromwich Albion F.C.">West Bromwich Albion</a></td>
                <td>38</td>
                <td>10</td>
                <td>13</td>
                <td>15</td>
                <td>34</td>
                <td>48</td>
                <td>−14</td>
                <td>43</td>
                <td></td>
            </tr>
            <tr>
                <th>15</th>
                <td><a href="https://en.wikipedia.org/wiki/Crystal_Palace_F.C." title="Crystal Palace F.C.">Crystal Palace</a></td>
                <td>38</td>
                <td>11</td>
                <td>9</td>
                <td>18</td>
                <td>39</td>
                <td>51</td>
                <td>−12</td>
                <td>42</td>
                <td></td>
            </tr>
            <tr>
                <th>16</th>
                <td><a href="https://en.wikipedia.org/wiki/A.F.C._Bournemouth" title="A.F.C. Bournemouth">AFC Bournemouth</a></td>
                <td>38</td>
                <td>11</td>
                <td>9</td>
                <td>18</td>
                <td>45</td>
                <td>67</td>
                <td>−22</td>
                <td>42</td>
                <td></td>
            </tr>
            <tr>
                <th>17</th>
                <td><a href="https://en.wikipedia.org/wiki/Sunderland_A.F.C." title="Sunderland A.F.C.">Sunderland</a></td>
                <td>38</td>
                <td>9</td>
                <td>12</td>
                <td>17</td>
                <td>48</td>
                <td>62</td>
                <td>−14</td>
                <td>39</td>
                <td></td>
            </tr>
            <tr>
                <th>18</th>
                <td><a href="https://en.wikipedia.org/wiki/Newcastle_United_F.C." title="Newcastle United F.C.">Newcastle United</a> <strong>(R)</strong>
                </td>
                <td>38</td>
                <td>9</td>
                <td>10</td>
                <td>19</td>
                <td>44</td>
                <td>65</td>
                <td>−21</td>
                <td>37</td>
                <td>Relegation to the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_Football_League_Championship" title="2016–17 Football League Championship">Football League Championship</a></td>
            </tr>
            <tr>
                <th>19</th>
                <td><a href="https://en.wikipedia.org/wiki/Norwich_City_F.C." title="Norwich City F.C.">Norwich City</a> <strong>(R)</strong>
                </td>
                <td>38</td>
                <td>9</td>
                <td>7</td>
                <td>22</td>
                <td>39</td>
                <td>67</td>
                <td>−28</td>
                <td>34</td>
                <td>Relegation to the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_Football_League_Championship" title="2016–17 Football League Championship">Football League Championship</a></td>    </tr>
            <tr>
                <th>20</th>
                <td><a href="https://en.wikipedia.org/wiki/Aston_Villa_F.C." title="Aston Villa F.C.">Aston Villa</a> <strong>(R)</strong>
                </td>
                <td>38</td>
                <td>3</td>
                <td>8</td>
                <td>27</td>
                <td>27</td>
                <td>76</td>
                <td>−49</td>
                <td>17</td>
                <td>Relegation to the <a href="https://en.wikipedia.org/wiki/2016%E2%80%9317_Football_League_Championship" title="2016–17 Football League Championship">Football League Championship</a></td>
            </tr>
            </tbody>
        </table>
        <?php
    }

    public function vue_compte($favoris,$signalement)
    {
        ?>
        <p class="title is-4">Vous retrouverez ici vos favoris ainsi que l'option pour supprimer votre compte</p>
        <div class="media-content">
            <p class="subtitle is-4">Mes Favoris : </p>
            <?php
            foreach ($favoris as $row) {
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
                    </div>
                
                    <div class="card-content">
                    <div class="media">
                        <div class="media-content">
                        <a href="index.php?module=mod_article&action=detail&id=<?=$row['url']?>">
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
            }
            ?>
            <p class="subtitle is-4">Mes Signalements : </p>
            <?php
            foreach($signalement as $row){
                ?>
                <div class="content">
                    <a href="index.php?module=mod_gestion&action=delete_signalement&id_signalement=<?=$row['id']?>">
                        <p class="subtitle"><?=$row['titre']?></p>
                    </a>
                </div>
                <?php
            }
            ?>
        </div>
            <a href="index.php?module=mod_gestion&action=delete_compte">         
                <button class="button is-danger ">Supprimer compte</button>
            </a>
        <?php
    }

    

    public function vue_securite()
    {
        ?>
        <form action="index.php?module=mod_gestion&action=sauvegarde_securite" method="post">
            <div class="field" style="width: 50%">
                <label class="label is-medium">Modifiez vos informations :</label>
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="password" id="current" name="current" placeholder="Mot de passe actuel">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field" style="width: 50%">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="password" id="password" name="password" onchange="check_update_pass()" placeholder="Nouveau mot de passe">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field" style="width: 50%">
                <div class="control has-icons-left has-icons-right">
                    <input class="input is-medium" type="password" id="confirm_update_pass" name="confirm_update_pass" onchange="check_update_pass()" placeholder="Confirmer nouveau mot de passe">
                    <span class="icon is-medium is-left">
                          <i class="fas fa-user"></i>
                    </span>
                    <span class="icon is-medium is-right">
                          <i class="fas fa-check"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <p class="control">
                    <button class="button is-info" id="submit_pw" name="submit"  value="Sauvegarder">
                        Sauvegarder
                    </button>
                </p>
            </div>
        </form>
        <?php
    }

    public function vue_article()
    {
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
                <label for="categories_art">Entrer la catégorie de l'article : </label>
                <input type="text" name="categories_art" id="categories_art">
            </div>
            <div class="form-example">
                <label for="image">Image a envoyer : </label>
                <input type="file" name="image" id="image">
            </div>
            <div class="form-example">
                <label for="alt_image">Entrer la description de l'image : </label>
                <input type="text" name="alt_image" id="alt_image">
            </div>
            <div class="form-example">
                <label for="date">Entrer la date : </label>
                <input type="date" name="date" id="date">
            </div>
            <div class="form-example">
                <label>Publiez l'article : </label>
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
?>
