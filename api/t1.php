<?php
$mysqli = new mysqli("localhost", "root", "BoomBoom11**", "ctdje");
$mysqli->set_charset("utf8");
$query="SELECT * FROM jeux";
$result=$mysqli->query($query)
	or die ($mysqli->error);
//store the entire response
$response = array();
//the array that will hold the titles and links
$posts = array();
while($row=$result->fetch_assoc()) //mysql_fetch_array($sql)
{
$title=$row['num_jeu'];
$url=$row['nom_jeu'];
//each item from the rows go in their respective vars and into the posts array
$posts[] = array('title'=> $title, 'url'=> $url);
}
//the posts array goes into the response
$response['posts'] = $posts;
//creates the file
$fp = fopen('results.json', 'w');
fwrite($fp, json_encode($response));
fclose($fp);
?>
