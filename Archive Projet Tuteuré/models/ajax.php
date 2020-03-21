<?php
    require "gestion_table.php";
    require "leaderboard.php";
    require "views.php";

    if($_POST['function']=="get_messages") {
        $res = recup_message($_POST['id'],$_POST['jeu']);
	    echo json_encode($res);
    }
    if($_POST['function']=="get_cote") {
        $res = get_cote($_POST['infos']);
	    echo ($res['compteur']);
    }
    if($_POST['function']=="ajout_message") {
        $jeu=get_jeu($_POST['jeu']);
        $id=get_uti($_POST['pseudo']);
        var_dump($id);
        $res=ajout_message($_POST['message'],intval($id['id_uti']),intval($jeu['id_jeu']));
        return $res;
    }
    if($_POST['function']=="parier") {
        list($intitule,$jeu,$id,$equipe)=explode('%',$_POST['infos']);
        $check_pari=check_pari($intitule,$id);
        if($id!="-1" && intval($check_pari['compteur'])==0) {
            ajout_pari($intitule,$id,$equipe);
            $disabled=substr($_POST['infos'],0,-1);
            echo($disabled);
        }
    }
    if($_POST['function']=="get_max") {
        $res = get_max();
	    echo ($res['max']);
    }
    if($_POST['function']=="get_role") {
        $res = get_role($_POST['pseudo']);
	    echo ($res['role']);
    }
    if($_POST['function']=="classement") {
        $res = get_classement($_POST['role_rech'],$_POST['recherche']);
	    echo ($res);
    }

?>