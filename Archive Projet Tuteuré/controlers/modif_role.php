<?php
    require('./models/modif_role.php');

    $role=$_POST['role'];
    $id=$_POST['id'];
    
    if($role=='admin') {
        modif_role($role,$id);
    }
    header('Location: index.php?controler=leaderboard');
    exit;


?>