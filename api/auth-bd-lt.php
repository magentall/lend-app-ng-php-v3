<?php

include 'inc/req.php';

/* set the cache limiter to 'private' */

session_cache_limiter('private');
$cache_limiter = session_cache_limiter();

/* set the cache expire to 5 minutes */
session_cache_expire(5);
$cache_expire = session_cache_expire();

/* start the session */

session_start();

$_POST = json_decode(file_get_contents('php://input'), true);
if (isset($_POST)&& !empty($_POST)&&$_POST['password']!=""){
  $username = $_POST['username'];
  $password = $_POST['password'];

  $result = req("SELECT adherents.alias,adherents.key_ad FROM adherents WHERE adherents.alias='$username'");

  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
    $pswd=$rs["key_ad"];
  }
  //$pswd=trim($pswd);
  //if($username == 'admin' && $password == 'admin') {
  if($password==$pswd){
    //$_SESSION['user'] = 'admin';
    $_SESSION['user'] = $username;

    ?>
              {
                "success": true,
                "secret": "secret admin"
              }
   <?php
   }else{
   ?>
              {
                "success": false,
                "message": "Votre saisie est incorrecte."
              }
   <?php
 }
} else {
  //var_dump($_POST);
  ?>
              {
                "success": false,
                "message": "Votre saisie est incorrecte!"
              }
  <?php
}
?>
