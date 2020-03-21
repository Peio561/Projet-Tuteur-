<?php

  require ('./models/leaderboard.php');
  $pseudo=$_SESSION['pseudo'];
  $role=$_SESSION['role'];

  $content=get_classement($role);

  require "./views/leaderboard.php";
?>