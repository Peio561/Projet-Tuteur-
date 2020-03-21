<?php

  require 'bibliotheque.php';

  $content=tag('h2','équipe 1');
  $formulaire=tag("div",$options, array('method' => 'POST'));
  $content.=$formulaire;

  $content2=tag('h2','équipe 2');
  $formulaire2=tag("div",$options2, array('method' => 'POST'));
  $content2.=$formulaire2;


  $date=tag('p','Ouverture du paris',array('class'=>'inlineMiddle'));
  $date.=tag('input','',array('type'=>'date','name'=>'date_debut','class'=>'inlineMiddle','id'=>'jour_debut'));
  $date.=tag('input','',array('type'=>'time','name'=>'heure_debut','class'=>'inlineMiddle','id'=>'debut'));
  $date.=tag('br');
  $date.=tag('p','Fermeture du paris',array('class'=>'inlineMiddle'));
  $date.=tag('input','',array('type'=>'date','name'=>'date_fin','class'=>'inlineMiddle','id'=>'jour_fin'));
  $date.=tag('input','',array('type'=>'time','name'=>'heure_fin','class'=>'inlineMiddle','id'=>'fin'));
  $content3=$date;

  $content4=tag("input","", array('type' => 'submit','value'=>'valider', 'class' => 'valider'));

  require 'hearthstone.php';

 ?>
