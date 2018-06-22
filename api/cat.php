<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';


$result = req("SELECT categories.code_cat, categories.nom_categorie FROM categories as categories;");
//$result = req("SELECT categorie.nom_categorie FROM categorie as categorie WHERE categorie.code_cat='A1.01';");
$tab=res2json($result);

echo '{
  "obj": '.$tab.',
  "success": true
}';
?>
