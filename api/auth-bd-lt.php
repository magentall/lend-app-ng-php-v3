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
    $pswd=$rs['key_ad'];
  }

  $coef = '5BY**246f6b386f6b87jH';

  $hexa ='';
  $a=0;
  $tab=$password;

  for ($i=0; $i < strlen($tab);$i++){
    if ($a==2) {
      $hexa.=$tab[$i] ;
      $a=0;
    }
    elseif ($a==1){
      $a=2;
    }
    else{
      $a=1;
    }
  }

  $fp = fopen('results.txt', 'w');
  fwrite($fp, $hexa);
  fclose($fp);

  $hex='';
  $hex=str_replace('5BY**246f6b36f6b87jH', '', $hexa);//$password);
  //$hex=utf8_encode($hex);

  $string1='';
  for ($i=0; $i < strlen($hex)-1; $i+=2){
      $string1 .= chr(hexdec($hex[$i].$hex[$i+1]));
  }

//$string1=utf8_encode($string1);
/*
  $hex=str_replace('5BY**246f6b36f6b87jHàç', '', $password);
  $hex=utf8_encode($hex);

  $string2='';
  for ($i=0; $i < strlen($hex)+1; $i+=4){
      $string2 .= chr(hexdec($hex[$i].$hex[$i+1]));
  }*/

//$string2=utf8_encode($string2);


  //echo $string;

    if($string1==$pswd){
//  if($password==$pswd){
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
