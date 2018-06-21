<?php
/*
function res2json_only($result){
  $rows=[];
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  	$rows[]=$rs;
  }
  $tabjson = '{"obj":'.json_encode($rows).'}';
  return $tabjson;
}

function res2json($result){
  $rows=[];
  while($rs = $result->fetch_array(MYSQLI_ASSOC)) {
  	$rows[]=$rs;
  }
  $tabjson = json_encode($rows);
  return $tabjson;
}*/

function res2json_only($result){
  $rows=[];
  while($rs = $result->fetch_assoc()) {
  	$rows[]=$rs;
  }
  $tabjson = '{"obj":'.json_encode($rows).'}';
  return $tabjson;
}

function res2json($result){
  $rows=[];
  while($rs = $result->fetch_assoc()) {
  	$rows[]=$rs;
  }
  $tabjson = json_encode($rows);
  return $tabjson;
}

?>
