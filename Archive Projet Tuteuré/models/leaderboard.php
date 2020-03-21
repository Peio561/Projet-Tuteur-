<?php
    require "connexion_bdd.php";

    function get_classement($role,$recherche=""){
        global $bdd;
        if($recherche==""){
            $req=$bdd->query("select id_uti,pseudo,cote,role from utilisateur order by cote desc ;");
            $req->execute();
        } else {
            $req=$bdd->query("select id_uti,pseudo,cote,role from utilisateur where pseudo like '%$recherche%' order by cote desc ;");
            $req->execute();
        }
        $res=$req->fetchAll(PDO::FETCH_ASSOC);
        
        $content="";
        $i=1;
        foreach($res as $row){
            $content.='
                <form class="joueur" method="POST" action="index.php?controler=modif_role">
                    <p class="info" id="place">'.$i.'</p>
                    <p class="info" id="pseudo">'.$row['pseudo'].'</p>
                    <p class="info" id="cote">'.$row['cote'].' pts</p>
                    <input type="text" name="id" value="'.$row['id_uti'].'" readonly="readonly" hidden="hidden" />      
                ';
            if($role=='admin'){
                $content.='<select class="choix_role" name="role" value="'.$row['role'].'">';
            } else {
                $content.='<select class="choix_role" name="role" value="'.$row['role'].'" disabled>';
            } 
            if($row['role']=="membre") {
                $content.='<option class="opt" value="membre">membre</option> <option class="opt" value="membre ulco">membre ulco</option> <option class="opt" value="admin">admin</option></select>';
            } else {
                if($row['role']=="membre ulco"){
                    $content.='<option class="opt" value="membre ulco">membre ulco</option> <option class="opt" value="membre">membre</option> <option class="opt" value="admin">admin</option></select>';
                } else {
                    $content.='<option class="opt" value="admin">admin</option> <option class="opt" value="membre">membre</option> <option class="opt" value="membre ulco">membre ulco</option> </select>';
                }
            }
            if($role=='admin'){
                $content.='<input type="submit" class="submit" value="Enregistrer"/>'; 
            } else {
                $content.='<input type="submit" class="submit" value="Enregistrer" disabled />'; 
            }   
            $content.='</form>';
            $i++;
        }
        if($content=="") {
            $content="Aucun résultat";
        }
        return $content;
    }

?>
