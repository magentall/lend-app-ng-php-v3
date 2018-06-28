<?php

include 'inc/req.php';

//ref_jeu,nom_jeu,code,coop,selcat,px_ach,date_ach,date_rec,prov,date_inv,regle_jeu,pieces_rech,date_res,remarq

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){
  $ref_jeu=$_POST['ref_jeu'];
  $nom_jeu=$_POST['nom_jeu'];
  $code=$_POST['code'];
  $coop=$_POST['coop'];
  $selcat=$_POST['selcat'];
  $px_ach=$_POST['px_ach'];
  $date_ach=$_POST['date_ach'];
  $date_rec=$_POST['date_rec'];
  $prov=$_POST['prov'];
  $date_inv=$_POST['date_inv'];
  $regle_jeu=$_POST['regle_jeu'];
  $pieces_rech=$_POST['pieces_rech'];
  $date_res=$_POST['date_res'];
  $remarq=$_POST['remarq'];

//INSERT INTO `jeux` (`num_jeu`, `ref_jeu`, `nom_jeu`, `code`, `coop`, `code_cat`, `prix_achat`, `date_achat`, `date_enregistr`, `provenance`, `date_inventaire`, `regle_jeu`, `pieces_rechange`, `date_reserve`, `remarques`) VALUES (NULL, '111111', 'dsdqqsd', '', '', '', '', '', '', '', '', '', '', '', '');

  $sql = "INSERT INTO jeux (ref_jeu, nom_jeu, code, coop, code_cat, prix_achat, date_achat, date_enregistr, provenance, date_inventaire, regle_jeu, pieces_rechange, date_reserve, remarques) VALUES ('$ref_jeu', '$nom_jeu', '$code', '$coop', '$selcat', '$px_ach', '$date_ach', '$date_rec', '$prov', '$date_inv', '$regle_jeu', '$pieces_rech', '$date_res', '$remarq')";

    $result = req($sql);
    if($result){


    ?>
              {
                "success": true,
                "message": "jeu enregistré"
              }
   <?php
   }else{
   ?>
              {
                "success": false,
                "message": "La référence doit être un nombre"
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
