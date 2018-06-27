<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';


$result = req("SELECT j.num_jeu, j.nom_jeu FROM jeux as j");

$outp = res2json_only($result);

echo($outp);
?>
