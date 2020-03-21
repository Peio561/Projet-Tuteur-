<?php
	set_include_path(substr(__FILE__,0,-9));

  session_start();
  if(!(isset($_SESSION['role']))){
    $_SESSION['role']= 'Invité';
  }
  if(!(isset($_SESSION['pseudo']))){
    $_SESSION['pseudo']= "Invité";
  }
  if(!(isset($_SESSION['id']))){
    $_SESSION['id']= -1;
  }



  if(isset($_GET['controler'])){
	$control = $_GET['controler'];
    require "controlers/{$control}.php";
  } else {
    require './controlers/acceuil.php';
  }

 ?>
