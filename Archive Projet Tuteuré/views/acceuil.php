<!doctype HTLM>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/acceuil.css"/>
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

    <div class="corps">
      <div class="presentation">
        <div class="text">
          <img src="./css/img/lol.png" class="pres_lol">
          <img src="./css/img/overwatch.png" class="pres_ow">
          <img src="./css/img/hearthstone.png" class="pres_hs">
          <img src="./css/img/dota.png" class="pres_dota">
          <h1>Présentation</h1>
          <p>Ce site est le résultat d’un projet tutoré de deuxième année de DUT informatique.
            Il a pour but de recenser les résultats des compétitions e-sport sur League of Legends,
            Hearthstone, Overwatch et Dota 2. Une fonctionnalité vous permet de parier gratuitement sur
            vos équipes et vos joueurs favoris, dans le but de gagner des jetons spéciaux !</p>
        </div>
      </div>

      <div class="commentCM">
        <div class="text">
          <h1>Comment ça marche ?</h1>
          <p>Vous avez accès aux pages des quatres jeux. Sur chaque page, vous disposez de la rediffusion
             Twitch de la compétition associée au jeu (rediffusion inactive si il n’en a aucune en cours).
             Vous pouvez également parier sur les différents matchs afin de récupérer les fameux jetons spéciaux. Les paris sur
             ces jeux sont gratuits (vous ne pouvez que gagner !). Un chat est à disposition sur chacune des pages.
             Vous pouvez également voir les résultats des derniers matchs e-sportifs qui se sont déroulés en bas de la page.
             Si vous êtes étudiant à l’IUT de Calais, les administrateurs auront la possibilité d’organiser des évènements.
             Afin de parier sur ces évènements, vous devez posséder des jetons spéciaux gagnés lors de vos paris sur les quatres jeux vidéos proposés.
             Une côte vous sera attribuée : plus vous gagnez de paris liés aux évenements, plus votre côte augmente, et vous fera grimper dans le classement général. Libre aux professeurs d’attribuer un bonus aux premiers.</p>
        </div>
      </div>

      <div class="question">
        <div class="questionContact">
          <h1>Des questions ?</h1>
          <p class="inline">Vous avez des questions à propos du site ?</p>
          <a href="index.php?controler=contactezNous" class="contact inline">Contactez-nous !</a>
        </div>
      </div>
    </div>


  </body>
</html>
