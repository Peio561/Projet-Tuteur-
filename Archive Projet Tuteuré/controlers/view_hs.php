<?php
  require "./models/views.php";
  require "./models/gestion_table.php";

  $pseudo=$_SESSION['pseudo'];
  $role=$_SESSION['role'];
  $_SESSION['jeu']='hearthstone';

  $res=get_equipes('hearthstone');
  $options='<select id="equipe1" size="1" name="table">';
  $options2='<select id="equipe2" size="1" name="table2">';
  foreach ($res as $row) {
    $options.='<option value="'.$row['nom'].'">'.$row['nom'].'</option>';
    $options2.='<option value="'.$row['nom'].'">'.$row['nom'].'</option>';
  }
  $options.='</select>';
  $options2.='</select>';

  $res=get_matchs('hearthstone');
  $match="";
  $array_mois= Array("", "janvier", "février", "mars", "avril", "mai", "juin", "juillet", "août", "septembre", "octobre", "novembre", "décembre");
  foreach ($res as $row) {
    list($annee,$mois,$jour) = explode('-',$row['date_match']);
    $match.='<div class="jour"><h1>'.$jour.' '.$array_mois[$mois].' '.$annee.'</h1><h2 class="inlineSV e1">'.$row['nom_eq1'].'</h2><p class="inlineSV">'.$row['score_eq1'].'</p><p class="inlineSV"> : </p><p class="inlineSV">'.$row['score_eq2'].'</p><h2 class="inlineSV e2">'.$row['nom_eq2'].'</h2></div>';
  }

  $res=get_paris('hearthstone');
  $paris="";
  foreach($res as $row) {
    $check=check_pari($row['id_intitule'],$_SESSION['id']);
    $equipe1=get_equipe1($row['id_intitule']);
    $equipe2=get_equipe2($row['id_intitule']);
    $coteEq1=get_cote($row['id_intitule'].'%'.$row['equipe1']);
    $coteEq2=get_cote($row['id_intitule'].'%'.$row['equipe2']);
    if($check['compteur']==0 && $_SESSION['id']!="-1") {
      $paris.= 
      '<div class="match">
        <div class="equipe">
          <h2 class="inline">'.$equipe1['nom_equipe'].'</h2>
          <p class="inline cote" id="coteEq1"  name="'.$row['id_intitule'].'%'.$row['equipe1'].'">'.$coteEq1['compteur'].'</p>
          <br/>
        <input type="button" class="parier" value="Je parie" name="'.$row['id_intitule'].'%'.$row['id_jeu'].'%'.$_SESSION['id'].'%1'.'">
        </div>
        <div class="equipe" id="equ2">
          <h2 class="inline">'.$equipe2['nom_equipe'].'</h2>
          <p class="inline cote" id="coteEq2"  name="'.$row['id_intitule'].'%'.$row['equipe2'].'">'.$coteEq2['compteur'].'</p>
          <br/>
          <input type="button" class="parier" value="Je parie" name="'.$row['id_intitule'].'%'.$row['id_jeu'].'%'.$_SESSION['id'].'%2'.'">
        </div>
      </div>
      <br/>';
    } else {
      $paris.= 
      '<div class="match">
        <div class="equipe">
          <h2 class="inline">'.$equipe1['nom_equipe'].'</h2>
          <p class="inline cote" id="coteEq1" name="'.$row['id_intitule'].'%'.$row['equipe1'].'">'.$coteEq1['compteur'].'</p>
          <br/>
        <input type="button" class="parier" disabled="disabled" value="Je parie" name="'.$row['id_intitule'].'%'.$row['id_jeu'].'%'.$_SESSION['id'].'%1'.'">
        </div>
        <div class="equipe" id="equ2">
          <h2 class="inline">'.$equipe2['nom_equipe'].'</h2>
          <p class="inline cote" id="coteEq2"  name="'.$row['id_intitule'].'%'.$row['equipe2'].'">'.$coteEq2['compteur'].'</p>
          <br/>
          <input type="button" class="parier" disabled="disabled" value="Je parie" name="'.$row['id_intitule'].'%'.$row['id_jeu'].'%'.$_SESSION['id'].'%2'.'">
        </div>
      </div>
      <br/>';
    }
  } 

  require "./views/view_hs.php";
?>
