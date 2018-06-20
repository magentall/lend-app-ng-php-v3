<?php

function req($query){
  $conn = new mysqli("localhost", "root", "BoomBoom11**", "ctdje");
  $result = $conn->query($query);
  $conn->close();
  return $result;
}

?>
