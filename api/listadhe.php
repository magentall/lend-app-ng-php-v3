<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';


$result = req("SELECT adh.id_adh,noms_adherent,num_adherent from adherents as adh WHERE num_adherent!='2864'");

$outp = res2json_only($result);

echo($outp);
?>
