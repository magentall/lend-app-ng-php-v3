<?php
include 'inc/headjson.php';
include 'inc/req.php';
include 'inc/func.php';

$today=date("Y-m-d");

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)){

  $categorie = $_POST['categorie'];
  if ($categorie!="Choix...") {
    //$result = req("SELECT jeux.num_jeu FROM jeux LEFT JOIN prets ON jeux.num_jeu = prets.num_jeu WHERE prets.num_jeu IS NULL;");
    //INNER JOIN categorie ON jeux.nom_categorie=categorie.nom_categorie

    //$result = req("SELECT jeux.num_jeu,jeux.ref_jeu,nom_jeu,code_cat FROM jeux as jeux LEFT JOIN prets ON jeux.num_jeu = prets.num_jeu WHERE (prets.num_jeu IS NULL AND jeux.code_cat='$categorie') OR ('$today' >= prets.date_retour AND jeux.code_cat='$categorie') ORDER BY num_jeu DESC");
    $result = req("SELECT jeux.num_jeu,jeux.ref_jeu,nom_jeu,code_cat FROM jeux as jeux LEFT JOIN prets ON jeux.num_jeu = prets.num_jeu WHERE (prets.num_jeu IS NULL AND jeux.code_cat='$categorie' AND (jeux.code='' OR jeux.code=1)) OR ('$today' >= prets.date_retour AND jeux.code_cat='$categorie' AND (jeux.code='' OR jeux.code=1)) ORDER BY num_jeu DESC");


    $outp = res2json_only($result);

    echo($outp);
  }

}
?>
