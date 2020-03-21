<?php

  require ('./models/verif_co_formulaire.php');
  $pseudo=$_SESSION['pseudo'];
  $role=$_SESSION['role'];
  $erreur="";

  if($role=="Invité") {
    header('Location: index.php?controler=acceuil');
    exit;
  } else {
    $res=recup_infos($_SESSION['id']);
    $pseudo=$res['pseudo'];
    $mail=$res['mail'];
    $ulco=substr($res['univ'],0,-17);
  }

  require "./views/ConfigCompte.php";
?>