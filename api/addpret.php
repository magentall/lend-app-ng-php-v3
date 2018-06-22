<?php

include 'inc/req.php';

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){

  $numjeu = $_POST['jeu'];
  $numadh = $_POST['adh'];
  $date_pret = $_POST['date_pret'];
  $date_retour = $_POST['date_retour'];
  $prix = $_POST['prix'];

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
  ?>
              {
                "success": false,
                "message": "Only Post Access"
              }
  <?php
}
?>
