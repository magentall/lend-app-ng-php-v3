<?php

include 'inc/req.php';

//session_start();

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){

  $numjeu = $_POST['jeu'];
  $numadh = $_POST['adh'];
  $date_pret = $_POST['date_pret'];
  $date_retour = $_POST['date_retour'];
  $prix = $_POST['prix'];

/*
  $jeu = $_POST['jeu'];
  $aliasadh = $_POST['adh'];
  $date_pret = $_POST['date_pret'];
  $date_retour = $_POST['date_retour'];
  $prix = $_POST['prix'];

  $resulta = req("SELECT adherents.alias,adherents.num_adherent FROM adherents WHERE adherents.alias='$aliasadh'");

  while($rs = $resulta->fetch_array(MYSQLI_ASSOC)) {
    $numadh=$rs["num_adherent"];
  }

  $resultaa = req("SELECT jeux.num_jeu,jeux.nom_jeu FROM jeux WHERE jeux.nom_jeu='$jeu'");

  while($rs = $resultaa->fetch_array(MYSQLI_ASSOC)) {
    $numjeu=$rs["num_jeu"];
  }

  $id=rand();

  $sql = "INSERT INTO prets (num_pret, num_jeu, num_adherent, date_pret, date_retour, prix) VALUES ('$id', '$numjeu', '$numadh', '$date_pret', '$date_retour', '$prix')";
*/
  $sql = "INSERT INTO prets (num_jeu, num_adherent, date_pret, date_retour, prix) VALUES ('$numjeu', '$numadh', '$date_pret', '$date_retour', '$prix')";


    $result = req($sql);
    if($result){


    ?>
              {
                "success": true,
                "message": "Prêt enregistré"
              }
   <?php
   }else{
   ?>
              {
                "success": false,
                "message": "Erreur Ajout."
              }
   <?php
   }

} else {
  //var_dump($_POST);
  ?>
              {
                "success": false,
                "message": "Only Post Access"
              }
  <?php
}
?>
