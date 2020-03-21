<?php
    require 'connexion_bdd.php';

    function ajout_pari($intitule,$id,$equipe) {
        global $bdd;

        /* Récupération de l'id de l'équipe en fonction du nom */
        if($equipe=='1') {
            $eq=$bdd->prepare("select equipe1 as id_equipe from intitule_pari where id_intitule=:intitule ;");
        } else {
            $eq=$bdd->prepare("select equipe2 as id_equipe from intitule_pari where id_intitule=:intitule ;");
        }
        $eq->bindvalue(':intitule',$intitule);
        $eq->execute();
        $equi=$eq->fetch(PDO::FETCH_ASSOC);
        var_dump($equi);



        $req=$bdd->prepare("insert into pari(id_uti,id_intitule,id_equipe_pari) values ($id,:intitule,:equipe);");
        $req->bindvalue(':intitule',$intitule);
        $req->bindvalue(':equipe',$equi['id_equipe']);
        $req->execute();
    }

    function ajout_message($message,$id,$jeu){
        global $bdd;
        var_dump($message);
        var_dump($id);
        var_dump($jeu);
        $req=$bdd->prepare("insert into messages(texte,id_uti,id_jeu) values (:message,$id,$jeu);");
        $req->bindvalue(':message',$message);   
        $req->execute();
        return true;
    }

    function recup_message($max,$jeu){

		global $bdd;
        $inter=intval($max);
        $statement = $bdd->prepare("SELECT utilisateur.pseudo as pseudo, messages.texte as texte from jeu inner join messages using(id_jeu) inner join utilisateur using(id_uti) where messages.id_mess > $inter and nom_jeu like ? order by messages.id_mess asc;");
        $statement->bindValue(1, $jeu, PDO::PARAM_STR);
        $statement->execute();
        $res=$statement->fetchall(PDO::FETCH_ASSOC);
		return $res;
		
    }
    
    function get_jeu($jeu){
        global $bdd;
        $req=$bdd->prepare("select id_jeu from jeu where nom_jeu like :jeu ;");
        $req->bindvalue(':jeu',$jeu);
        $req->execute();
        $res = $req ->fetch(PDO::FETCH_ASSOC);
		return $res;
    }

    function get_uti($uti){
        global $bdd;
        $req=$bdd->prepare("select id_uti from utilisateur where pseudo like :uti ;");
        $req->bindvalue(':uti',$uti);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
		return $res;
    }

    function get_max(){
        global $bdd;
        $req=$bdd->prepare("select max(id_mess) as max from messages ;");
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    function get_cote($infos){
        global $bdd;
        List($inti,$eq)=explode('%',$infos);


        $req=$bdd->prepare("select count(id_pari) as compteur from pari where id_intitule=:intitule and id_equipe_pari=:equipe ;");
        $req->bindvalue(':intitule',$inti);
        $req->bindvalue(':equipe',$eq);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }

    function get_role($pseudo){
        global $bdd;

        $req=$bdd->prepare("select role from utilisateur where pseudo like :pseudo ;");
        $req->bindvalue(':pseudo',$pseudo);
        $req->execute();
        $res = $req->fetch(PDO::FETCH_ASSOC);
        return $res;
    }
?>
