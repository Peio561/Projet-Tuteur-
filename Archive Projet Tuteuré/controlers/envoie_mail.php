<?php

    $pseudo=$_SESSION['pseudo'];
    $role=$_SESSION['role'];


    if($_POST['mail']==""){
        $erreur="Veuillez saisir une adresse mail";
    }
    if($_POST['subject']==""){
        $erreur="Veuillez saisir un sujet";
    }
    if($_POST['text']==""){
        $erreur="Veuillez saisir votre message";
    }
    $header = "From:".$_POST['mail'];
    if(!(isset($erreur))){
        mail("gwendal.garenaux@gmail.com",$_POST['subject'],$_POST['text'],$header);
        require 'views/envoie_mail.php';
    } else {
        require 'views/contactezNous.php';
    }

    

?>