<?php
include('../../pages/connexion.php');
$data = stripslashes(file_get_contents("php://input"));
$mydata = json_decode($data, true);
$id = $mydata['sid'];

$sql = "SELECT * FROM users WHERE id = {$id}";
$result = $bd->query($sql);
$row = $result->fetch();
echo json_encode($row);
?>