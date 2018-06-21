<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';


$result = req("select adh.id_adh,noms_adherent,num_adherent from adherents as adh");

$outp = res2json_only($result);

echo($outp);
?>
