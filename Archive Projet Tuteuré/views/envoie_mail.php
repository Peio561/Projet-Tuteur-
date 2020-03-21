<!doctype html>
<html>
	<head>
	  <meta charset="utf-8">
	  <title>Titre de la page</title>
	  <link rel="stylesheet" href="./css/contactezNous.css">
	</head>
  <body>
    <header>
      <a href="index.php?controler=acceuil"> <div class="div">  </div> </a>
      <?php
        if($role=="Invité") {
          echo('<a href="index.php?controler=formulaire" class="connexion">Connexion</a><a href="index.php?controler=formulaire" class="inscription">Inscription</a>');
        } else {
          echo('<a href="index.php?controler=deconnexion" class="connexion">Déconnexion</a><a href="index.php?controler=ConfigCompte" class="inscription">Configurer mon Compte </a>');
        }
      ?>
      <div class="bandeau"> 
      <?=$pseudo?>
      </div>
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
            <p id="gg"> Votre message a bien été envoyé </p>
            <a href="index.php?controler=acceuil" id="lien_retour"><input type="button" id="bouton_retour" value="Retour à l'accueil"/></a>
	</body>
</html>