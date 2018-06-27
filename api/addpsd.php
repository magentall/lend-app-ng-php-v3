<?php

include 'inc/req.php';


$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){
  $num_adh=$_POST['num_adh'];
  $alias=$_POST['alias'];
  $psd=$_POST['psd'];


  $sql = "UPDATE adherents SET alias = '$alias', key_ad = '$psd' WHERE adherents.num_adherent = '$num_adh'";

    $result = req($sql);
    if($result){


    ?>
              {
                "success": true,
                "message": "Mot de passe ajouté"
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
