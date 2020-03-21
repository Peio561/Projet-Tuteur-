<?php
    require "./models/add_pari.php";

    if(isset($_POST['table'])){
        $eq1=$_POST['table'];
    } else {

    }
    if(isset($_POST['table2'])){
        $eq2=$_POST['table2'];
    } else {
        
    }
    if(isset($_POST['heure_debut'])){
        $hd=$_POST['heure_debut'];
    } else {
        
    }
    if(isset($_POST['heure_fin'])){
        $hf=$_POST['heure_fin'];
    } else {
        
    }
    if(isset($_POST['date_debut'])){
        $jd=$_POST['date_debut'];
    } else {
        
    }
    if(isset($_POST['date_fin'])){
        $jf=$_POST['date_fin'];
    } else {
        
    }

    $date_debut=date_create($_POST['date_debut']." ".$_POST['heure_debut']);
    $date_fin=date_create($_POST['date_fin']." ".$_POST['heure_fin']);
    $date = date(time());
    if($date_fin->getTimestamp()<intval($date)) {
        $erreur="La date de fin n'est pas valide";
    }
    if($date_fin<=$date_debut){
        $erreur="La date de fin du pari est inférieur à celle du début";
    }
    if($_POST['table']==$_POST['table2']){
        $erreur="L'équipe s'affronte elle-même, veuillez vérifier les équipes";
    }
    if(!(isset($erreur))) {
        ajout_pari($eq1,$eq2,$hd,$hf,$jd,$jf,$_SESSION['jeu']);
        header('Location: index.php?controler=acceuil');
        exit;
    } else {
        echo($erreur);
    }
?>