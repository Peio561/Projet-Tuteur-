<?php
require ('./models/verif_co_formulaire.php');

if(isset($_POST['MailCo'])){
  $mail=$_POST['MailCo'];
}else {
  $erreur="Aucun nom entré";
}
if(isset($_POST['PasswordCo'])){
  $mdp=$_POST['PasswordCo'];
}else {
  $erreur="Aucun prenom entré";
}
if(isset($erreur)){
  header('Location: index.php?controler=formulaire');
  exit;
}


$res=verif_utilisateur($mail,$mdp);
if($res['compteur']!=1){
  $erreur="Mot de Passe ou mail incorrect(s)";
  header('Location: index.php?controler=formulaire');
  exit;
} else {
  $_SESSION['role']=$res['role'];
  $_SESSION['pseudo']=$res['pseudo'];
  $_SESSION['id']=$res['id'];
  header('Location: index.php?controler=acceuil');
  exit;
}
?>
