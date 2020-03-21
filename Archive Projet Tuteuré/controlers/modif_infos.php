<?php

require ('models/modif_infos.php');
require ('./models/verif_co_formulaire.php');
$pseudo=$_SESSION['pseudo'];
$role=$_SESSION['role'];


if($role=="Invité") {
  header('Location: index.php?controler=acceuil');
  exit;
} else {
  $res=recup_infos($_SESSION['id']);
  $pseudo=$res['pseudo'];
  $mail=$res['mail'];
  $ulco=substr($res['univ'],0,-17);
}

if($_POST['Pseudo']!=""){
  $pseudo=$_POST['Pseudo'];
}else {
  $erreur="Aucun pseudo entré";
}
if($_POST['Password']!=""){
  $mdp=$_POST['Password'];
}else {
  $erreur="Aucun mot de passe entré";
}
if($_POST['PasswordConf']!=""){
  $mdpConf=$_POST['PasswordConf'];
  if(isset($mdp) && $mdpConf!=$mdp){
    $erreur="Mots de passe différents";
  }
}else {
  $erreur="Veuillez confirmer le mot de passe";
}
if($_POST['Mail']!="" && preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['Mail'] )){
  $mail=$_POST['Mail'];
} else {
  $erreur="Veuillez saisir une adresse mail";
}
if($_POST['Email']!=""){
  $ulco=$_POST['Email']."@univ-littoral.fr";
}

if(!(isset($erreur))){
  modif_utilisateur($_SESSION['id'],$pseudo,$mdp,$mail,$ulco);
  header('Location: index.php?controler=acceuil');
  exit;
} else {
  require './views/ConfigCompte.php';
}

?>