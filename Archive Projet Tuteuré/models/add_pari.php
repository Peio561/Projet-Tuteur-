<?php
    require "connexion_bdd.php";

    function ajout_pari($eq1,$eq2,$hd,$hf,$jd,$jf,$jeu){
        global $bdd;
        $id=$bdd->prepare("select id_jeu from jeu where nom_jeu like :jeu ;");
        $id->bindvalue(':jeu',$jeu);
        $id->execute();
        $id2=$id->fetch(PDO::FETCH_ASSOC);

        $equipe=$bdd->prepare("select id_equipe from equipe where nom_equipe like :eq ;");
        $equipe->bindvalue(':eq',$eq1);
        $equipe->execute();
        $equipe1=$equipe->fetch(PDO::FETCH_ASSOC);


        $equipe->bindvalue(':eq',$eq2);
        $equipe->execute();
        $equipe2=$equipe->fetch(PDO::FETCH_ASSOC);


        $req=$bdd->prepare("insert into intitule_pari(equipe1,equipe2,debut,fin,id_jeu) values (:eq1,:eq2,:debut,:fin,:jeu);");
        $req->bindvalue(':eq1',$equipe1['id_equipe']);
        $req->bindvalue(':eq2',$equipe2['id_equipe']);
        $req->bindvalue(':debut',$jd." ".$hd);
        $req->bindvalue(':fin',$jf." ".$hf);
        $req->bindvalue(':jeu',intval($id2['id_jeu']));
        $req->execute();
    }

    
?>