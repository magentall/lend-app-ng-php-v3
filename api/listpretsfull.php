<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';


$result = req("SELECT p.num_pret, a.noms_adherent, j.nom_jeu, p.date_pret FROM prets AS p INNER JOIN jeux AS j ON j.num_jeu=p.num_jeu INNER JOIN adherents AS a ON p.num_adherent=a.num_adherent");

$outp = res2json_only($result);

echo($outp);
?>
