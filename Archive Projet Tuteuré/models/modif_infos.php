<?php

require 'connexion_bdd.php';

function modif_utilisateur($id,$pseudo,$mdp,$mail,$ulco) {
  global $bdd;
  $res=$bdd->prepare("update utilisateur set pseudo=:pseudo, password=:mdp, mail=:mail, univ=:ulco where id_user=:id");
  $res->bindvalue(':id',$id);
  $res->bindvalue(':pseudo',$pseudo);
  $res->bindvalue(':mdp',$mdp);
  $res->bindvalue(':mail',$mail);
  $res->bindvalue(':ulco',$ulco);
  $res->execute();
}

?>