<!doctype HTLM>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/ConfigCompte.css"/>
    <title></title>
  </head>
  <body>
    <header>
      <a href="index.php?controler=acceuil"> <div class="div">  </div> </a>
      <?php
        if($role=="Invité") {
          echo('<a href="index.php?controler=formulaire" class="connexion">Connexion</a><a href="index.php?controler=formulaire" class="inscription">Inscription</a><a href="index.php?controler=leaderboard" class="leaderboard">Classement</a>');
        } else {
          echo('<a href="index.php?controler=deconnexion" class="connexion">Déconnexion</a><a href="index.php?controler=ConfigCompte" class="inscription">Configuration du compte </a><a href="index.php?controler=leaderboard" class="leaderboard2">Classement</a>');
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
    <div id="corpsConfig">
      <div id="DivConfig">
        <h1 id="TitreConfig"> Configurer mon Compte </h1>
        <form id="formInscription" class="form" method="POST" action="index.php?controler=modif_infos">
          <input type="text" class="boutonText" name="Pseudo" placeholder="Pseudo" value="<?php echo($pseudo)?>"/>
          <input type="mail" class="boutonText" name="Mail" placeholder="Adresse mail" value="<?php echo($mail)?>"/>
          <input type="password" class="boutonText" name="Password" placeholder="Mot de Passe" value="<?php echo($password)?>" />
          <input type="password" id="ConfirmerMdp" class="boutonText" name="PasswordConf" placeholder="Confirmer Mot de Passe" />
          <div class="divLabelInput">
            <div id="Mail">
              <input type="text" class="boutonText" id="MailArea" name="Email" placeholder="Adresse mail ulco" value="<?php echo($ulco)?>"/>
              <p>@univ-littoral.com</p>
            </div>
            <label for="Email"> Membre de l'ULCO? Inscrivez votre adresse mail ulco !</label>
          </div>
          <div class="erreur">
            <?=$erreur?>
          </div>
          <div>
            <a href="index.php?controler=acceuil" id="Retour"><input type="button" class="Valider annuler" name="Retour" value="Annuler" /></a>
            <input type="submit" class="Valider val" name="ValiderInscription" />
          </div>
        </form>
      </div>
    </div>
  </body>
</html>
