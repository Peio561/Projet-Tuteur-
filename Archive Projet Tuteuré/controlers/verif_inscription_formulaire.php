<?php
  require ('models/verif_inscription_formulaire.php');

  $pseudo="Invité";
  $role="Invité";
  $erreur;

  if($_POST['Pseudo']==""){
    $erreur="Aucun nom entré";
  }
  if($_POST['Password']==""){
    $erreur="Aucun mot de passe entré";
  }
  if($_POST['PasswordConf']==""){
    $erreur="Veuillez confirmer le mot de passe";
  }
  if($_POST['PasswordConf']!=$_POST['Password']){
    $erreur="Mots de passe différents";
  }

  if (!( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['Mail'] ) )){
    $erreur="Mail incorrect";
  }
  if($_POST['Mail']!=""){
    if (!( preg_match ( " /^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$/ " , $_POST['Mail'] ) )){
      $erreur="Mail incorrect";
    }
  }
  $googleResponse = false;
  $ch = curl_init("https://www.google.com/recaptcha/api/siteverify");
  curl_setopt_array($ch, array(CURLOPT_POSTFIELDS => array("secret" =>"6Lfx6d0UAAAAAC_w3i39-dxyxquSt9lxfSdAq-wC", "response" => $_POST["g-recaptcha-response"]), CURLOPT_RETURNTRANSFER => true));
  $googleResponse = curl_exec($ch);
  if(curl_errno($ch) == false && json_decode($response)->success == true) {
      $googleResponse = true;
  }
  curl_close($ch);  

  if($googleResponse==false){
    $erreur="Vous êtes un robot";
  }
  if(!(isset($erreur)) && $googleResponse==true){
    $res=insert_utilisateur($_POST['Pseudo'],$_POST['Password'],$_POST['Mail'],$_POST['Email']);
    header('Location: index.php?controler=acceuil');
    exit;
  } else {
    require ('./views/formulaire.php');
  }
?>
