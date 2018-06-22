<?php

include 'inc/req.php';

//session_start();

//id_adh,prenoms_responsables,prenoms_enfants,date_adh,type_adh,code_postal,ville,num_tel,num_portable,adresse,alias,pswd,noms_adherent

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){
  $id_adh = $_POST['id_adh'];
  $noms_adherent = $_POST['noms_adherent'];
  $prenoms_responsables = $_POST['prenoms_responsables'];
  $prenoms_enfants = $_POST['prenoms_enfants'];
  $alias = $_POST['alias'];
  $key = $_POST['pswd'];
  $date_adh = $_POST['date_adh'];
  $type_adh = $_POST['type_adh'];
  $code_postal = $_POST['code_postal'];
  $ville = $_POST['ville'];
  $num_tel = $_POST['num_tel'];
  $num_portable = $_POST['num_portable'];
  $adresse = $_POST['adresse'];


// HAVE TO CHECK IF alias already exists
  $isalias = "SELECT num_adherent FROM adherents WHERE adherents.alias='$alias'";

  $res1 = req($isalias);

  while($rs = $res1->fetch_array(MYSQLI_ASSOC)) {
     $test=$rs["num_adherent"];
   }

  if ($test!='') {
    ?>
               {
                 "success": false,
                 "message": "Existe déjà."
               }
    <?php
    exit();
  }

  $sql = "INSERT INTO adherents (id_adh, noms_adherent, prenoms_responsables, prenoms_enfants, alias, key_ad, date_adh, type_adh, code_postal, ville, num_tel, num_portable, adresse) VALUES ('$id_adh', '$noms_adherent', '$prenoms_responsables', '$prenoms_enfants', '$alias', '$key', '$date_adh', '$type_adh', '$code_postal', '$ville', '$num_tel', '$num_portable', '$adresse')";

    $result = req($sql);
    if($result){


    ?>
              {
                "success": true,
                "message": "Adhérent enregistré"
              }
   <?php
   }else{
   ?>
              {
                "success": false,
                "message": "Existe déjà."
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
