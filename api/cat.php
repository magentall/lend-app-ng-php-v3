<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';


$result = req("SELECT categorie.code_cat FROM categorie as categorie;");
//$result = req("SELECT categorie.nom_categorie FROM categorie as categorie WHERE categorie.code_cat='A1.01';");
$tab=res2json($result);

echo '{
  "obj": '.$tab.',
  "success": true
}';
?>
