<?php

    require('connexion_bdd.php');

    function modif_role($role,$id){
        global $bdd;
        $req=$bdd->prepare("update utilisateur set role=:role where id_uti=:id ;");
        $req->bindvalue(':id',$id);
        $req->bindvalue(':role',$role);
        $req->execute();
    }


?>