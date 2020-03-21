<?php
    require "connexion_bdd.php";

    function get_equipes($jeu) {
        global $bdd;
        $req=$bdd->prepare("select nom_equipe as nom from equipe inner join jeu using(id_jeu) where nom_jeu like :jeu order by id_equipe desc;");
        $req->bindvalue(':jeu',$jeu);
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function get_pari($jeu) {
        global $bdd;
        $req=$bdd->prepare("select equipe1, equipe2 from intitule_pari inner join jeu using(id_jeu) where nom_jeu like :jeu and intitule_pari.debut<NOW() ;");
        $req->bindvalue(':jeu',$jeu);
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function get_matchs($jeu) {
        global $bdd;
        $req=$bdd->prepare("select * from historique_match inner join jeu using(id_jeu) where nom_jeu like :jeu ;");
        $req->bindvalue(':jeu',$jeu);
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function get_paris($jeu){
        global $bdd;
        $req=$bdd->prepare("select id_jeu,id_intitule, equipe1, equipe2 from intitule_pari inner join jeu using(id_jeu) where nom_jeu like :jeu and debut < NOW() and fin > NOW();");
        $req->bindvalue(':jeu',$jeu);
        $req->execute();
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        return $res;
    }

    function check_pari($intitule,$id){
        global $bdd;
        $req=$bdd->query("select count(*) as compteur from pari where id_uti=$id and id_intitule=$intitule ;");
        $req->execute();
        $res=$req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    function get_equipe1($inti){
        global $bdd;
        $req=$bdd->query("select nom_equipe from equipe where id_equipe=(select equipe1 from intitule_pari where id_intitule=$inti) ;");
        $req->execute();
        $res=$req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    function get_equipe2($inti){
        global $bdd;
        $req=$bdd->query("select nom_equipe from equipe where id_equipe=(select equipe2 from intitule_pari where id_intitule=$inti) ;");
        $req->execute();
        $res=$req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
?>