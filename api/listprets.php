<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';

$today=date("Y-m-d");
$today= strtotime($today);
$datstart = date("Y-m-d", strtotime("-1 month", $today));
$datend = date("Y-m-d", strtotime("+1 month", $today));

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){
  if (($_POST['date_start']!=NULL) && ($_POST['date_end']!=NULL)) {
    $datstart = $_POST['date_start'];
    $datend =  $_POST['date_end'];
  }

}

  $result = req("SELECT prix, date_pret, date_retour, nom_jeu, ref_jeu, nom_categorie, prets.num_adherent, adherents.alias, adherents.noms_adherent FROM prets INNER JOIN jeux ON  jeux.num_jeu=prets.num_jeu INNER JOIN adherents ON prets.num_adherent=adherents.num_adherent WHERE (prets.date_pret>= '$datstart' AND '$datend' >= prets.date_pret) OR (prets.date_retour<= '$datend' AND '$datstart' <= prets.date_retour) ");
  $tab=res2json($result);


  echo '{
    "obj": '.$tab.',
    "success": true
  }';

?>
