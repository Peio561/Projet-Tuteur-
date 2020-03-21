<!doctype HTLM>
<html>
  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" type="text/css" href="./css/lol.css"/>
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
        echo('<div class="bandeau" name='.$pseudo.'>'. 
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

      <img src="./css/img/logolol.png" class="logolol">

      <div class="page" name="league of legends">

        <img src="./css/img/xayah.png" class="xayah">

        <div class="twitch">
          <div id="twitch-embed"></div>
          <script src="https://embed.twitch.tv/embed/v1.js"></script>
          <script type="text/javascript">
          new Twitch.Embed("twitch-embed", {
            width: 1280,
            height: 480,
            channel: "lck"
          });
          </script>
        </div>

        <div class="paris_parent inline">
          <div class="paris">
            <?php
              if($role!="Invité") {
                echo('<h1>Pariez !</h1>');
              } else {
                echo('<h1>Connectez-vous pour parier</h1>');
              }
            ?>
            <?=$paris?>
          </div>
        </div>

        <div class="chat_parent inline">
          <div class="chat">
            <h1>Chat</h1>
            <div class="ecran">
              
            </div>
            <?php
              if($role!="Invité") {
                echo(' 
                  <input type="text" name="chat" placeholder="Entrez du texte ici" class="inline" id="textArea">
                  <input type="submit" value="Envoyer" class="inline" id="envoyer">
                ');
              } else {
                echo('
                  <input type="text" name="chat" placeholder="Connectez-vous pour discuter" class="inline" id="textArea" disabled>
                  <input type="submit" value="Envoyer" class="inline" id="envoyer" disabled>'
                );
              }
            ?>
          </div>
        </div>

        <div class="calendrier_parent">
          <div class="calendrier">
            <?=$match?>
          </div>
        </div>
        
        <?php
          if($role=="admin"){
            echo "
              <form class='administration' method='POST' action='index.php?controler=add_pari'>
                <h1>Partie administration</h1>
                <div class='eq'>
                  $content
                </div>
                <div class='eq'>
                  $content2
                </div>
                <br/>
                  $content3
                <br/>
                  $content4
              </form>";
          }
        ?>
      </div>
    </div>
  </body>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script type="text/javascript" src="./js/script.js"></script>
</html>
