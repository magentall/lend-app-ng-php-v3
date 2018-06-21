<?php
include 'inc/headjson.php';
include 'inc/req.php';
/*include 'inc/func.php';

$conn = new mysqli("localhost", "root", "BoomBoom11**", "ctdje");
$result = $conn->prepare('select id_adh,alias,noms_adherent from adherents as adh');
$result = $conn->execute();
$result->bind_result($title);

//$outp = res2json_only($result);

mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($result);
/*while($row = $result->fetch_assoc()) {
  $row_array['id_adh'] = $row['id_adh'];
  $row_array['alias'] = $row['alias'];
  $row_array['noms_adherent'] = $row['noms_adherent'];

array_push($return_arr,$row_array);

}

echo json_encode($return_arr);*/

//$tabjson = json_encode($rows);

//echo($outp);
/*

$con=mysqli_connect("localhost", "root", "BoomBoom11**", "ctdje");
// Check connection
if (mysqli_connect_errno())
 {
 echo "Failed to connect to MySQL: " . mysqli_connect_error();
 }

$sql="SELECT code_cat from categorie;";
$result=mysqli_query($con,$sql);

// Fetch all
mysqli_fetch_all($result,MYSQLI_BOTH);

echo json_encode($result);
// Free result set
mysqli_free_result($result);

mysqli_close($con);*/

$dsn = "mysql:host=localhost;dbname=[ctdje]";
$username = "[root]";
$password = "[BoomBoom11**]";

$pdo = new PDO($dsn, $username, $password);

$rows = array();

    $stmt = $pdo->prepare("SELECT nom_categorie FROM categorie");
    $stmt->execute(array('nom_categorie');
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($rows);

?>
