<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';

$today=date("Y-m-d");

//$result = req("SELECT jeux.num_jeu FROM jeux LEFT JOIN prets ON jeux.num_jeu = prets.num_jeu WHERE prets.num_jeu IS NULL;");

//$result = req("SELECT jeux.num_jeu,jeux.ref_jeu,nom_jeu,code_cat FROM jeux as jeux LEFT JOIN prets ON jeux.num_jeu = prets.num_jeu WHERE prets.num_jeu IS NULL OR '$today' >= prets.date_retour ORDER BY num_jeu DESC");

$result = req("SELECT jeux.num_jeu,jeux.ref_jeu,nom_jeu,code_cat FROM jeux as jeux LEFT JOIN prets ON jeux.num_jeu = prets.num_jeu WHERE (prets.num_jeu IS NULL OR '$today' >= prets.date_retour) AND (jeux.code = '' OR jeux.code = '2' OR jeux.code = '1') ORDER BY num_jeu ASC");


$outp = res2json_only($result);

echo($outp);
?>
