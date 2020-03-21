<?php

  require 'configuration_bdd.php';

  try {
    $bdd = new PDO("$driver:host=$host;dbname=$database","$user","$password");
  }catch (PDOException $error) {
    die("Connexion erreur : ".$error->getMessage());
  }

?>
