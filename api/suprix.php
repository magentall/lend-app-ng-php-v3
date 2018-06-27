<?php

include 'inc/req.php';

//ref_jeu,nom_jeu,code,coop,selcat,px_ach,date_ach,date_rec,prov,date_inv,regle_jeu,pieces_rech,date_res,remarq

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){
  $prix=$_POST['prix'];


  if ($num_pret=='none') {
    ?>
               {
                 "success": false,
                 "message": "Choisissez un prix."
               }
    <?php
    exit();
  }

  $sql = "DELETE FROM prix WHERE prix.prix = '$prix';";

    $result = req($sql);
    if($result){


    ?>
              {
                "success": true,
                "message": "Prix supprimé"
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
