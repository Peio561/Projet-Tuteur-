<?php
require 'connexion_bdd.php';

function verif_utilisateur($mail,$mdp) {
  global $bdd;
  $resultat=$bdd->prepare("select count(id_uti) as compteur,role,pseudo,id_uti as id from utilisateur where mail like :mail and password like MD5(:mdp);");
  $resultat->bindvalue(':mail',$mail);
  $resultat->bindvalue(':mdp',$mdp);
  $resultat->execute();
  $res=$resultat->fetch(PDO::FETCH_ASSOC);
  return $res;

}

function recup_infos($id){
  global $bdd;
  $resultat=$bdd->prepare("select * from utilisateur where id_uti=:id;");
  $resultat->bindvalue(':id',$id);
  $resultat->execute();
  $res=$resultat->fetch(PDO::FETCH_ASSOC);
  return $res;
}
?>
