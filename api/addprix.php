<?php

include 'inc/req.php';

//ref_jeu,nom_jeu,code,coop,selcat,px_ach,date_ach,date_rec,prov,date_inv,regle_jeu,pieces_rech,date_res,remarq

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){
  $prix=$_POST['prix'];


  $sql = "INSERT INTO prix (prix) VALUES ('$prix');";

    $result = req($sql);
    if($result){


    ?>
              {
                "success": true,
                "message": "Prix ajouté"
              }
   <?php
   }else{
   ?>
              {
                "success": false,
                "message": "Erreur."
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
