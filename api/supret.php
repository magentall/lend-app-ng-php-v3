<?php

include 'inc/req.php';

//ref_jeu,nom_jeu,code,coop,selcat,px_ach,date_ach,date_rec,prov,date_inv,regle_jeu,pieces_rech,date_res,remarq

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){
  $num_pret=$_POST['num_pret'];


  if ($num_pret=='none') {
    ?>
               {
                 "success": false,
                 "message": "Choisissez un prêt."
               }
    <?php
    exit();
  }

  $sql = "DELETE FROM prets WHERE prets.num_pret = '$num_pret';";

    $result = req($sql);
    if($result){


    ?>
              {
                "success": true,
                "message": "Prêt supprimé"
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
