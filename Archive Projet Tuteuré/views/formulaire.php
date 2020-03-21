<!doctype HTLM>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/formulaire.css"/>
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
    <div id="corpsFormulaire">
      <div id="divFormConnexion" class="divForm">
        <h1 class="titre"> Connexion </h1>
        <form id="formConnexion" class="form" method="POST" action="index.php?controler=verif_co_formulaire">
          <input type="text" class="boutonText" name="MailCo" placeholder="Adresse mail" />
          <input type="password" class="boutonText" name="PasswordCo" placeholder="Mot de Passe" />
          <input type="submit" value="Connexion" class="Valider" id="connexion" name="ValiderConnexion" />
        </form>
      </div>
      <div id="divFormInscription" class="divForm">
        <h1 class="titre">Inscription</h1>
        <form id="formInscription" class="form" method="POST" action="index.php?controler=verif_inscription_formulaire">
          <input type="text" class="boutonText" name="Pseudo" placeholder="Pseudo" />
          <input type="mail" class="boutonText" name="Mail" placeholder="Adresse mail" />
          <input type="password" class="boutonText" name="Password" placeholder="Mot de Passe" />
          <input type="password" id="ConfirmerMdp" class="boutonText" name="PasswordConf" placeholder="Confirmer Mot de Passe" />
          <div class="divLabelInput">
            <div id="Mail">
              <input type="text" class="boutonText" id="MailArea" name="Email" placeholder="Adresse mail ulco" />
              <p>@etu.univ-littoral.com</p>
            </div>
            <label for="Email"> Membre de l'ULCO? Inscrivez votre adresse mail ulco !</label>
          </div>
          <div class="erreur">
            <?=$erreur?>
          </div>
	        <script src="https://www.google.com/recaptcha/api.js?render=_reCAPTCHA_site_key"></script>
          <div class="g-recaptcha" data-sitekey="6Lfx6d0UAAAAAB_eMUuq4UbkVNolkLNqfJnK62V1" id="antibot"></div>  
          <input type="submit" value="Inscription" class="Valider" id="inscription" name="ValiderInscription" />
        </form>
      </div>
    </div>
  </body>
</html>
