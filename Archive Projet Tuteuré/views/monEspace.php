<!doctype HTLM>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/monEspace.css"/>
    <title></title>
  </head>
  <body>
    <header>
      <a href="index.php?controler=acceuil"> <div class="div">  </div> </a>
      <?php
        if($role=="Invité") {
          echo('<a href="index.php?controler=formulaire" class="connexion">Connexion</a><a href="index.php?controler=formulaire" class="inscription">Inscription</a><a href="index.php?controler=leaderboard" class="leaderboard">Classement</a>');
        } else {
          echo('<a href="index.php?controler=deconnexion" class="connexion">Déconnexion</a><a href="index.php?controler=ConfigCompte" class="inscription">Configuration de compte </a><a href="index.php?controler=leaderboard" class="leaderboard2">Classement</a>');
        }
      

      if($role!="Invité") {
        echo('<div class="bandeau">'. 
          $pseudo.'
        </div>');
      }
      ?>
      
      <div>
        <ul class="menu">
          <li class="itemMenu" id="lol"><a href="index.php?controler=view_lol" class="lienMenu"> <img src="./css/img/lol.png" class="image"> <span id="spanLol">League of Legends</span></a></li>
          <li class="itemMenu"><a href="index.php?controler=view_ow" class="lienMenu"> <img src="./css/img/overwatch.png" class="image"> Overwatch</a></li>
          <li class="itemMenu"><a href="index.php?controler=view_hs" class="lienMenu"> <img src="./css/img/hearthstone.png" class="imageHS"> Hearthstone</a></li>
          <li class="itemMenu"><a href="index.php?controler=view_dota" class="lienMenu" id="dota"> <span id="spandota"> <img src="./css/img/dota.png" class="image"></span> Dota 2</a></li>
          <?php 
            if($role!="Invité") {
              echo('<li class="itemMenu" id="espace"><a href="index.php?controler=monEspace" class="lienMenu"> <img src="./css/img/epee.png" class="image"> Mon espace</a></li>');
            } else {
              echo('<li class="itemMenu" id="espace"><a href="index.php?controler=formulaire" class="lienMenu"> <img src="./css/img/epee.png" class="image"> Mon espace</a></li>');
            }
          ?>
        </ul>
      </div>
    </header>

    <div id="corpsMonEspace">
      <h1 id="TitreEspace"> Mon Espace </h1>
      <div id="ListeEvents">
        <h2> Evènements auxquels je suis conviés : </h2>
        <div class="Event">
          <p class="inline"> Evenement du 20/12/2020 "Match de Lens" de Mr. Capitaine </p>
          <a href="#" class="inline voir_event"><input type="button" name="Acces1" value="Voir la page de l'évènement" /></a>
        </div>
        <div class="Event">
          <p class="inline"> Evenement du 23/12/2020 "Match de ping-pong Mr.Capitaine contre Mr.Synave !" </p>
          <a href="#" class="inline voir_event"><input type="button" name="Acces1" value="Voir la page de l'évènement" /></a>
        </div>
      </div>
    </div>
  </body>
</html>
