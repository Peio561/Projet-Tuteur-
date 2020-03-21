<?php
require 'connexion_bdd.php';

function insert_utilisateur($pseudo,$mdp,$mail="",$ulco="") {
  global $bdd;
  $res=$bdd->prepare("insert into utilisateur(pseudo,password,mail,univ) values(:pseudo,MD5(:mdp),:mail,:ulco)");
  $res->bindvalue(':pseudo',$pseudo);
  $res->bindvalue(':mdp',$mdp);
  $res->bindvalue(':mail',$mail);
  $res->bindvalue('ulco',$ulco);
  $res->execute();
}

?>
