<?php

$coef = '5BY**246f6b386f6b87jHàç';

$rcp='4cab75ab64ab6fab38ab37ab38ab37ab2aab2aab5BY**246f6b36f6b87jHàç';

$hex=str_replace('5BY**246f6b36f6b87jHàç', '', $rcp);

//echo $hex;

$string='';
for ($i=0; $i < strlen($hex)-3; $i+=4){
  echo $hex[$i];
  echo $hex[$i+1];
    $string .= chr(hexdec($hex[$i].$hex[$i+1]));
}

//echo $string;

/*

$hex='6f6b';
for ($i=0; $i < strlen($hex)-1; $i+=2){
    $string .= chr(hexdec($hex[$i].$hex[$i+1]));
}

echo $string;

*/




/*
$Date = "2010-09-17";
//echo date('Y-m-d', strtotime($Date. ' + 1 days'));
//echo date('Y-m-d', strtotime($Date. ' + 21 days'));

$today=date("Y-m-d");
$timepret=date('Y-m-d', strtotime($today. ' + 21 days'));


//echo $timepret;

var_dump($today>$timepret);*/
/*
$datetime1 = new DateTime('2009-10-11');
$datetime2 = new DateTime('2009-10-13');
$interval = $datetime1->diff($datetime2);

echo $interval->format('%R%a days');

$date1 = new DateTime("now");
$date2 = new DateTime("tomorrow");

var_dump($date1 == $date2);
var_dump($date1 < $date2);
var_dump($date1 > $date2);


$val1 = '2014-03-18 10:34:09.939';
$val2 = '2014-03-18 10:34:09.940';

$datetime1 = new DateTime($val1);
$datetime2 = new DateTime($val2);
echo "<pre>";
var_dump($datetime1->diff($datetime2));

if($datetime1 > $datetime2)
  echo "1 is bigger";
else
  echo "2 is bigger";
*/

?>
